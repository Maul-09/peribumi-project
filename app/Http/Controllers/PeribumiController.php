<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class PeribumiController extends Controller
{
    public function beranda()
    {
        return view('user\beranda');
    }

    public function manajemen()
    {
        return view('user\manajemen');
    }

    public function training()
    {
        return view('user\training');
    }

    public function personal()
    {
        return view('user\personal');
    }

    public function digital()
    {
        return view('user\digital');
    }

    public function event()
    {
        return view('user\event');
    }

    public function authentication()
    {
        return view('auth/logreg');
    }

    public function signup(Request $request)
    {
        $peribumi = new User();
        $peribumi->name = $request->name;
        $peribumi->email = $request->email;
        $peribumi->username = $request->username;
        $peribumi->password = bcrypt($request->password);
        $peribumi->save();
        // event(new Registered($peribumi));
        return redirect()->route('logreg', ['#signin']);
    }

    public function signin(Request $request)
    {
        $data = $request->only('username', 'password');

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->route('beranda');
        } else {
            return redirect()->back()->with('Failed', 'Username atau password anda salah!');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('beranda');
    }
}
