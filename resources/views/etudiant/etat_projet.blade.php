@extends('layouts.app')

@section('content')

<style>
body {
        background: linear-gradient(to right, #38b2ac, #0f172a);
        min-height: 100vh;
        color: #fff;
    }

    .back-link{
        color: black;
    }
</style>

<div class="container mt-5">
    <h2 class="mb-4">📊 État de votre Projet PFE</h2>

    @if($sujet)
        <div class="card shadow">
            <div class="card-body">
                <p><strong>Étudiant :</strong> {{ $sujet->etudiant->nom ?? '' }} {{ $sujet->etudiant->prenom ?? '' }}</p>
                <p class="card-title"><strong>Sujet : </strong>{{ $sujet->titre }}</p>
                <p class="card-text"><strong>Description : </strong> {{ $sujet->description }}</p>
                <p class="card-text"><strong>Année universitaire : </strong> {{ $sujet->anneeUniversitaire }}</p>
                <p class="card-text"><strong>Statut : </strong>
                    <span class="badge bg-{{ 
                        $sujet->statut == 'validé' ? 'success' : ($sujet->statut == 'refusé' ? 'danger' : 'warning') }}">
                        {{ ucfirst($sujet->statut) }}
                    </span>
                </p>
                <p class="card-text"><strong>Date de soumission :</strong> {{ $sujet->created_at->format('d/m/Y') }}</p>
            </div>
            <div class="mt-4 text-center">
            <a href="{{ route('etudiant.dashboard') }}" class="back-link">← Retour au tableau de bord</a>
</div>

</div>
        </div>
    @else
        <div class="alert alert-warning mt-3">
            Aucun sujet soumis pour le moment.
        </div>
</div>
    @endif
</div>
@endsection
