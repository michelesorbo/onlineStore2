<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title', 'Online Store')</title>
</head>
<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
        <div class="container">
            <a class="navbar-brand" href="#">Online Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="{{ route('index') }}">Home</a>
                <a class="nav-link active" href="{{ route('product.index') }}">Prodotti</a>
                <a class="nav-link active" href="{{ route('about') }}">About</a>
                <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                @guest
                    <a class="nav-link active" href="{{ route('login') }}">Login</a>
                    <a class="nav-link active" href="{{ route('register') }}">Register</a>
                @else
                @if (Auth::user()->getRole() == 'admin')
                <a class="nav-link active" href="{{ route('admin.index') }}">Admin</a>
                @endif
                    <form id="logout" action="{{ route('logout') }}" method="POST">
                        <a role="button" class="nav-link active" onclick="document.getElementById('logout').submit();">Logout</a>
                        @csrf
                    </form>
                @endguest
                </div>
            </div>
        </div>
    </nav>

    <header class="masthead bg-primary text-white text-center py-4">
        <div class="container d-flex align-items-center flex-column">
            <h2>@yield('subtitle', 'A Laravel Online Store')</h2>
        </div>
    </header>

    <!-- Header -->

    <div class="container my-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <small>
                Copyright Michele Sorbo
            </small>
        </div>
    </div>
    <!-- Footer -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
