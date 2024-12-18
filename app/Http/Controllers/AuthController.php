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
        // Validasi input
        $field = $request->validate(
            [
                'name' => ['required', 'max:255'],
                'email' => ['required', 'max:255', 'email', 'unique:users'],
                'username' => ['required', 'max:255'],
                'password' => ['required', 'min:8'],
                'password_confirmation' => ['required', 'same:password'],
            ],
            [
                'name.required' => 'Nama wajib diisi',
                'name.max' => 'Nama tidak boleh lebih dari 255 karakter',
                'email.required' => 'Email wajib diisi',
                'email.max' => 'Email tidak boleh lebih dari 255 karakter',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah digunakan',
                'username.required' => 'Username wajib diisi',
                'username.max' => 'Username tidak boleh lebih dari 255 karakter',
                'password.required' => 'Password wajib diisi',
                'password.min' => 'Password minimal 8 karakter',
                'password_confirmation.required' => '',
                'password_confirmation.same' => 'Konfirmasi password tidak sesuai',
            ]
        );

        // Enkripsi password
        $field['password'] = bcrypt($field['password']);

        // Simpan user ke database
        $peribumi = User::create($field);

        // Login otomatis
        Auth::login($peribumi);

        // Trigger event pendaftaran
        event(new Registered($peribumi));

        // Redirect ke halaman notifikasi verifikasi
        return redirect()->route('verification.notice');
    }



    public function register()
    {
        return view('auth.register');
    }

    public function signin(Request $request)
    {
        // Validate the incoming request
        $request->validate(
            [
                'username' => 'required|string',
                'password' => 'required|string',
                'remember' => 'nullable|boolean', // Optional remember me field
            ],
            [
                'username.required' => 'Username wajib diisi',
                'username.max' => 'Username tidak boleh lebih dari 255 karakter',
                'password.required' => 'Password wajib diisi',
                'password.min' => 'Password minimal 8 karakter',
            ]
        );

        // Retrieve the credentials
        $data = $request->only('username', 'password');
        $remember = $request->has('remember'); // Check if 'remember' checkbox was checked

        // Attempt to authenticate the user
        if (Auth::attempt($data, $remember)) {
            // Regenerate the session to prevent session fixation
            $request->session()->regenerate();

            // Check the user type and redirect accordingly
            if ($request->user()->usertype === 'admin') {

                return redirect()->route('admin');
            }

            $field = Auth::user();

            return redirect()->route('beranda')->with('success', 'Selamat datang kembali, ' . $field->name);
        } else {
            return redirect()->back()->with('Failed', 'Username atau password anda salah!');
        }
    }

    public function logout()
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
        $field = Auth::user();

        return redirect()->route('beranda')->with('register', 'Hello, Welcome to Peribumi Consultan ' . $field->name);
    }

    public function verifyHandler(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
