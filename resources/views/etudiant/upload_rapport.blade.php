@extends('layouts.app')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #1abc9c, #0f2027);
        min-height: 100vh;
        color: #fff;
    }

    .upload-wrapper {
        max-width: 600px;
        margin: 60px auto;
        background-color: rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        padding: 40px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .upload-wrapper h2 {
        font-weight: bold;
        margin-bottom: 30px;
        text-align: center;
        color: #fff;
    }

    .form-label {
        font-weight: 600;
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
        color:rgb(0, 0, 0);
        font-weight: bold;
        text-decoration: none;
    }

    .back-link:hover {
        text-decoration: underline;
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
    </form>

    <a href="{{ route('etudiant.dashboard') }}" class="back-link">← Retour au tableau de bord</a>
</div>
@endsection
