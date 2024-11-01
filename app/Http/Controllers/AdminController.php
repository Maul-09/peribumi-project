<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Menghitung jumlah pengguna
        $userCount = User::count();

        return view('users.index', compact('userCount'));
    }
}
