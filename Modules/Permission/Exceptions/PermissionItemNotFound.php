<?php

namespace Modules\Permission\Exceptions;

use Exception;
use Modules\Utils\ApiReturn\ApiReturn;

class PermissionItemNotFound extends Exception
{
    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function render()
    {       
        return ApiReturn::ErrorMessage("O item de permissão '{$this->item}' não foi localizado", 404);
    }
}
