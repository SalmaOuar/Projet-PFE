<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\SujetPFE;
use Illuminate\Http\Request;
use App\Models\Rapport;


class EtudiantController extends Controller
{
    public function formSujet()
    {
        return view('etudiant.sujet_form');
    }

    public function soumettreSujet(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'anneeUniversitaire' => 'required|string',
        ]);

        SujetPFE::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'statut' => 'en attente',
            'anneeUniversitaire' => $request->anneeUniversitaire,
            'user_id' => Auth::id()
        ]);

        return redirect()->back()->with('success', 'Sujet soumis avec succès !');
    }

    public function dashboard()
{
    $sujet = SujetPFE::where('user_id', Auth::id())->latest()->first();
    $rapport = null;

    if ($sujet) {
        $rapport = Rapport::where('sujet_id', $sujet->id)->latest()->first();
    }
    return view('etudiant.dashboard', compact('sujet', 'rapport'));
}

public function etatProjet()
{
    $sujet =SujetPFE::with('etudiant')
        ->where('user_id', Auth::id())
        ->latest()
        ->first();

    return view('etudiant.etat_projet', compact('sujet'));
}

public function formUploadRapport()
{
    return view('etudiant.upload_rapport');
}

public function uploadRapport(Request $request)
{
    $request->validate([
        'rapport' => 'required|mimes:pdf|max:20480',
    ]);

    $sujet = SujetPFE::where('user_id', Auth::id())->latest()->first();

    if (!$sujet) {
        return back()->with('error', 'Aucun sujet trouvé.');
    }

    $path = $request->file('rapport')->store('rapports', 'public');

    // Si rapport déjà existant → update
    if ($sujet->rapport) {
        $sujet->rapport->update([
            'fichier' => $path,
            'dateDepot' => now(),
        ]);
    } else {
        Rapport::create([
            'fichier' => $path,
            'dateDepot' => now(),
            'sujet_id' => $sujet->id,
        ]);
    }

    return back()->with('success', 'Rapport soumis avec succès.');
}


public function showUploadForm()
{
    $sujet = SujetPFE::where('user_id', Auth::id())->latest()->first();
    $rapport = $sujet?->rapport;

    return view('etudiant.upload_rapport', compact('sujet', 'rapport'));
}


}
