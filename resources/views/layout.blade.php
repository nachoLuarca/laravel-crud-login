<!DOCTYPE html>
<html>
<head>
    <title>CRUD con Laravel 12</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    {{-- 🔹 Navbar superior --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            {{-- 🏠 Logo o nombre de la app --}}
            <a class="navbar-brand" href="{{ route('products.index') }}">Mi CRUD</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                {{-- 📌 Links a la izquierda --}}
                <ul class="navbar-nav me-auto">
                    {{-- 🛍 Link al CRUD de Productos --}}
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" 
                           href="{{ route('products.index') }}">
                           Productos
                        </a>
                    </li>

                    {{-- 👤 Link al CRUD de Usuarios (solo visible si es admin) --}}
                    @auth
                        @if (Auth::user()->is_admin)
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" 
                                   href="{{ route('users.index') }}">
                                   Usuarios
                                </a>
                            </li>
                        @endif
                    @endauth
                </ul>

                {{-- 📌 Perfil y logout a la derecha --}}
                <ul class="navbar-nav ms-auto">
                    @auth
                        {{-- Nombre del usuario logueado --}}
                        <li class="nav-item d-flex align-items-center me-3">
                            <span class="text-white">{{ Auth::user()->name }}</span>
                        </li>

                        {{-- Link a perfil
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}" 
                               href="{{ route('profile.edit') }}">
                               Perfil
                            </a>
                        </li>
                        --}}

                        {{-- Botón de logout --}}
                        <li class="nav-item ms-2">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Cerrar sesión
                                </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- 📄 Contenido principal --}}
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
{{-- 
    🔹 Layout principal de la app
    - Incluye Bootstrap 5 desde CDN
    - Navbar con links a Productos, Usuarios (si es admin), Perfil y Logout
    - Contenedor principal para mostrar mensajes y contenido de cada vista
--}}