@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-4">👤 Perfil de {{ Auth::user()->name }}</h2>

    {{-- ✅ Información personal --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Actualizar información personal</div>
        <div class="card-body">
            @if (session('status') === 'profile-updated')
                <div class="alert alert-success">Perfil actualizado correctamente ✅</div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control"
                           value="{{ old('name', Auth::user()->name) }}" required autofocus>
                    @error('name')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control"
                           value="{{ old('email', Auth::user()->email) }}" required>
                    @error('email')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Guardar cambios
                </button>
            </form>
        </div>
    </div>

    {{-- 🔐 Cambiar contraseña --}}
    <div class="card mb-4">
        <div class="card-header bg-warning text-dark">Cambiar contraseña</div>
        <div class="card-body">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    {{-- 🗑 Eliminar cuenta --}}
    <div class="card">
        <div class="card-header bg-danger text-white">Eliminar cuenta</div>
        <div class="card-body">
            <p class="mb-3">
                Esta acción es irreversible. Tu cuenta será eliminada permanentemente.
            </p>
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
