<?php

namespace Modules\Contact\Http\Requests;

use Modules\Utils\Rules\UuidRule;
use Modules\Utils\Enums\StatusEnum;
use Modules\Utils\Abstracts\FormRequestAbstract;
use Illuminate\Validation\Rule;

class AddressRequest extends FormRequestAbstract
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
            'id'               => ['nullable', new UuidRule],
            'responsable_id'   => ['nullable', new UuidRule],
            'responsable_type' => ['nullable', 'string', 'max:255'],
            'address'          => ['nullable', 'string', 'max:255'],
            'zip_code'         => ['nullable', 'string', 'max:255'],
            'complement'       => ['nullable', 'string', 'max:255'],
            'district'         => ['nullable', 'string', 'max:255'],
            'city'             => ['nullable', 'string', 'max:255'],
            'status'           => ['nullable', Rule::in(StatusEnum::keys())],
            'created_at'       => ['nullable', 'date:Y-m-d h:i:s'],
            'updated_at'       => ['nullable', 'date:Y-m-d h:i:s'],
            'deleted_at'       => ['nullable', 'date:Y-m-d h:i:s']
        ];

        return $rules;
    }

    protected function postRules()
    {
        $rules = [
            'responsable_id'   => ['required', new UuidRule],
            'responsable_type' => ['required', 'string', 'max:255'],
            'address'          => ['nullable', 'string', 'max:255'],
            'zip_code'         => ['nullable', 'string', 'max:255'],
            'complement'       => ['nullable', 'string', 'max:255'],
            'district'         => ['nullable', 'string', 'max:255'],
            'city'             => ['nullable', 'string', 'max:255'],
            'status'           => ['nullable', Rule::in(StatusEnum::keys())]
        ];

        return $rules;
    }

    protected function putRules()
    {
        $rules = [
            'id'               => ['required', new UuidRule],
            'responsable_id'   => ['nullable', new UuidRule],
            'responsable_type' => ['nullable', 'string', 'max:255'],
            'address'          => ['nullable', 'string', 'max:255'],
            'zip_code'         => ['nullable', 'string', 'max:255'],
            'complement'       => ['nullable', 'string', 'max:255'],
            'district'         => ['nullable', 'string', 'max:255'],
            'city'             => ['nullable', 'string', 'max:255'],
            'status'           => ['nullable', Rule::in(StatusEnum::keys())]
        ];

        return $rules;
    }

    protected function deleteRules()
    {
        $rules = [
            'id'   => ['required', new UuidRule]
        ];

        return $rules;
    }
}
