<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SujetPFE;
use App\Models\Evaluation;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
   

    public function form($sujetId)
    {
        $user = Auth::user();

        if ($user->role !== 'encadrant') {
            abort(403, 'Accès refusé');
        }
    
        $sujet = SujetPFE::findOrFail($sujetId);
        return view('encadrant.evaluation', compact('sujet'));
    }


    public function store(Request $request, $sujetId)
    {
        $user = Auth::user();

    if ($user->role !== 'encadrant') {
        abort(403, 'Accès refusé');
    }
        $request->validate([
            'note' => 'required|numeric|min:0|max:20',
            'commentaire' => 'nullable|string|max:1000',
        ]);

        /** @var User $user */
    $user = Auth::user(); 

    Evaluation::create([
        'sujet_id'     => $sujetId,
        'encadrant_id' => $user->id,
        'note'         => $request->note,
        'commentaire'  => $request->commentaire,
    ]);

        return redirect()->route('encadrant.dashboard')->with('success', 'Évaluation enregistrée avec succès.');
    }
}
