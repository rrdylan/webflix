<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 
        @section('title')
            Webflix
        @show
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.jsx'])

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">WEBFLIX</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                    <a class="nav-link" href="/films">Films</a>
                    <a class="nav-link" href="/films-react">Films avec react</a>
                    <a class="nav-link" href="/actors">Acteurs</a>
                    <a class="nav-link" href="/philippe">PHILIPPE !!</a>
                    <a class="nav-link" href="/a-propos">A propos</a>
                </div>
                <div class="navbar-nav">
                    <a href="/panier" class="nav-link {{ request()->is('panier') ? 'active' : ''}}">
                        Panier ({{ count (session('cart', [])) }})
                    </a>
                    @auth
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                            <li><a class="dropdown-item" href="/account">Mon compte</a></li>
                            <form action="/logout" method="post">
                                @csrf
                                @method('delete')
                                <button class="dropdown-item">
                                    Déconnnexion
                                </button>
                            </form>
                        </ul>
                    </li>
                    @else
                    <a href="/login" class="nav-link">Connexion</a>
                    <a href="/sub" class="nav-link">Inscription</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container py-5">
        @yield('content')
    </div>
    <footer>
        <p class="text-center">
            {{ date('Y') }} - WEBFLIX
        </p>
    </footer>
</body>
</html>