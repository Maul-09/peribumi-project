<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function admin()
    {
        // Menghitung jumlah pengguna dengan usertype 'user'
        $userCount = User::where('usertype', 'user')->count();
        // Mengembalikan view dashboard dengan data userCount
        return view('admin.dashboard', compact('userCount'));
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
