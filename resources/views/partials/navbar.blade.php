<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">P F E N S<span class="text-success">.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarMain">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Se connecter
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('login.admin.view') }}">Administrateur</a></li>
                        <li><a class="dropdown-item" href="{{ route('login.encadrant.view') }}">Encadrant</a></li>
                        <li><a class="dropdown-item" href="{{ route('login.etudiant.view') }}">Etudiant</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
