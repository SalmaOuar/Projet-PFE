@extends('layouts.app')

@section('content')
@php
    use App\Models\User;
    use App\Models\SujetPFE;

    $totalUsers = User::count();
    $totalSujets = SujetPFE::count();
@endphp

<style>
    body {
        background: linear-gradient(135deg, rgb(24, 234, 136), #000000);
        min-height: 100vh;
        color: #fff;
    }

    .admin-container {
        display: flex;
        min-height: 80vh;
    }

    .sidebar {
        width: 250px;
        background-color: rgba(0, 0, 0, 0.3);
        padding: 20px;
        border-right: 1px solid #198754;
        color: #fff;
    }

    .sidebar h4 {
        font-weight: bold;
        margin-bottom: 20px;
    }

    .sidebar a {
        display: block;
        margin: 12px 0;
        color: #fff;
        padding: 10px;
        border-radius: 8px;
        background-color: rgba(255, 255, 255, 0.05);
        text-decoration: none;
        transition: 0.3s;
    }

    .sidebar a:hover {
        background-color: rgba(255, 255, 255, 0.2);
        color: #fff;
    }

    .admin-main {
        flex: 1;
        padding: 40px;
    }

    .admin-main h2 {
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-box {
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        padding: 25px;
        margin-top: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .card-box h5 {
        font-size: 1.3rem;
        margin-bottom: 15px;
        color: #fff;
    }

    .card-box ul {
        list-style-type: disc;
        padding-left: 20px;
    }

    .card-box li {
        margin-bottom: 8px;
    }

    .badge-count {
        background: #0dcaf0;
        color: #000;
        padding: 4px 10px;
        border-radius: 10px;
        font-weight: bold;
    }
</style>

<div class="admin-container">

    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Tableau de bord</h4>
        <a href="{{ route('admin.users.index') }}">👤 Gérer les utilisateurs</a>
        <a href="{{ route('admin.sujets.index') }}">📄 Gérer les sujets PFE</a>
        <a href="#">🔗 Gérer les affectations</a>
        <a href="{{ url('/') }}">🏠 Accueil</a>
    </div>

    <!-- Main content -->
    <div class="admin-main">
        <h2>Bienvenue dans l'espace Administrateur</h2>
        <p>Gérez les utilisateurs, les projets, et les sujets PFE ici.</p>

        <div class="card-box mt-4">
            <h5>📌 Infos rapides</h5>
            <ul>
                <li>Total utilisateurs : <span class="badge-count">{{ $totalUsers }}</span></li>
                <li>Sujets proposés : <span class="badge-count">{{ $totalSujets }}</span></li>
                <li>Affectations en cours : <em>Pas encore</em></li>
            </ul>
        </div>
    </div>
</div>
@endsection
