<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function visitor()
    {
        // Data untuk chart
        $today = Visitor::whereDate('created_at', Carbon::today())->count();
        $thisWeek = Visitor::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $thisMonth = Visitor::whereMonth('created_at', Carbon::now()->month)->count();

        return view('admin.dashboard', compact('today', 'thisWeek', 'thisMonth'));
    }
}
