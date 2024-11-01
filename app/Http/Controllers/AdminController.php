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

    public function manajemenAdmin()
    {
        return view('admin.manajemen-business');
    }

    public function trainingAdmin()
    {
        return view('admin.training-center');
    }

    public function digitalAdmin()
    {
        return view('admin.digital-solution');
    }

    public function personalAdmin()
    {
        return view('admin.personal-development');
    }

    public function organizerAdmin()
    {
        return view('admin.organizer');
    }
}
