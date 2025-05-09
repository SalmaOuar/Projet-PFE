<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EncadrantController extends Controller
{
    public function dashboard()
    {
        $encadrantId = Auth::id();

        $etudiants = User::where('role', 'etudiant')
            ->whereHas('sujet', function ($query) use ($encadrantId) {
                $query->where('encadrant_id', $encadrantId);
            })
            ->with('sujet.rapport')
            ->get();

        return view('encadrant.dashboard', ['etudiants' => $etudiants]);
    }
}
