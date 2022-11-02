<?php

namespace Crud\App\Web\Posto\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostoRequest extends FormRequest
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
        return [
            'cnpj' => 'required',
            'nome_fantasia' => 'required',
            'razao_social' => 'required',
            'uf' => 'max:2',
            'email' => [
                'required',
                'email',
                Rule::unique('users')
                    ->whereNot('email',$this->validationData()['email'])
            ],
        ];
    }
}
