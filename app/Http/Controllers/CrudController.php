<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Mail\RestoreAccountVerification;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\ValidationException;

class CrudController extends Controller
{

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function editProfile(string $id): View
    {
        // Mendapatkan pengguna berdasarkan ID
        $field = User::findOrFail($id);

        $produkDibeli = Auth::user()->produk;

        foreach ($produkDibeli as $produk) {
            $produk->pivot->tanggal_beli = Carbon::parse($produk->pivot->tanggal_beli);
            $produk->pivot->tanggal_berakhir = Carbon::parse($produk->pivot->tanggal_berakhir);
        }
        // Merender tampilan dengan data pengguna
        return view('user.profile-view', compact('field', 'produkDibeli'));
    }

    public function changePassword(Request $request, string $id)
    {
        // Mendapatkan pengguna berdasarkan ID
        $field = User::findOrFail($id);

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Cek apakah password saat ini benar
        if (!Hash::check($request->current_password, $field->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['Password saat ini tidak valid.'],
            ]);
        }

        // Update password
        $field->password = Hash::make($request->new_password);
        $field->save(); // Simpan perubahan

        return redirect()->route('editProfile', ['id' => $field->id])->with('status', 'Password berhasil diubah!');
    }
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // Validasi form
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users,email,' . $id],
        ]);

        // Mendapatkan pengguna berdasarkan ID
        $field = User::findOrFail($id);

        // Cek jika gambar diupload
        if ($request->hasFile('image')) {
            // Tentukan path folder
            $path = public_path('profile');

            // Cek dan buat folder jika belum ada
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true); // Buat folder dengan hak akses 755
            }

            // Hapus gambar lama jika ada
            if ($field->image) {
                $oldImagePath = public_path('profile/' . $field->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            // Upload gambar baru
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Nama file unik
            $image->move($path, $imageName); // Simpan gambar ke folder public/profile

            // Update pengguna dengan gambar baru
            $field->image = $imageName;
        } else {
            // Jika tidak ada gambar diupload, gunakan gambar default
            if (!$field->image) {
                // Menggunakan huruf pertama dari nama sebagai gambar default
                $defaultImageName = 'default_' . strtolower(substr($field->name, 0, 1)) . '.png';
                $defaultImagePath = public_path('profile/' . $defaultImageName);

                // Cek apakah gambar default sudah ada
                if (!File::exists($defaultImagePath)) {
                    // Buat gambar default menggunakan GD library atau library lain
                    $img = imagecreatetruecolor(150, 150);
                    $bgColor = imagecolorallocate($img, 204, 204, 204); // Warna latar belakang abu-abu
                    $textColor = imagecolorallocate($img, 255, 255, 255); // Warna huruf putih

                    // Mengisi latar belakang
                    imagefill($img, 0, 0, $bgColor);

                    // Menambahkan huruf ke gambar
                    $fontPath = public_path('fonts/arial.ttf'); // Pastikan font tersedia
                    $text = strtoupper(substr($field->name, 0, 1));
                    imagettftext($img, 60, 0, 40, 100, $textColor, $fontPath, $text);

                    // Menyimpan gambar
                    imagepng($img, $defaultImagePath);
                    imagedestroy($img);
                }

                // Set gambar default ke pengguna
                $field->image = $defaultImageName;
            }
        }

        // Update informasi pengguna lainnya
        $field->name = $request->name;
        $field->username = $request->username;
        $field->email = $request->email;
        $field->save(); // Simpan perubahan

        

        // Redirect ke halaman edit profile dengan pesan sukses
        return redirect()->route('editProfile', $id)->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function deleteAccount($id): RedirectResponse
    {
        // Mendapatkan pengguna berdasarkan ID
        $field = User::findOrFail($id);

        // Hapus gambar
        Storage::delete('public/profile/' . $field->image);

        // Hapus pengguna (soft delete)
        $field->delete();

        // Redirect ke beranda dengan pesan sukses
        return redirect()->route('beranda')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function forgotView()
    {
        return view('auth.forgot-password');
    }

    public function forgotSend(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => 'Tautan reset password telah dikirim!'])
            : back()->withErrors(['email' => 'Gagal mengirim tautan reset password. Pastikan email valid.']);
    }

    public function forgotHandler(string $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function forgotUpdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('logreg')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function trash(Request $request): View
    {
        // Mengambil email dari input (jika ada)
        $email = $request->input('email');

        // Mengambil pengguna yang dihapus (soft deleted)
        if ($email) {
            // Jika email diinput, cari pengguna berdasarkan email
            $users = User::onlyTrashed()->where('email', $email)->get();
        } else {
            // Jika tidak ada email, ambil semua pengguna yang dihapus
            $users = User::onlyTrashed()->get();
        }

        // Mengembalikan view dengan data pengguna yang dihapus
        return view('auth.trash', compact('users', 'email'));
    }

    public function restoreByEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::onlyTrashed()->where('email', $request->input('email'))->first();

        if ($user) {
            // Generate a unique token
            $token = Str::random(60);

            // Send verification email
            Mail::to($user->email)->send(new RestoreAccountVerification($user, $token));

            return redirect()->back()->with('status', 'Email verifikasi telah dikirim. Silakan periksa email Anda untuk melanjutkan pemulihan akun.');
        }

        return redirect()->back()->withErrors(['email' => 'Tidak ada pengguna yang ditemukan dengan email tersebut.']);
    }

    public function confirmRestore(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
        ]);

        // Temukan pengguna yang dihapus
        $users = User::onlyTrashed()->where('email', $request->input('email'))->first();

        if ($users) {
            // Restore pengguna
            $users->restore();
            return redirect()->route('after.restore', compact('users'))->with('status', 'Akun berhasil dipulihkan.');
        }

        return redirect()->route('trash')->withErrors(['email' => 'Akun tidak ditemukan.']);
    }

    public function afterRestore()
    {
        return view('auth.after-restore');
    }
}
