<?php

namespace Crud\App\Core\Classes;

use Illuminate\Support\Facades\Facade;

class MascaraFacade extends Facade
{
   //protected static $cached = false;
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mascara';
    }
}
