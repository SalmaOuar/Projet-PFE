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
        font-family: 'Segoe UI', sans-serif;
    }

    .upload-wrapper {
        max-width: 600px;
        margin: 60px auto;
        background-color: rgba(0, 0, 0, 0.4); /* assombrit le fond */
        backdrop-filter: blur(10px); /* effet de flou */
        border-radius: 15px;
        padding: 60px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }

    .upload-wrapper h2 {
        font-weight: bold;
        margin-bottom: 30px;
        text-align: center;
        color: #fff;
    }

    .form-label, .upload-wrapper p, .upload-wrapper a, .upload-wrapper h5 {
        color: #fff;
    }

    .btn-primary {
        background-color: #198754;
        border-color: #198754;
    }

    .btn-primary:hover {
        background-color: #157347;
    }

    .back-link {
        display: block;
        margin-top: 20px;
        text-align: center;
        color: #fff;
        font-weight: bold;
        text-decoration: none;
    }

    .back-link:hover {
        text-decoration: underline;
    }

    .alert {
        font-weight: 500;
    }
</style>


<div class="upload-wrapper">
    <h2>📤 Dépôt du Rapport Final</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('etudiant.rapport.upload') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="rapport" class="form-label">Fichier PDF du rapport</label>
            <input type="file" name="rapport" id="rapport" class="form-control" accept="application/pdf" required>
            @error('rapport')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">
            ✅ Envoyer le rapport
        </button>

        @if($rapport)
    <div class="mt-4 text-center">
        <h5 class="mb-3">📎 Rapport déjà soumis</h5>
        <a href="{{ asset('storage/' . $rapport->fichier) }}" class="btn btn-outline-light" target="_blank">
            📄 Voir le rapport
        </a>
        <p class="mt-2"><strong>Date de dépôt :</strong> {{ \Carbon\Carbon::parse($rapport->dateDepot)->format('d/m/Y') }}</p>
    </div>
@endif

    </form>

    <a href="{{ route('etudiant.dashboard') }}" class="back-link">← Retour au tableau de bord</a>
</div>
@endsection
