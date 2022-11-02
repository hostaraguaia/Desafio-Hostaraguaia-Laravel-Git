<?php

namespace Crud\App\Core\Providers;

use Crud\App\Core\Classes\Mascara;
use Illuminate\Support\ServiceProvider;

class MascaraServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind('mascara', function () {
            return new Mascara; //Add the proper namespace at the top
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
