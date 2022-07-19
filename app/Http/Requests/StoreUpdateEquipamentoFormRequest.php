<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEquipamentoFormRequest extends FormRequest
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
    {    //realiza as validações de campo de erro aqui!
        return [
            'numero' => 'required|string|max:50|min:3',
            'campoprotocolo' => 'required|string|max:150|min:3',
            'descricao' => 'required|string|max:255|min:3',
            'DataRequisicao' => 'required|string|max:50|min:0',
            'pessoa' => 'required|'
        
        ];
    }
}
