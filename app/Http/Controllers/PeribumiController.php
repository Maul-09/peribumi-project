<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PeribumiController extends Controller
{
    public function beranda()
    {
        return view('beranda');
    }

    public function manajemen()
    {
        return view('manajemen');
    }

    public function training()
    {
        return view('training');
    }

    public function personal()
    {
        return view('personal');
    }

    public function digital()
    {
        return view('digital');
    }

    public function event()
    {
        return view('event');
    }

    public function register()
    {
        return view('/auth/register');
    }

    // public function postStore(Request $request)
    // {
    //     $peribumi = new Peribumi();
    //     $peribumi->first_name = $request->first_name;
    //     $peribumi->last_name = $request->last_name;
    //     $peribumi->email = $request->email;
    //     $peribumi->username = $request->username;
    //     $peribumi->password = bcrypt($request->password);
    //     $peribumi->save();
    //     dd($peribumi);
    //     return redirect()->route('login');

    // }

    public function postStore(Request $request)
    {
        $request->validate([
            'first_name'    => 'required',
            'last_name'    => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        $input = $request->all();

        User::create($input);

        dd($input);

        // return redirect()->route('listanggota.getIndex')->with('success', 'Anggota telah ditambahkan.');
    }
}
