@extends('layouts.app')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #f0f4f8, #d9e8f0);
        background-image: url("{{ asset('assets/img/evaluation1.png') }}");
        background-repeat: no-repeat;
        background-position: top left;
        background-size: 300px auto;
        min-height: 100vh;
        font-family: 'Segoe UI', sans-serif;
    }

    .evaluation-container {
        max-width: 700px;
        margin: 80px auto;
        background-color: #ffffffdd;
        padding: 40px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-weight: bold;
        margin-bottom: 30px;
        color: #0a3d62;
        text-align: center;
    }

    label {
        font-weight: 600;
        margin-bottom: 10px;
        color: #333;
    }

    input[type="number"],
    textarea {
        border-radius: 12px;
        padding: 12px;
        border: 1px solid #ccc;
        width: 100%;
    }

    input:focus,
    textarea:focus {
        outline: none;
        border-color: #198754;
        box-shadow: 0 0 0 0.15rem rgba(25, 135, 84, 0.25);
    }

    /* 💬 Nuage autour du commentaire */
    #commentaire {
        background-color: #f5faff;
        border: 2px dashed #198754;
        border-radius: 25px;
        box-shadow: 0 4px 12px rgba(25, 135, 84, 0.1);
    }

    .btn-save {
        background-color: #198754;
        color: white;
        font-weight: bold;
        padding: 10px 24px;
        border-radius: 8px;
        border: none;
        margin-top: 20px;
        display: block;
        width: 100%;
    }

    .btn-save:hover {
        background-color: #146c43;
    }

</style>

<div class="evaluation-container">
    <h2>📋 Évaluer le sujet : <span style="color: #198754;">{{ $sujet->titre }}</span></h2>

    <form method="POST" action="{{ route('encadrant.evaluation.store', $sujet->id) }}">
        @csrf

        <div class="mb-3">
            <label for="note">Note (/20)</label>
            <input type="number" name="note" id="note" min="0" max="20" required>
        </div>

        <div class="mb-3">
            <label for="commentaire">Commentaire</label>
            <textarea name="commentaire" id="commentaire" rows="5" placeholder="Exprimez ici vos remarques, conseils ou encouragements..."></textarea>
        </div>

        <button type="submit" class="btn-save">✅ Enregistrer l’évaluation</button>
    </form>
</div>

@endsection
