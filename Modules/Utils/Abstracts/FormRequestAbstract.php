<?php

namespace Modules\Utils\Abstracts;

use Modules\Utils\ApiReturn\ApiReturn;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

abstract class FormRequestAbstract extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * failedValidation
     *
     * @param  Validator $validator
     * @return Illuminate\Support\Facades\Response
     */
    protected function failedValidation(Validator $validator)
    {
        if (request()->isJson()) {
            $response = ApiReturn::ErrorMessage($validator->messages(), 400);
            throw (new ValidationException($validator, $response))->status(400);
        }

        return ['error' => $validator->messages()];
    }
}
