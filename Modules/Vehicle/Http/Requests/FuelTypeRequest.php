<?php

namespace Modules\Vehicle\Http\Requests;


use Modules\Utils\Rules\UuidRule;
use Modules\Utils\Enums\StatusEnum;
use Modules\Vehicle\Enums\FuelTypeEnum;
use Modules\Utils\Abstracts\FormRequestAbstract;

use Illuminate\Validation\Rule;

class FuelTypeRequest extends FormRequestAbstract
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
                return $this->getRules();

            case 'POST':
                return $this->postRules();

            case 'PUT':
                return $this->putRules();

            case 'DELETE':
                return $this->deleteRules();

            default:
                return $this->postRules();
        }
    }

    protected function getRules()
    {
        $rules = [
            'note'       => ['nullable', 'string'],
            'price'      => ['nullable', 'numeric', 'between:0,9999999999.99'],
            'type'       => ['nullable', Rule::in(FuelTypeEnum::keys())],
            'status'     => ['nullable', Rule::in(StatusEnum::keys())],
            'created_at' => ['nullable', 'date:Y-m-d h:i:s'],
            'updated_at' => ['nullable', 'date:Y-m-d h:i:s'],
            'deleted_at' => ['nullable', 'date:Y-m-d h:i:s']
        ];

        return $rules;
    }

    protected function postRules()
    {
        $rules = [
            'id'     => ['required', new UuidRule],
            'note'   => ['nullable', 'string'],
            'price'  => ['required', 'numeric'],
            'status' => ['nullable', Rule::in(StatusEnum::keys())],
            'type'   => ['required', Rule::in(FuelTypeEnum::keys())],
        ];

        return $rules;
    }

    protected function putRules()
    {
        $rules = [
            'id'     => ['required', new UuidRule],
            'note'   => ['nullable', 'string'],
            'price'  => ['nullable', 'numeric'],
            'status' => ['nullable', Rule::in(StatusEnum::keys())],
            'type'   => ['nullable', Rule::in(FuelTypeEnum::keys())],
        ];

        return $rules;
    }

    protected function deleteRules()
    {
        $rules = [
            'id' => ['required', new UuidRule]
        ];

        return $rules;
    }
}
