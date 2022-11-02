<?php

namespace Crud\App\Web\Veiculo\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeiculoRequest extends FormRequest
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
            'motorista_id' => 'required',
            'tipo_combustivel_id' => 'required',
            'tipo_veiculo' => 'required',
            'propriedade' => 'required',
            'placa' => 'required',
            'ano_fabricacao' => 'required|max_digits:4|numeric',
        ];
    }
}
