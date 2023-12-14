<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
        
        <title>@yield('title', 'Vinateria Ricardo Reyes')</title>

    </head>
    <body>
    <!-- header -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-3">
            <div class="container">
                <img src="{{ asset('/img/logo.jpg') }}" class="rounded" width="100px" heigth="100px">
            
                <a class="navbar-brand mx-4" href="{{ route('home.index') }}"><em> El vino agrada y el agua enfada</em></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ms-auto">
                        <a class="mx-1 hover" href="{{ route('home.index') }}">Inicio</a>
                        <a class="mx-1 hover" href="{{ route('licor.index') }}">Licor</a>
                        <a class="mx-1 hover" href="{{ route('venta.index') }}">Venta</a>
                        <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                        @guest
                            <a class="nav-link active" href="{{ route('login') }}">Acceso</a>
                            <a class="nav-link active" href="{{ route('register') }}">Registrar</a>
                        @else
                            <form id="logout" action="{{ route('logout') }}" method="POST">
                                <a  role="button" class=" hover"
                                onclick="document.getElementById('logout').submit();">Cerrar sesion</a>
                                @csrf
                            </form>
                        @endguest

                </div>
            </div>
        </nav>
        <header class="masthead bg-primary text-white text-center py-4">
            <div class="container d-flex align-items-center flex-column">
                <h2>@yield('subtitle', 'Vinateria Ricardo Reyes')</h2>
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
                    Vinateria -<a class="text-reset fw-bold text-decoration-none" target="_blank"
                    href="https://www.facebook.com/profile.php?id=100010811674870">
                    Facebook
                    </a> - <b>Ricardo Reyes</b>
                </small>
            </div>
        </div>
        <!-- footer -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
    </body>
</html>