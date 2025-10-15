<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * La ruta a la que el usuario será redirigido después del login.
     *
     * @var string
     */
    public const HOME = '/products';

    /**
     * Inicializa cualquier configuración adicional para las rutas.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
