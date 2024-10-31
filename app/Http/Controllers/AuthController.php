<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    public function signup(Request $request)
    {

        $field = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'username' => ['required', 'max:255'],
            'password' => ['required', 'min:8'],
        ]);

        $field['password'] = bcrypt($field['password']);
        $peribumi = User::create($field);

        // $peribumi = new User();
        // $peribumi->name = $request->name;
        // $peribumi->email = $request->email;
        // $peribumi->username = $request->username;
        // $peribumi->password = bcrypt($request->password);
        // $peribumi->save();

        Auth::login($peribumi);

        event(new Registered($peribumi));
        // event(new Registered($peribumi));
        return redirect()->route('verification.notice');
    }

    public function signin(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'remember' => 'nullable|boolean', // Optional remember me field
        ]);

        // Retrieve the credentials
        $data = $request->only('username', 'password');
        $remember = $request->has('remember'); // Check if 'remember' checkbox was checked

        // Attempt to authenticate the user
        if (Auth::attempt($data, $remember)) {
            // Regenerate the session to prevent session fixation
            $request->session()->regenerate();

            // Check the user type and redirect accordingly
            if ($request->user()->usertype === 'admin') {
                return redirect('admin/dashboard');
            }

            return redirect()->route('beranda');
        } else {
            return redirect()->back()->with('Failed', 'Username atau password anda salah!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('beranda');
    }

    public function verifyNotice()
    {
        return view('auth.verify-email');
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('beranda');
    }

    public function verifyHandler(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }

    public function admin()
    {
        return view('admin.dashboard');
    }
}
