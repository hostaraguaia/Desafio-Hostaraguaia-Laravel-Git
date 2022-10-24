<?php

namespace Modules\Permission\Exceptions;

use Exception;
use Modules\Utils\ApiReturn\ApiReturn;

class NotAllowedException extends Exception
{
    public function render()
    {       
        return ApiReturn::ErrorMessage("Usuário não tem premissão para acessar este recurso" ,401);
    }
}
