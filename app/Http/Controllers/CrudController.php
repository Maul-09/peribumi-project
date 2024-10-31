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
        //get product by ID
        $field = User::findOrFail($id);

        //render view with product
        return view('user.profile-view', compact('users'));
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
        //validate form
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'username' => ['required', 'max:255'],
            'password' => ['required', 'min:8'],
        ]);

        //get product by ID
        $field = User::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/profile', $image->hashName());

            //delete old image
            Storage::delete('public/profile/'.$field->image);

            //update product with new image
            $field->update([
                'image'         => $image->hashName(),
                'name'         => $request->name,
                'username'   => $request->username,
                'email'         => $request->email,
                'password'         => $request->password
            ]);

        } else {

            //update product without image
            $field->update([
                'name'         => $request->name,
                'username'   => $request->username,
                'email'         => $request->email,
                'password'         => $request->password
            ]);
        }

        //redirect to index
        return redirect()->route('editProfile')->with(['success' => 'Data Berhasil Diubah!']);
    }
}