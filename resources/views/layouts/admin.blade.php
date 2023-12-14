<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
        <title>@yield('title', 'Admin - Vinateria Ricardo Reyes')</title>
    </head>
    <body>
        <div class="row g-0">
            <!-- sidebar -->
            <div class="modopanel col fixed text-white ">
                <a href="{{ route('admin.home.index') }}" class="text-white text-decoration-none">
                    <span class="fs-4">Panel de Administrador</span>
                </a>
                <hr />
                <ul class="nav flex-column">
                    <li><a href="{{ route('admin.home.index') }}" class="nav-link text-white">- Admin - Home</a></li>
                    <li><a href="{{ route('admin.categoria.index') }}" class="nav-link text-white">- Admin - Categoria</a></li>
                    <li><a href="{{ route('admin.licor.index') }}" class="nav-link text-white">- Admin - Licores</a></li>
                    <li><a href="{{ route('admin.venta.index') }}" class="nav-link text-white">- Admin - Ventas</a></li>
                    <li>
                    <a href="{{ route('home.index') }}" class="mt-2 btn bg-primary text-white">Volver a la pagina principal</a>
                    </li>
                </ul>
            </div>
            <!-- sidebar -->
            <div class="col content-grey">
                <nav class="p-3 shadow text-end">
                    <span class="profile-font">Admin</span>
                    <img class="img-profile rounded-circle" src="{{ asset('/img/undraw_profile.svg') }}">
                </nav>
                <div class="g-0 m-5">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- footer -->
        <div class="copyright py-4 text-center text-white">
            <div class="container">
                <small>
                    Ricardo Reyes Benigno - <a class="text-reset fw-bold text-decoration-none" target="_blank"
                    href="https://www.facebook.com/profile.php?id=100010811674870">
                    Vinateria-Ricardo Reyes
                    </a>
                </small>
            </div>
        </div>
        <!-- footer -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
    </body>
</html>