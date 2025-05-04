<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginAdmin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'admin'])) {
            return redirect()->route('admin.dashboard');
        }
        return back()->with('error', 'Identifiants invalides');
    }

    public function loginEncadrant(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'encadrant'])) {
            return redirect()->route('encadrant.dashboard');
        }
        return back()->with('error', 'Identifiants invalides');
    }

    public function loginEtudiant(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'etudiant'])) {
            return redirect()->route('etudiant.dashboard');
        }
        return back()->with('error', 'Identifiants invalides');
    }
}
