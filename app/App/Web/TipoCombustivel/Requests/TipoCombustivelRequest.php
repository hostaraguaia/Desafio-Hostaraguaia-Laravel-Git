<?php

namespace Crud\App\Web\TipoCombustivel\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoCombustivelRequest extends FormRequest
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
            'valor' => 'required'
        ];
    }
}
