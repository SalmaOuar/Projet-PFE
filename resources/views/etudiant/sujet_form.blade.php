@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(to right, #38b2ac, #0f172a);
        background-image: url("{{ asset('assets/img/sujStudent.jpg') }}");
        background-repeat: no-repeat;
        background-position: top left;
        background-size: 399px;
        min-height: 100vh;
        font-family: 'Segoe UI', sans-serif;
    }

    .form-wrapper {
        max-width: 650px;
        margin: 60px auto;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        backdrop-filter: blur(10px);
        padding: 40px;
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.2);
        color: #fff;
    }

    .form-title {
        font-weight: bold;
        margin-bottom: 30px;
        text-align: center;
        font-size: 24px;
        color: #198754;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 5px;
        color:rgb(14, 13, 13);
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ccc;
        padding: 12px;
    }

    .form-control:focus {
        border-color: #198754;
        box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.25);
    }

    .btn-submit {
        background-color: #198754;
        border: none;
        width: 100%;
        padding: 12px;
        font-weight: bold;
        border-radius: 8px;
        color: white;
        margin-top: 15px;
    }

    .btn-submit:hover {
        background-color: #157347;
    }

    .back-link {
        display: inline-block;
        margin-top: 20px;
        color:rgb(8, 7, 7);
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
            <label for="titre" class="form-label">Titre du sujet</label>
            <input type="text" name="titre" id="titre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="annee_universitaire" class="form-label">Année universitaire</label>
            <input type="text" name="anneeUniversitaire" id="anneeUniversitaire" class="form-control" placeholder="ex: 2024/2025" required>
        </div>

        <button type="submit" class="btn-submit">✅ Soumettre le sujet</button>
    </form>

    <a href="{{ route('etudiant.dashboard') }}" class="back-link">← Retour au tableau de bord</a>
</div>
@endsection
