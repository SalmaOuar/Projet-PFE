@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f4f6f9;
        font-family: 'Nunito', sans-serif;
    }

    .login-container {
        max-width: 450px;
        margin: 80px auto;
        padding: 40px;
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .login-title {
        font-weight: 700;
        margin-bottom: 25px;
        text-align: center;
        color: #2c3e50;
    }

    .form-label {
        font-weight: 600;
    }

    .btn-connexion {
        width: 100%;
        padding: 10px;
        font-weight: 600;
        border-radius: 8px;
        background-color: #2ecc71;
        border: none;
    }

    .btn-connexion:hover {
        background-color: #27ae60;
    }

    .back-link {
        display: block;
        text-align: center;
        margin-top: 20px;
        color:rgb(0, 0, 0);
        text-decoration: none;
    }

    .back-link:hover {
        color: #2ecc71;
        text-decoration: underline;
    }

    .forgot-password-link {
    display: block;
    margin-top: 15px;
    text-align: center;
    color:rgb(0, 0, 0);
    font-weight: 500;
    transition: all 0.3s ease;
    text-decoration: none;
}

.forgot-password-link:hover {
    color: #2ecc71;
    text-decoration: underline;
}
</style>

<div class="login-container">
    <h2 class="login-title">Connexion Administrateur</h2>
    <form method="POST" action="{{ route('login.admin') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Adresse Email</label>
            <input type="email" class="form-control" id="email" name="email" required autofocus>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-connexion">Connexion</button>

        <div class="text-center mt-3">
        <a href="#" class="forgot-password-link">Mot de passe oublié ?</a>
        </div>

    </form>

    


    <a href="{{ url('/') }}" class="back-link">← Retour à l’accueil</a>
</div>
@endsection