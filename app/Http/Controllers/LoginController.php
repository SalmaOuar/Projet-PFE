<?php
namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); 
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->intended('/welcome'); 
        }

        return back()->with('error', 'Invalid username or password');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    protected function authenticated(Request $request, $user)
{
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->role === 'encadrant') {
        return redirect()->route('encadrant.dashboard');
    } elseif ($user->role === 'etudiant') {
        return redirect()->route('etudiant.dashboard');
    } else {
        return redirect('/'); 
    }
}
}
