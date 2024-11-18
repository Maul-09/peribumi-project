<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LmsController extends Controller
{
    public function lmshome() {
        return view('lms.home');
    }
    public function lmscourse() {
        return view('lms.course');
    }
}
