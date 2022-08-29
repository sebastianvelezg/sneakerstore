<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
        <title>@yield('title', 'Sneakers store')</title>
    </head>
    <body>
        <!-- header -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home.index') }}">Sneakers store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="btn btn-outline-light mx-2" href="{{ route('home.index')}}">Home</a>
                        <a class="btn btn-outline-light mx-2" href="{{ route('home.about')}}">About</a>
                        <a class="btn btn-outline-light mx-2" href="{{ route('home.support')}}">support</a>
                        <div class="vr bg-white mx-2 d-none d-lg-block"></div>

                        @guest
                            <a class="btn btn-outline-light mx-2" href="{{ route('login') }}">Login</a>
                            <a class="btn btn-outline-light mx-2" href="{{ route('register') }}">Register</a>
                        @else
                        @if (Auth::user()->getRol() == 'admin')
                            <li class="nav-item d-flex">
                                <a class="btn btn-outline-light mx-2" href="{{ route('admin.index', Auth::id()) }}">Admin Panel</a>
                            </li>
                        @endif
                            <form id="logout" action="{{ route('logout') }}" method="POST">
                                <a role="button" class="btn btn-outline-light mx-2"
                                onclick="document.getElementById('logout').submit();">Logout</a>
                                @csrf
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
        <header class="masthead bg-primary text-white text-center py-4">
            <div class="container d-flex align-items-center flex-column">
                <h2>@yield('subtitle', 'A Laravel SNEAKERS App')</h2>
            </div>
        </header>
        <!-- header -->
        <div class="container my-4">
            @yield('content')
        </div>
        <!-- footer -->
        <div class="copyright py-4 text-center text-white">
            <div class="container">
                <small>
                    Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
                    href="https://instagram.com/sebastianvelezg">
                    Sebastian Velez
                    </a>
                </small>
            </div>
        </div>
        <!-- footer -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
    </body>
</html>