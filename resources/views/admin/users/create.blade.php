@extends('layouts.app')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #e8f0fe, #d0e2ff);
        min-height: 100vh;
        font-family: 'Segoe UI', sans-serif;
    }

    .form-wrapper {
        max-width: 700px;
        margin: 50px auto;
        background-color: #ffffff;
        padding: 40px;
        border-radius: 1px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-weight: bold;
        margin-bottom: 30px;
        color: #1a202c;
        text-align: center;
    }

    .form-label {
        font-weight: 600;
        color: #333;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
        padding: 12px;
        border: 1px solid #ccc;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.1rem rgba(13, 110, 253, 0.25);
    }

    .btn-save {
        background-color: #0d6efd;
        color: white;
        font-weight: bold;
        padding: 10px 25px;
        border-radius: 8px;
        border: none;
    }

    .btn-cancel {
        background-color: #adb5bd;
        color: white;
        padding: 10px 25px;
        border-radius: 8px;
        border: none;
        margin-left: 10px;
    }

    .back-link {
        display: inline-block;
        margin-bottom: 20px;
        color: #0d6efd;
        font-weight: 500;
    }

    .back-link:hover {
        text-decoration: underline;
    }

    .fa-solid {
        width: 20px;
        text-align: center;
        color: #0d6efd;
    }
</style>


<div class="form-wrapper">
    

    <h2><i class="fas fa-user-plus"></i> Ajouter un utilisateur</h2>

    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label"><i class="fa-solid fa-user"></i> Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label"><i class="fa-solid fa-user"></i> Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label"><i class="fa-solid fa-envelope"></i> Adresse Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label"><i class="fa-solid fa-lock"></i> Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" required minlength="6">
        </div>

        <div class="mb-4">
            <label for="role" class="form-label"><i class="fa-solid fa-user-tag"></i> Rôle</label>
            <select name="role" id="role" class="form-select" required>
                <option value="admin">Admin</option>
                <option value="encadrant">Encadrant(e)</option>
                <option value="etudiant">Étudiant(e)</option>
            </select>
        </div>

        <button type="submit" class="btn-save">Enregistrer</button>
        <a href="{{ route('admin.users.index') }}" class="btn-cancel">Annuler</a>
    </form>
    <a href="{{ route('admin.dashboard') }}" class="back-link">← Retour au tableau de bord</a>
</div>
@endsection
