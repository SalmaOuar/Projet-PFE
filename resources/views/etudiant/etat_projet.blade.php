@extends('layouts.app')

@section('content')

<style>
    body {
        background-image: url("{{ asset('assets/img/student.jpg') }}");
        background-repeat: no-repeat;
        background-position: center;
        background-size: 1800px;
        background-attachment: fixed;
        min-height: 100vh;
        font-family: 'Segoe UI', sans-serif;
    }

    .etat-wrapper {
        max-width: 900px;
        margin: 80px auto;
        background-color: rgba(255, 255, 255, 0.9); /* blanc plus opaque */
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        color: #212529; 
    }

    .etat-wrapper h2 {
        text-align: center;
        margin-bottom: 100px;
        font-weight: bold;
        color: #0f172a;
    }

    .etat-wrapper p {
        font-size: 1.1rem;
        margin-bottom: 10px;
    }

    .etat-wrapper p strong {
        color: #000; /* noir pour les titres */
    }

    .btn-retour {
        margin-top: 30px;
        display: inline-block;
    }
</style>

<div class="etat-wrapper">
    <h2>📊 État de votre Projet PFE</h2>

    @if($sujet)
        <p><strong>👨‍🎓 Étudiant :</strong> {{ $sujet->etudiant->nom ?? '' }} {{ $sujet->etudiant->prenom ?? '' }}</p>
        <p><strong>📘 Sujet :</strong> {{ $sujet->titre }}</p>
        <p><strong>📝 Description :</strong> {{ $sujet->description }}</p>
        <p><strong>📅 Année universitaire :</strong> {{ $sujet->anneeUniversitaire }}</p>
        <p><strong>🔖 Statut :</strong>
            <span class="badge bg-{{ 
                $sujet->statut == 'validé' ? 'success' : ($sujet->statut == 'refusé' ? 'danger' : 'warning') }}">
                {{ ucfirst($sujet->statut) }}
            </span>
        </p>
        <p><strong>🕓 Date de soumission :</strong> {{ $sujet->created_at->format('d/m/Y') }}</p>

        <div class="text-center">
            <a href="{{ route('etudiant.dashboard') }}" class="btn btn-outline-dark btn-retour">← Retour au tableau de bord</a>
        </div>
    @else
        <div class="alert alert-warning text-center">
            Aucun sujet soumis pour le moment.
        </div>
    @endif
</div>

@endsection
