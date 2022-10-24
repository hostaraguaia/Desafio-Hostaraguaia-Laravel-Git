<?php

namespace Modules\Vehicle\Http\Requests;

use Modules\Utils\Rules\UuidRule;
use Modules\Utils\Enums\StatusEnum;
use Modules\Utils\Abstracts\FormRequestAbstract;

use Illuminate\Validation\Rule;

class InsurerRequest extends FormRequestAbstract
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ( $this->method() ) 
        {
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
            'id'            => ['nullable', new UuidRule],
            'name'          => ['nullable', 'string', 'max:255'],
            'policy_number' => ['nullable', 'integer'],
            'due_date'      => ['nullable', 'date:Y-m-d h:i:s'],
            'price'         => ['nullable', 'numeric', 'between:0,9999999999.99'],
            'status'        => ['nullable', Rule::in(StatusEnum::keys())],
            'created_at'    => ['nullable', 'date:Y-m-d h:i:s'],
            'updated_at'    => ['nullable', 'date:Y-m-d h:i:s'],
            'deleted_at'    => ['nullable', 'date:Y-m-d h:i:s']
        ];

        return $rules;
    }

    protected function postRules()
    {
        $rules = [
            'name'          => ['required', 'string', 'max:255'],
            'policy_number' => ['required', 'integer'],
            'due_date'      => ['required', 'date:Y-m-d h:i:s'],
            'price'         => ['nullable', 'numeric', 'between:0, 999999.99'],
            'status'        => ['nullable', Rule::in(StatusEnum::keys())]
        ];

        return $rules;
    }

    protected function putRules()
    {
        $rules = [
            'id'            => ['required', new UuidRule],
            'name'          => ['nullable', 'string', 'max:255'],
            'policy_number' => ['nullable', 'integer'],
            'due_date'      => ['nullable', 'date:Y-m-d h:i:s'],
            'price'         => ['nullable', 'numeric', 'between:0, 999999.99'],
            'status'        => ['nullable', Rule::in(StatusEnum::keys())]
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
