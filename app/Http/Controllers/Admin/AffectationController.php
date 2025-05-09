<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sujets = \App\Models\SujetPFE::whereNull('encadrant_id')->with('etudiant')->get();
        $encadrants = \App\Models\User::where('role', 'encadrant')->get();
    
        return view('admin.affectations.index', compact('sujets', 'encadrants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sujet_id' => 'required|exists:sujet_p_f_e_s,id',
            'encadrant_id' => 'required|exists:users,id',
        ]);
    
        $sujet = \App\Models\SujetPFE::findOrFail($request->sujet_id);
        $sujet->encadrant_id = $request->encadrant_id;
        $sujet->save();
    
        return redirect()->back()->with('success', 'Sujet affecté avec succès !');
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
}
