<?php

namespace Modules\Contact\Http\Requests;

use Modules\Utils\Rules\UuidRule;
use Modules\Utils\Enums\StatusEnum;
use Modules\Utils\Abstracts\FormRequestAbstract;
use Illuminate\Validation\Rule;

class ContactInfoRequest extends FormRequestAbstract
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
            'id'                => ['nullable', new UuidRule],

            'responsable_id'    => ['nullable', new UuidRule],
            'responsable_type'  => ['string',  'max:255'],

            'ddd'               => ['nullable', 'string', 'max:5'],
            'phone'             => ['nullable', 'string', 'max:60'],

            'ddd_secondary'     => ['nullable', 'string', 'max:5'],
            'phone_secondary'   => ['nullable', 'string', 'max:60'],

            'ddd_backup'        => ['nullable', 'string', 'max:5'],
            'phone_backup'      => ['nullable', 'string', 'max:60'],
            
            'email'             => ['nullable', 'string', 'unique'],
            'email_verified_at' => ['nullable', 'date:Y-m-d h:i:s'],

            'email_secondary'             => ['nullable', 'unique'],
            'email_secondary_verified_at' => ['nullable', 'date:Y-m-d h:i:s'],

            'status'      => ['nullable', Rule::in(StatusEnum::keys())],
            'created_at'  => ['nullable', 'date:Y-m-d h:i:s'],
            'updated_at'  => ['nullable', 'date:Y-m-d h:i:s'],
            'deleted_at'  => ['nullable', 'date:Y-m-d h:i:s']
        ];

        return $rules;
    }

    protected function postRules()
    {
        $rules = [
            'responsable_id'    => ['nullable', new UuidRule],
            'responsable_type'  => ['string',  'max:255'],

            'ddd'               => ['nullable', 'string', 'max:5'],
            'phone'             => ['nullable', 'string', 'max:60'],

            'ddd_secondary'     => ['nullable', 'string', 'max:5'],
            'phone_secondary'   => ['nullable', 'string', 'max:60'],

            'ddd_backup'        => ['nullable', 'string', 'max:5'],
            'phone_backup'      => ['nullable', 'string', 'max:60'],
            
            'email'             => ['nullable', 'string', 'unique'],
            'email_verified_at' => ['nullable', 'date:Y-m-d h:i:s'],

            'email_secondary'             => ['nullable', 'unique'],
            'email_secondary_verified_at' => ['nullable', 'date:Y-m-d h:i:s'],

            'status'      => ['nullable', Rule::in(StatusEnum::keys())],
            'created_at'  => ['nullable', 'date:Y-m-d h:i:s'],
            'updated_at'  => ['nullable', 'date:Y-m-d h:i:s'],
            'deleted_at'  => ['nullable', 'date:Y-m-d h:i:s']
        ];

        return $rules;
    }

    protected function putRules()
    {
        $rules = [
            'id'               => ['required', new UuidRule],
            'status'           => ['nullable', Rule::in(StatusEnum::keys())],
            
            'responsable_id'   => ['nullable', new UuidRule],
            'responsable_type' => ['string',  'max:255'],

            'ddd'              => ['nullable', 'string', 'max:5'],
            'phone'            => ['nullable', 'string', 'max:60'],

            'ddd_secondary'    => ['nullable', 'string', 'max:5'],
            'phone_secondary'  => ['nullable', 'string', 'max:60'],

            'ddd_backup'       => ['nullable', 'string', 'max:5'],
            'phone_backup'     => ['nullable', 'string', 'max:60'],
            
            'email'             => ['nullable', 'string', 'unique'],
            'email_verified_at' => ['nullable', 'date:Y-m-d h:i:s'],

            'email_secondary'             => ['nullable', 'unique'],
            'email_secondary_verified_at' => ['nullable', 'date:Y-m-d h:i:s']
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
