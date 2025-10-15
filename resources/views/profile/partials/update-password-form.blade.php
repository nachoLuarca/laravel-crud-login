<section>
    <header class="mb-3">
        <h4 class="mb-1">Actualizar contraseña</h4>
        <p class="text-muted small">
            Asegúrate de usar una contraseña segura y única para tu cuenta.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')

        {{-- Contraseña actual --}}
        <div class="mb-3">
            <label for="current_password" class="form-label">Contraseña actual</label>
            <input id="current_password" name="current_password" type="password" 
                   class="form-control @error('current_password') is-invalid @enderror" 
                   autocomplete="current-password" required>
            @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Nueva contraseña --}}
        <div class="mb-3">
            <label for="password" class="form-label">Nueva contraseña</label>
            <input id="password" name="password" type="password" 
                   class="form-control @error('password') is-invalid @enderror" 
                   autocomplete="new-password" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Confirmar nueva contraseña --}}
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
            <input id="password_confirmation" name="password_confirmation" type="password" 
                   class="form-control" autocomplete="new-password" required>
        </div>

        {{-- Mensaje de éxito --}}
        @if (session('status') === 'password-updated')
            <div class="alert alert-success py-2">
                Contraseña actualizada correctamente ✅
            </div>
        @endif

        <button type="submit" class="btn btn-warning">
            Actualizar contraseña
        </button>
    </form>
</section>
