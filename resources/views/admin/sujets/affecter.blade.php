@extends('layouts.app')

@section('content')
<style>
    body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        background: url("{{ asset('assets/img/affecter.jpg') }}") no-repeat center center fixed;
        background-size: cover;
        font-family: 'Segoe UI', sans-serif;
    }

    .form-wrapper {
        max-width: 600px;
        margin: 80px 80px 80px auto;
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.25);
        color: #fff;
    }

    .form-wrapper h2 {
        font-weight: bold;
        margin-bottom: 30px;
        color: #ffffff;
    }

    .form-wrapper label {
        color: #ffffff;
        font-weight: 500;
    }

    .form-control,
    .form-select {
        background-color: rgba(255, 255, 255, 0.15);
        color: #fff;
        border: none;
        border-radius: 10px;
    }

    .form-control::placeholder {
        color: #ddd;
    }

    .form-select option {
        background-color: #fff;
        color: #000;
    }

    .btn-primary {
        background-color: #1abc9c;
        border: none;
        padding: 10px 24px;
        border-radius: 8px;
        font-weight: bold;
    }

    .btn-primary:hover {
        background-color: #16a085;
    }

    .btn-outline-light {
        color: #fff;
        border-color: #fff;
    }

    .btn-outline-light:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }

    @media (max-width: 768px) {
        .form-wrapper {
            margin: 40px auto;
        }
    }
</style>

<div class="form-wrapper">
    <a href="{{ route('admin.sujets.index') }}" class="btn btn-outline-light mb-3">
        ← Retour à la liste des sujets
    </a>

    <h2>👨‍🏫 Affecter un encadrant</h2>

    <p><strong>Sujet :</strong> {{ $sujet->titre }}</p>
    <p><strong>Étudiant :</strong> {{ $sujet->etudiant->nom }} {{ $sujet->etudiant->prenom }}</p>

    <form method="POST" action="{{ route('admin.affectations.store') }}">
        @csrf
        <input type="hidden" name="sujet_id" value="{{ $sujet->id }}">

        <div class="mb-3">
            <label for="encadrant_id" class="form-label">Sélectionner un encadrant :</label>
            <select name="encadrant_id" id="encadrant_id" class="form-select" required>
                <option value="">-- Choisir un encadrant --</option>
                @foreach($encadrants as $encadrant)
                    <option value="{{ $encadrant->id }}">{{ $encadrant->nom }} {{ $encadrant->prenom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Affecter</button>
    </form>
</div>
@endsection
