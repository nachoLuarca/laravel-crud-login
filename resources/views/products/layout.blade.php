<!DOCTYPE html>
<html>
<head>
    <title>CRUD con Laravel 12</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- 🔸 Barra superior -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('products.index') }}">Mi CRUD</a>

            <div class="d-flex">
                @auth
                    <!-- 👇 Botón para cerrar sesión -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">
                            Cerrar sesión
                        </button>
                    </form>
                @endauth

                @guest
                    <!-- 👇 Opcional: enlaces si no está logueado -->
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Registrarse</a>
                @endguest
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
