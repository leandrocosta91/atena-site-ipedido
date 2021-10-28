<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'idcliente' => 'required|integer|min:1',
            'idproduto' => 'required|integer|min:1',
            'quantidade' => 'required|integer|min:1',
            'preco_unitario' => 'required|numeric|min:1'
        ];
    }
}
