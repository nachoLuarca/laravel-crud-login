<section>
    <header class="mb-3">
        <h4 class="text-danger mb-1">Eliminar cuenta</h4>
        <p class="text-muted small">
            Una vez que elimines tu cuenta, todos tus datos serán eliminados permanentemente.  
            Esta acción no se puede deshacer.
        </p>
    </header>

    {{-- Botón que abre el modal de confirmación --}}
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
        Eliminar cuenta
    </button>

    {{-- Modal de confirmación --}}
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <p>Por favor, ingresa tu contraseña para confirmar que deseas eliminar tu cuenta.</p>

                    <form method="post" action="{{ route('profile.destroy') }}" id="delete-account-form">
                        @csrf
                        @method('DELETE')

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input id="password" name="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Ingresa tu contraseña" required>

                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-danger" form="delete-account-form">
                        Eliminar definitivamente
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
