<?php

namespace Modules\Utils\Exceptions;

use Exception;
use Modules\Utils\Utilitaries\Arrays;
use Modules\Utils\ApiReturn\ApiReturn;

class ValidatorException extends Exception
{
    protected $code;
    protected $message;

    public function __construct(string $message, int $code = 400, array $validatorErrors = null)
    {
        $this->code = $code;
        $this->message = $message;
        $this->validatorErrors = $validatorErrors;
    }

    public function render()
    {
        $data = [
            'status' => false,
            'description' => $this->message
        ];

        if (!empty($this->validatorErrors))
            $data['validation'] = Arrays::Flatten($this->validatorErrors);

        return ApiReturn::KeyMessage($this->message, $this->code, $data, 'error', null, false);
    }
}
