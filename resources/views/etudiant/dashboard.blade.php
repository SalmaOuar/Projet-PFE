@extends('layouts.app')

@section('content')
<style>
    body {
        background-image: url("{{ asset('assets/img/student.jpg') }}");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
        min-height: 100vh;
        color: #fff;
    }

    .dashboard-wrapper {
        max-width: 1000px;
        margin: 50px auto;
        padding: 30px;
        background-color: rgba(0, 0, 0, 0.7); 
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    .dashboard-wrapper h2 {
        font-weight: bold;
        margin-bottom: 30px;
        color: #fff;
    }

    .dashboard-actions .btn {
        margin-bottom: 15px;
        width: 100%;
        font-weight: 500;
    }

    .card-custom {
        background-color: rgba(24, 23, 23, 0.08);
        border: none;
    }

    .card-custom .card-body {
        color: #fff;
    }

    .badge-statut {
        font-size: 0.9rem;
        padding: 6px 10px;
        border-radius: 15px;
    }

    .badge-attente {
        background-color: #ffc107;
        color: #000;
    }

    .badge-validé {
        background-color: #198754;
        color: #fff;
    }

    .badge-refusé {
        background-color: #dc3545;
        color: #fff;
    }

    .card-header h5 {
        color: #eee;
    }
</style>

<div class="dashboard-wrapper">
    <h2 class="text-center">Bienvenue dans l'espace Étudiant</h2>
    <p class="text-center">Soumettez vos propositions de sujets et suivez leur validation.</p>

    <div class="row mt-4 dashboard-actions">
        <div class="col-md-4">
            <a href="{{ route('etudiant.sujet.form') }}" class="btn btn-success">
                ➕ Soumettre un sujet de PFE
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('etudiant.etat') }}" class="btn btn-info">
                🔍 Consulter l'état du projet
            </a>
        </div>
        <div class="col-md-4">
            @if($rapport)
            <a href="{{ asset('storage/' . $rapport->fichier) }}" class="btn btn-dark" target="_blank">
                📄 Voir le rapport final
            </a>
            @else
            <a href="{{ route('etudiant.rapport.upload') }}" class="btn btn-dark">
                📤 Uploader le rapport final
            </a>
            @endif
        </div>
    </div>

    @if(isset($sujet))
    <div class="card card-custom mt-5">
        <div class="card-header">
            <h5 class="mb-0">📄 Votre sujet soumis</h5>
        </div>
        <div class="card-body">
            <p><strong>Titre :</strong> {{ $sujet->titre }}</p>
            <p><strong>Description :</strong> {{ $sujet->description }}</p>
            <p><strong>Année universitaire :</strong> {{ $sujet->anneeUniversitaire }}</p>
            <p><strong>Statut :</strong>
                <span class="badge badge-statut badge-{{ strtolower(str_replace(' ', '-', $sujet->statut)) }}">
                    {{ ucfirst($sujet->statut) }}
                </span>
            </p>
            <p><strong>Date de soumission :</strong> {{ $sujet->created_at->format('d/m/Y') }}</p>
        </div>
    </div>
    @else
    <div class="alert alert-warning text-center mt-4">Aucun sujet soumis pour le moment.</div>
    @endif

    @if(isset($rapport))
    <div class="card card-custom mt-4">
        <div class="card-header">
            <h5 class="mb-0">📎 Rapport déposé</h5>
        </div>
        <div class="card-body">
            <p><strong>Fichier :</strong>
                <a href="{{ asset('storage/' . $rapport->fichier) }}" class="btn btn-outline-light" target="_blank">
                    📄 Voir le rapport
                </a>
            </p>
            <p><strong>Date de dépôt :</strong> {{ \Carbon\Carbon::parse($rapport->dateDepot)->format('d/m/Y') }}</p>
        </div>
    </div>
    @endif
</div>
@endsection
