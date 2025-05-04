@extends('layouts.app')

@section('content')
<style>

body {
        background: linear-gradient(135deg,rgb(24, 234, 136), #000000); 
        min-height: 100vh;
    }

    .users-wrapper {
        max-width: 1100px;
        margin: 30px auto;
        background-color: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.15);
    }


    .users-wrapper {
        max-width: 1100px;
        margin: 30px auto;
    }

    .users-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .filter-form {
        max-width: 250px;
    }

    .table thead {
        background-color:rgb(228, 233, 239);
        font-weight: 600;
    }

    .btn-action {
        padding: 5px 10px;
        font-size: 14px;
        margin-right: 5px;
    }

    .badge-role {
        font-size: 13px;
        padding: 6px 10px;
        border-radius: 15px;
    }

    .badge-admin {
        background-color: #212529;
        color: #fff;
    }

    .badge-encadrant {
        background-color: #198754;
        color: #fff;
    }

    .badge-etudiant {
        background-color: #0dcaf0;
        color: #fff;
    }

    @media (max-width: 768px) {
        .users-header {
            flex-direction: column;
            gap: 10px;
        }
    }
    .btn-primary {
    background-color:rgb(37, 131, 87);   
    color: #fff;
    font-weight: bold;
    padding: 8px 20px;
    border: none;
    border-radius: 6px;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color:rgb(16, 107, 69); 
    color: #fff;
}

</style>

<div class="users-wrapper">
    <div class="users-header">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark mb-3">
            ← Retour au tableau de bord
        </a>

        <h2 class="fw-bold">👥 Liste des utilisateurs</h2>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">➕ Ajouter un utilisateur</a>
    </div>


    <form method="GET" action="{{ route('admin.users.index') }}" class="filter-form mb-3">
        <select name="role" class="form-select" onchange="this.form.submit()">
            <option value="">-- Tous les rôles --</option>
            <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="encadrant" {{ request('role') == 'encadrant' ? 'selected' : '' }}>Encadrant</option>
            <option value="etudiant" {{ request('role') == 'etudiant' ? 'selected' : '' }}>Étudiant</option>
        </select>
    </form>

    @if(session('success'))
    <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
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
                    <td colspan="6" class="text-center text-muted">Aucun utilisateur trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection