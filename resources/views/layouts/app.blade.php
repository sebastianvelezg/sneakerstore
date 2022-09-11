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
        <!-- nav -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-third py-4">
          <div class="container">
              <a class="navbar-brand" href="{{ route('home.index') }}">Sneakers store</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                  aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                  <div class="navbar-nav ms-auto">
                      <a class="btn btn-outline-light mx-2" href="{{ route('home.index')}}">Home</a>
                      <a class="btn btn-outline-light mx-2" href="{{ route('category.index')}}">Categories</a>

                      <a class="btn btn-outline-light mx-2" href="{{ route('home.about')}}">Sneakers</a>

                      <a class="btn btn-outline-light mx-2" href="{{ route('home.about')}}">Clothing</a>
                      <a class="btn btn-outline-light mx-2" href="{{ route('home.support')}}">Accessories</a>
                      <a class="btn btn-outline-light mx-2" href="{{ route('home.about')}}">About</a>
                      <a class="btn btn-outline-light mx-2" href="{{ route('home.support')}}">Support</a>
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
        <!-- nav -->

        <!-- header -->
        <header class="masthead bg-secondary text-white text-center py-4">
            <div class="container d-flex align-items-center flex-column">
                <h2>@yield('subtitle', 'A Laravel SNEAKERS App')</h2>
            </div>
        </header>
        <!-- header -->
        
        <div class="container my-4">
            @yield('content')
        </div>
        <!-- footer -->

    <footer class="bg-dark text-center text-white absolute-bottom">
        <div class="container p-4">
            <section class="mb-4">
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fas fa-fw fa-facebook"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
            </section>
            <section class="mb-4">
                <p>
                @lang('description')
                </p>
            </section>
        </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2022 Copyright:
      <div class="d-flex flex-column">
        <a class="text-white" href="https://mdbootstrap.com/">Juan Esteban Cardona</a>
        <a class="text-white" href="https://mdbootstrap.com/">Sebastian Velez</a>
      </div>
    </div>
c
  </footer>
  <!-- footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
  </body>

</html>