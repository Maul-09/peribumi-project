<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

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
}