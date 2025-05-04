<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\SujetPFE;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalSujets = SujetPFE::count();

        return view('admin.dashboard', compact('totalUsers', 'totalSujets'));
    }
}
