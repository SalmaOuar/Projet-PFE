@extends('layouts.app')

@section('content')
<style>
  body {
        background: linear-gradient(to right, #38b2ac, #0f172a);
        min-height: 100vh;
        color: #fff;
    }
    .form-wrapper {
        max-width: 700px;
        margin: 50px auto;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        padding: 40px;
    }

    .form-title {
        font-weight: bold;
        margin-bottom: 30px;
        color: #2c3e50;
        text-align: center;
    }

    .btn-primary {
        background-color: #198754;
        border-color: #198754;
    }

    .btn-primary:hover {
        background-color: #157347;
        border-color: #157347;
    }

    .back-link {
        display: inline-block;
        margin-top: 20px;
        color:rgb(0, 0, 0);
        text-decoration: none;
    }

    .back-link:hover {
        text-decoration: underline;
    }
</style>

<div class="form-wrapper">
    <h2 class="form-title">📄 Soumettre un sujet de PFE</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('etudiant.sujet.soumettre') }}">
        @csrf

        <div class="mb-3">
            <label for="titre" class="form-label fw-bold">Titre du sujet</label>
            <input type="text" name="titre" id="titre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="annee_universitaire" class="form-label fw-bold">Année universitaire</label>
            <input type="text" name="anneeUniversitaire" id="anneeUniversitaire" class="form-control" placeholder="ex: 2024/2025" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">✅ Soumettre le sujet</button>
    </form>

    <a href="{{ route('etudiant.dashboard') }}" class="back-link">← Retour au tableau de bord</a>
</div>
@endsection
