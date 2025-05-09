@extends('layouts.app')

@section('content')
<style>
    body {
        background: url("{{ asset('assets/img/affecter.jpg') }}") no-repeat center center fixed;
        background-size: cover;
        font-family: 'Segoe UI', sans-serif;
        min-height: 100vh;
        color: #fff;
    }

    .dashboard-wrapper {
        max-width: 1100px;
        margin: 60px auto;
        background-color: rgba(255, 255, 255, 0.06);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .dashboard-wrapper h2 {
        font-weight: bold;
        margin-bottom: 30px;
        text-align: center;
        color: #fff;
    }

    .table {
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    th {
        background-color: rgba(0, 0, 0, 0.8);
        color: #fff;
    }

    td {
        color: #fff;
        vertical-align: middle;
    }

    .btn-success {
        background-color: #198754;
        border: none;
    }

    .btn-success:hover {
        background-color: #146c43;
    }

    .btn-info {
        background-color: #0dcaf0;
        border: none;
    }

    .btn-info:hover {
        background-color: #31d2f2;
    }

    .badge {
        padding: 6px 12px;
        font-size: 0.9rem;
        border-radius: 20px;
        font-weight: 500;
    }

    .bg-validé {
        background-color: #198754;
        color: white;
    }

    .bg-refusé {
        background-color: #dc3545;
        color: white;
    }

    .bg-attente {
        background-color: #ffc107;
        color: black;
    }

    .text-muted {
        color: #ccc !important;
    }

    .alert {
        border-radius: 10px;
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .dashboard-wrapper {
            padding: 20px;
        }
    }
</style>

<div class="dashboard-wrapper">
    <h2>👨‍🏫 Espace Encadrant – Suivi des Étudiants</h2>

    @if(session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if($etudiants->isEmpty())
    <div class="alert alert-warning text-center">Aucun étudiant encadré pour le moment.</div>
    @else
    <div class="table-responsive">
        <table class="table table-hover text-center align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom Étudiant</th>
                    <th>Sujet</th>
                    <th>Année</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($etudiants as $index => $etudiant)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $etudiant->nom }} {{ $etudiant->prenom }}</td>
                    <td>{{ $etudiant->sujet->titre ?? '---' }}</td>
                    <td>{{ $etudiant->sujet->anneeUniversitaire ?? '-' }}</td>
                    <td>
                        @php
                            $statut = strtolower($etudiant->sujet->statut ?? 'attente');
                        @endphp
                        <span class="badge bg-{{ $statut }}">{{ ucfirst($etudiant->sujet->statut ?? 'En attente') }}</span>
                    </td>
                    <td>
                        @if($etudiant->sujet && $etudiant->sujet->rapport)
                        <a href="{{ asset('storage/' . $etudiant->sujet->rapport->fichier) }}" class="btn btn-sm btn-info" target="_blank">📄 Voir rapport</a>
                        <a href="{{ route('encadrant.evaluation.form', $etudiant->sujet->id) }}" class="btn btn-sm btn-success">✍️ Évaluer</a>
                        @else
                        <span class="text-muted">Aucun rapport</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
