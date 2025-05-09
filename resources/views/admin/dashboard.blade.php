@extends('layouts.app')

@section('content')
@php
use App\Models\User;
use App\Models\SujetPFE;
use App\Models\Affectation;

$totalUsers = User::count();
$totalSujets = SujetPFE::count();
$totalAffectations = Affectation::count();
@endphp

<style>
    body {
        background: linear-gradient(135deg, #e8f0fe, #d0e2ff);
        min-height: 100vh;
        font-family: 'Segoe UI', sans-serif;
        color: #2c3e50;
    }

    .admin-container {
        display: flex;
        min-height: 80vh;
    }

    .sidebar {
        width: 250px;
        background-color: #1e293b;
        padding: 25px;
        color: #fff;
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
    }

    .sidebar h4 {
        font-weight: bold;
        margin-bottom: 30px;
        font-size: 1.2rem;
        color: #f1f5f9;
    }

    .sidebar a {
        display: block;
        margin: 15px 0;
        color: #cbd5e1;
        padding: 10px 15px;
        border-radius: 8px;
        text-decoration: none;
        background-color: #334155;
        transition: all 0.3s ease;
    }

    .sidebar a:hover {
        background-color: #475569;
        color: #fff;
    }

    .admin-main {
        flex: 1;
        padding: 50px;
    }

    .admin-main h2 {
        font-weight: bold;
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .admin-main p {
        font-size: 1.1rem;
        color: #555;
    }

    .card-box {
        background-color: #ffffff;
        border-radius: 15px;
        padding: 30px;
        margin-top: 30px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }

    .card-box h5 {
        font-size: 1.3rem;
        margin-bottom: 20px;
        color: #333;
        font-weight: bold;
    }

    .card-box ul {
        list-style-type: none;
        padding-left: 0;
    }

    .card-box li {
        margin-bottom: 15px;
        font-size: 1rem;
    }

    .badge-count {
        background: #0dcaf0;
        color: #000;
        padding: 6px 12px;
        border-radius: 20px;
        font-weight: bold;
        margin-left: 8px;
    }

    .card-box em {
        font-style: italic;
        color: #888;
    }

    #admin-wrapper.dark-mode {
        background: linear-gradient(to right, #0f172a, #1e293b);
        color: #f1f5f9;
    }

    #admin-wrapper.sidebar {
        background-color: #0f172a;
        border-color: #334155;
    }

    #admin-wrapper.sidebar a {
        color: #e2e8f0;
        background-color: rgba(255, 255, 255, 0.05);
    }

    #admin-wrapper.sidebar a:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }

    #admin-wrapper.admin-main {
        color: #f1f5f9;
    }

    #admin-wrapper.card-box {
        background-color: rgba(255, 255, 255, 0.07);
        color: #e2e8f0;
    }

    #admin-wrapper.badge-count {
        background: #38bdf8;
        color: #000;
    }
</style>

<div id="admin-wrapper" class="admin-container">
    <!-- Sidebar -->
    <div class="sidebar">
        <h4>📊 Tableau de bord</h4>
        <a href="{{ route('admin.users.index') }}">👤 Gérer les utilisateurs</a>
        <a href="{{ route('admin.sujets.index') }}">📄 Gérer les sujets PFE</a>
        <a href="{{ route('admin.affectations.index') }}">🔗 Gérer les affectations</a>
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
                <!--<li>Affectations en cours : <span class="badge-count">{{ $totalAffectations }}</span></li>-->
            </ul>
        </div>
    </div>
</div>
@endsection