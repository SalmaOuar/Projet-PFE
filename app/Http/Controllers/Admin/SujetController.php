<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SujetPFE;
use App\Models\User;

class SujetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sujets = SujetPFE::with('etudiant')->latest()->get();

        return view('admin.sujets.index', compact('sujets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function valider($id)
{
    $sujet = SujetPFE::findOrFail($id);
    $sujet->statut = 'validé';
    $sujet->save();
    return back()->with('success', 'Sujet validé avec succès.');
}

public function refuser($id)
{
    $sujet = SujetPFE::findOrFail($id);
    $sujet->statut = 'refusé';
    $sujet->save();
    return back()->with('success', 'Sujet refusé avec succès.');
}

public function formAffecter($id)
{
    $sujet = SujetPFE::findOrFail($id);
    $encadrants = User::where('role', 'encadrant')->get();
    return view('admin.sujets.affecter', compact('sujet', 'encadrants'));
}

}
