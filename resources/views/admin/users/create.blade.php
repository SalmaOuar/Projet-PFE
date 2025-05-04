@extends('layouts.app')

@section('content')

<style>
    body {
        background: linear-gradient(135deg,rgb(24, 234, 136), #000000); 
        min-height: 100vh;
    }

    .form-wrapper {
        max-width: 800px;
        margin: 40px auto;
        background-color: rgba(255, 255, 255, 0.97);
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.2);
    }

    .form-label {
        font-weight: bold;
        font-size: 1rem;
        color: #212529; /* noir légèrement adouci */
    }
</style>
<div class="container mt-4">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary mb-3">
        ← Retour au tableau de bord
    </a>

    <h2 class="mb-4">➕ Ajouter un utilisateur</h2>

    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Adresse Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" id="password" class="form-control" required minlength="6">
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Rôle</label>
            <select name="role" id="role" class="form-select" required>
                <option value="admin">Admin</option>
                <option value="encadrant">Encadrant(e)</option>
                <option value="etudiant">Étudiant(e)</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection