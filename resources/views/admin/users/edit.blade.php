@extends('layouts.app')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #e6f4f1, #d4e0f0);
        min-height: 100vh;
        font-family: 'Segoe UI', sans-serif;
    }

    .form-container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 30px;
        margin: 40px 60px;
    }

    .form-wrapper {
        flex: 1;
        background-color: #ffffff;
        padding: 40px;
        border-radius: 16px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-weight: bold;
        margin-bottom: 30px;
        color: #1a202c;
    }

    .form-label {
        font-weight: 600;
        color: #333;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-label i {
        color: #198754;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
        padding: 12px;
        border: 1px solid #ccc;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #198754;
        box-shadow: 0 0 0 0.1rem rgba(25, 135, 84, 0.3);
    }

    .btn-save {
        background-color: #198754;
        color: white;
        font-weight: bold;
        padding: 10px 25px;
        border-radius: 8px;
        border: none;
    }

    .btn-save:hover {
        background-color: #157347;
    }

    .btn-cancel {
        background-color: #6c757d;
        color: white;
        padding: 10px 25px;
        border-radius: 8px;
        border: none;
        margin-left: 10px;
    }

    .image-section {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form-image {
    width: 100%;
    height: auto;
    max-width: 640px; 
    border-radius: 12px;
    box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
}


    .back-link {
        display: inline-block;
        margin-bottom: 20px;
        color: #198754;
        font-weight: 500;
    }

    .back-link:hover {
        text-decoration: underline;
    }

    @media (max-width: 992px) {
        .form-container {
            flex-direction: column;
            align-items: center;
        }

        .image-section {
            margin-top: 30px;
        }
    }
</style>

<div class="form-container">
    <!-- Formulaire -->
    <div class="form-wrapper">
        <a href="{{ route('admin.dashboard') }}" class="back-link">← Retour au tableau de bord</a>

        <h2><i class="fa-solid fa-pen-to-square" style="color: #198754;"></i> Modifier un utilisateur</h2>

        <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nom" class="form-label"><i class="fa-solid fa-user"></i> Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ $user->nom }}" required>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label"><i class="fa-solid fa-user"></i> Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $user->prenom }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label"><i class="fa-solid fa-envelope"></i> Adresse Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <div class="mb-4">
                <label for="role" class="form-label"><i class="fa-solid fa-user-tag"></i> Rôle</label>
                <select name="role" id="role" class="form-select" required>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="encadrant" {{ $user->role == 'encadrant' ? 'selected' : '' }}>Encadrant</option>
                    <option value="etudiant" {{ $user->role == 'etudiant' ? 'selected' : '' }}>Étudiant</option>
                </select>
            </div>

            <button type="submit" class="btn-save">
                <i class="fa-solid fa-floppy-disk"></i> Enregistrer les modifications
            </button>
            <a href="{{ route('admin.users.index') }}" class="btn-cancel">Annuler</a>
        </form>
    </div>

    <!-- Image à droite -->
    <div class="image-section">
    <img src="{{ asset('assets/img/user-edit.jpg') }}" alt="Modifier utilisateur" class="form-image">
    </div>
</div>
@endsection
