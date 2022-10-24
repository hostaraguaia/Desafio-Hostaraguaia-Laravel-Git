<?php

namespace Modules\Permission\Exceptions;

use Exception;
use Modules\Utils\ApiReturn\ApiReturn;

class PermissionGroupNotFound extends Exception
{
    protected $group;

    public function __construct($group)
    {
        $this->group = $group;
    }

    public function render()
    {       
        return ApiReturn::ErrorMessage("O grupo de permissão '{$this->group}' não foi localizado", 404);
    }
}
