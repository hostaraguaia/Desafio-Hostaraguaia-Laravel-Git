<?php

namespace Crud\App\Web\Motorista\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MotoristaRequest extends FormRequest
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
            'nome' => 'required',
            'ativo' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')
                    ->whereNot('email',$this->validationData()['email'])
            ],
        ];
    }
}