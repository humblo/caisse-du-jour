<!DOCTYPE html>
<html>
<head>
    <title>Espace membre, </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ URL::asset('css/app.css') }}" type="text/css" rel="stylesheet"/>
    @guest
    @else
        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
        <script src="{{ URL::asset('js/app.js') }}" type="text/javascript"></script>
    @endguest
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-light navbar-expand-lg mb-5">
    <div class="container">
        <a class="navbar-brand mr-auto" href="#">Caisse<span>duJour</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Déconnexion</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
@yield('content')
@stack('scripts')
</body>
</html>
