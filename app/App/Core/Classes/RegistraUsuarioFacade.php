<?php

namespace Crud\App\Core\Classes;

use Illuminate\Support\Facades\Facade;

class RegistraUsuarioFacade extends Facade
{
   //protected static $cached = false;
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'registraUsuario';
    }
}
