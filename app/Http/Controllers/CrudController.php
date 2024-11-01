<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Mail\RestoreAccountVerification;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

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

        // Merender tampilan dengan data pengguna
        return view('user.profile-view', compact('field'));
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
            'username' => ['required', 'max:255'],
            'password' => ['required', 'min:8'],
        ]);

        // Mendapatkan pengguna berdasarkan ID
        $field = User::findOrFail($id);

        // Cek jika gambar diupload
        if ($request->hasFile('image')) {
            // Upload gambar baru
            $image = $request->file('image');
            $image->storeAs('public/profile', $image->hashName());

            // Hapus gambar lama
            Storage::delete('public/profile/' . $field->image);

            // Update pengguna dengan gambar baru
            $field->update([
                'image' => $image->hashName(),
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password), // Mengenkripsi password
            ]);
        } else {
            // Update pengguna tanpa gambar
            $field->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password), // Mengenkripsi password
            ]);
        }

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
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
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
