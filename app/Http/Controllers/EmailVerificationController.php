<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function signup()
    {
        return view('auth.verify_email');
    }

    public function request(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()
            ->with('success', 'Verification link sent!');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->to('/beranda'); // <-- change this to whatever you want
    }
}
