<?php

namespace Modules\Utils\Exceptions;

use Exception;
use Modules\Utils\ApiReturn\ApiReturn;

class RouteNotFoundException extends Exception
{
    protected $entityName;

    public function __construct($route)
    {
        $this->route = $route;
    }

    public function render()
    {       
        return ApiReturn::ErrorMessage("O item de rota '{$this->route}' não foi localizado", 404);
    }
}
