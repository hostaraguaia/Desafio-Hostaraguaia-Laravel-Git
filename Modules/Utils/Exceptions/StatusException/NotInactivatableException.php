<?php

namespace Modules\Utils\Exceptions\StatusException;

use Exception;
use Modules\Utils\ApiReturn\ApiReturn;

class NotInactivatableException extends Exception
{
    protected $id;
    protected $entityName;

    public function __construct($id, $entityName)
    {
        $this->id = $id;
        $this->entityName = $entityName;
    }

    public function render()
    {       
        return ApiReturn::ErrorMessage("O registro com o código {$this->id} do tipo {$this->entityName} não pode ser inativado", 401);
    }
}
