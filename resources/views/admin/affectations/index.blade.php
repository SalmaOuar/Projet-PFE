@extends('layouts.app')

@section('content')

<style>
    body {
        background: url("{{ asset('assets/img/affecter.jpg') }}") no-repeat center center fixed;
        background-size: cover;
        font-family: 'Segoe UI', sans-serif;
        color: #fff;
        min-height: 100vh;
    }

    .affectation-wrapper {
        max-width: 1000px;
        margin: 60px auto;
        background-color: rgba(255, 255, 255, 0.07);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 16px;
        padding: 40px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
    }

    .affectation-wrapper h2 {
        text-align: center;
        margin-bottom: 30px;
        font-weight: bold;
        color: #fff;
    }

    .form-select, .btn-primary {
        margin-top: 5px;
    }

    .btn-primary {
        background-color: #198754;
        border: none;
        font-weight: bold;
    }

    .btn-primary:hover {
        background-color: #157347;
    }

    table {
        background-color: rgba(255, 255, 255, 0.1);
        color: #fff;
        border-radius: 10px;
        overflow: hidden;
    }

    th {
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
    }

    td select {
        background-color: #fff;
        color: #000;
        border-radius: 6px;
        padding: 6px;
    }

    .alert {
        border-radius: 10px;
        font-weight: 500;
    }

    .input-group .form-select {
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
    }

    .input-group .btn {
        border-top-right-radius: 8px;
        border-bottom-right-radius: 8px;
    }

    @media (max-width: 768px) {
        .affectation-wrapper {
            padding: 20px;
        }
    }
</style>

<div class="affectation-wrapper">
    <h2>📌 Affectation des sujets aux encadrants</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if($sujets->isEmpty())
        <div class="alert alert-warning text-center">Aucun sujet à affecter pour le moment.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Étudiant</th>
                        <th>Titre du sujet</th>
                        <th>Année universitaire</th>
                        <th>Affecter à</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sujets as $index => $sujet)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $sujet->etudiant->nom }} {{ $sujet->etudiant->prenom }}</td>
                            <td>{{ $sujet->titre }}</td>
                            <td>{{ $sujet->anneeUniversitaire }}</td>
                            <td>
                                <form method="POST" action="{{ route('admin.affectations.store') }}">
                                    @csrf
                                    <input type="hidden" name="sujet_id" value="{{ $sujet->id }}">
                                    <div class="input-group">
                                        <select name="encadrant_id" class="form-select" required>
                                            <option value="">-- Sélectionner --</option>
                                            @foreach($encadrants as $encadrant)
                                                <option value="{{ $encadrant->id }}">{{ $encadrant->nom }} {{ $encadrant->prenom }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-primary">Affecter</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection
