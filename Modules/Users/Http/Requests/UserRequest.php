<?php

namespace Modules\Users\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Utils\Abstracts\FormRequestAbstract;
use Modules\Utils\Enums\StatusEnum;

class UserRequest extends FormRequestAbstract
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
            "id"                => ['nullable', 'integer'],
            "name"              => ['nullable', 'min:5'],
            "username"          => ['nullable', 'min:5', 'max:50'],
            "password"          => ['nullable', 'min:8'],
            "email"             => ['nullable', 'email'],
            "status"            => ['nullable', Rule::in(StatusEnum::keys())],
            "email_verified_at" => ['nullable', 'boolean'],
            'created_at'        => ['nullable', 'date:Y-m-d h:i:s'],
            'updated_at'        => ['nullable', 'date:Y-m-d h:i:s'],
            'deleted_at'        => ['nullable', 'date:Y-m-d h:i:s'],
        ];

        return $rules;
    }

    protected function postRules()
    {
        $rules = [
            "name"     => ['required', 'min:5'],
            "username" => ['nullable', 'min:5', 'max:50', Rule::unique('users', 'username')],
            "password" => ['required', 'min:8'],
            "email"    => ['required', 'email', Rule::unique('users', 'email')],
            "status"   => ['nullable', Rule::in(StatusEnum::keys())],
        ];

        return $rules;
    }

    protected function putRules()
    {
        $rules = [
            "id"               => ['nullable', 'integer'],
            "name"             => ['nullable', 'min:5'],
            "username"         => ['nullable', 'min:5', 'max:50', Rule::unique('users', 'username')],
            "email"            => ['nullable', 'email', Rule::unique('users', 'email')],
            "status"           => ['nullable', Rule::in(StatusEnum::keys())],
            "OldPassword"      => ['nullable', 'min:8'],
            "newPassword"      => ['nullable', 'min:8'],
            "confirm_password" => ['nullable', 'min:8'],
        ];

        return $rules;
    }

    protected function deleteRules()
    {
        $rules = [
            "id" => ['nullable', 'integer'],
        ];

        return $rules;
    }
}
