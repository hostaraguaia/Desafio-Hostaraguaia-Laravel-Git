<?php

namespace Crud\App\Web\Usuario\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        if ($this->action === 'Novo' || !$this->action) {
            return [
                'nivel_id' => 'required|numeric',
                'name' => 'required',
                'username' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'min:6'
            ];
        }

        if ($this->action === 'Editar') {
            return [
                'nivel_id' => 'required|numeric',
                'name' => 'required',
                'username' => [
                    'required',
                    Rule::unique('users')
                        ->whereNot('username', $this->validationData()['username'])
                ],
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users')
                        ->whereNot('email', $this->validationData()['email']),
                ],
                'password' => 'min:6'
            ];
        }

    }
}
