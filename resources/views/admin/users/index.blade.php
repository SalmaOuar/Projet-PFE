@extends('layouts.app')

@section('content')
@php
    $bgColor = 'linear-gradient(135deg, #e0ecff, #d6f6e9)';
@endphp

<style>
    body {
        background: {{$bgColor}};
        min-height: 100vh;
        font-family: 'Segoe UI', sans-serif;
    }

    .users-wrapper {
        max-width: 1200px;
        margin: 50px auto;
        background: #ffffff;
        padding: 35px;
        border-radius: 18px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .users-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .users-header h2 {
        font-weight: bold;
        color: #1e293b;
    }

    .filter-form {
        max-width: 300px;
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #198754;
        border: none;
        padding: 10px 18px;
        border-radius: 8px;
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: #157347;
    }

    .btn-outline-dark {
        border-radius: 8px;
    }

    .badge-role {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 500;
    }

    .badge-admin {
        background-color: #212529;
        color: #fff;
    }

    .badge-encadrant {
        background-color: #51cf66;
        color: #000;
    }

    .badge-etudiant {
        background-color: #74c0fc;
        color: #000;
    }

    .table thead {
        background-color: #f1f3f5;
    }

    .btn-action {
        padding: 6px 10px;
        border-radius: 8px;
        font-size: 14px;
        margin: 0 2px;
    }

    .btn-warning {
        background-color: #ffc107;
        border: none;
        color: #000;
    }

    .btn-danger {
        background-color: #e03131;
        border: none;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-danger:hover {
        background-color: #c92a2a;
    }

    @media (max-width: 768px) {
        .users-header {
            flex-direction: column;
            gap: 15px;
        }
    }
</style>

<div class="users-wrapper">
    <div class="users-header">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark">
            ← Retour au tableau de bord
        </a>
        <h2>👥 Liste des utilisateurs</h2>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">➕ Ajouter un utilisateur</a>
    </div>

    <form method="GET" action="{{ route('admin.users.index') }}" class="filter-form">
        <select name="role" class="form-select" onchange="this.form.submit()">
            <option value="">-- Tous les rôles --</option>
            <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="encadrant" {{ request('role') == 'encadrant' ? 'selected' : '' }}>Encadrant</option>
            <option value="etudiant" {{ request('role') == 'etudiant' ? 'selected' : '' }}>Étudiant</option>
        </select>
    </form>

    @if(session('success'))
        <div class="alert alert-success text-center mt-3">{{ session('success') }}</div>
    @endif

    <div class="table-responsive mt-3">
        <table class="table table-striped table-hover align-middle text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom complet</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Créé le</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($utilisateurs as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nom }} {{ $user->prenom }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge badge-role
                                {{ $user->role == 'admin' ? 'badge-admin' : ($user->role == 'encadrant' ? 'badge-encadrant' : 'badge-etudiant') }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm btn-action">✏️</a>
                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm btn-action" onclick="return confirm('Confirmer la suppression ?')">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-muted">Aucun utilisateur trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
