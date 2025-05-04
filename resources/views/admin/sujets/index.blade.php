@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, rgb(24, 234, 136), #000000);
        min-height: 100vh;
    }

    .sujets-wrapper {
        max-width: 1100px;
        margin: 30px auto;
        background: #fff;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .sujets-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .table thead {
        background-color: #f8f9fa;
        font-weight: 600;
    }

    .badge-statut {
        color: #000;
        font-size: 13px;
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

    .btn-action {
        font-size: 13px;
        padding: 5px 10px;
        margin: 2px;
    }
</style>

<div class="sujets-wrapper">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark mb-3">
        ← Retour au tableau de bord
    </a>

    <div class="sujets-header">
        <h2 class="fw-bold"><i class="bi bi-journal-text"></i> Sujets de PFE</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Étudiant</th>
                    <th>Année universitaire</th>
                    <th>Statut</th>
                    <th>Date de soumission</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sujets as $sujet)
                    <tr>
                        <td>{{ $sujet->id }}</td>
                        <td>{{ $sujet->titre }}</td>
                        <td>{{ $sujet->etudiant->nom ?? '' }} {{ $sujet->etudiant->prenom ?? '' }}</td>
                        <td>{{ $sujet->anneeUniversitaire }}</td>
                        <td>
                            <span class="badge badge-statut badge-{{ strtolower($sujet->statut) }}">
                                {{ ucfirst($sujet->statut) }}
                            </span>
                        </td>
                        <td>{{ $sujet->created_at->format('d/m/Y') }}</td>
                        <td>
                            @if($sujet->statut === 'en attente')
                                <form action="{{ route('admin.sujets.valider', $sujet->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm btn-action">✔️ Valider</button>
                                </form>
                                <form action="{{ route('admin.sujets.refuser', $sujet->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm btn-action">❌ Refuser</button>
                                </form>
                            @else
                                <span class="text-muted small">Aucune action</span>
                            @endif
                            
                            <a href="{{ route('admin.affecter.form', $sujet->id) }}" class="btn btn-primary btn-sm btn-action mt-1">
                                👨‍🏫 Affecter
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-muted text-center">Aucun sujet proposé pour le moment.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
