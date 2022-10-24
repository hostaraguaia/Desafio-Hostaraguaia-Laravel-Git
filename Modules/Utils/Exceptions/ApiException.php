<?php

namespace Modules\Utils\Exceptions;

use Modules\Utils\ApiReturn\ApiReturn;
use Exception;

class ApiException extends Exception
{
    protected $code;
    protected $message;

    public function __construct(string $message, int $code = 400)
    {
        $this->code = $code;
        $this->message = $message;
    }

    public function render()
    {
        return ApiReturn::ErrorMessage($this->message, $this->code);
    }
}
