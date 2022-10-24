<?php

namespace Modules\Units\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Utils\Abstracts\FormRequestAbstract;
use Modules\Utils\Enums\StatusEnum;
use Modules\Utils\Rules\UuidRule;

class FuelStationRequest extends FormRequestAbstract
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
            'id'           => ['nullable', new UuidRule],
            'company_name' => ['nullable', 'string'],
            'trading_name' => ['nullable', 'string'],
            'document'     => ['nullable', 'string', 'max:18'],
            'verified_at'  => ['nullable', 'date:Y-m-d h:i:s'],
            'loggable'     => ['nullable', 'integer'],
            'address'      => ['nullable', new UuidRule],
            'contact'      => ['nullable', new UuidRule],
            'status'       => ['nullable', Rule::in(StatusEnum::keys())],
            'created_at'   => ['nullable', 'date:Y-m-d h:i:s'],
            'updated_at'   => ['nullable', 'date:Y-m-d h:i:s'],
            'deleted_at'   => ['nullable', 'date:Y-m-d h:i:s']
        ];

        return $rules;
    }

    protected function postRules()
    {
        $rules = [
            'company_name' => ['nullable', 'string'],
            'trading_name' => ['nullable', 'string'],
            'document'     => ['required', 'string', 'max:18'],
            'loggable'     => ['nullable', 'integer'],
            'address'      => ['nullable', new UuidRule],
            'contact'      => ['nullable', new UuidRule],
            'status'       => ['nullable', Rule::in(StatusEnum::keys())],
        ];

        return $rules;
    }

    protected function putRules()
    {
        $rules = [
            'id'           => ['required', new UuidRule],
            'company_name' => ['nullable', 'string'],
            'trading_name' => ['nullable', 'string'],
            'document'     => ['nullable', 'string', 'max:18'],
            'loggable'     => ['nullable', 'integer'],
            'address'      => ['nullable', new UuidRule],
            'contact'      => ['nullable', new UuidRule],
            'verified_at'  => ['nullable', 'date:Y-m-d h:i:s'],
            'status'       => ['nullable', Rule::in(StatusEnum::keys())],
        ];

        return $rules;
    }

    protected function deleteRules()
    {
        $rules = [
            'id' => ['required', new UuidRule],
        ];

        return $rules;
    }
}
