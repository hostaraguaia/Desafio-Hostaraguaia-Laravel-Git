<?php

namespace Crud\App\Core\Providers;

use Crud\App\Core\Classes\RegistraUsuario;
use Illuminate\Support\ServiceProvider;

class RegistraUsuarioServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('registraUsuario', function () {
            return new RegistraUsuario; //Add the proper namespace at the top
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
