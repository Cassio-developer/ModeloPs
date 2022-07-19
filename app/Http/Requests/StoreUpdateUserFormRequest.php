<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserFormRequest extends FormRequest
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
    {        //realiza as validações de campo de erro aqui!
        if ($this->request->has("cancel")){ return [];}
        return [
            'nome' => 'required|string|max:255|min:3',
            'endereco' => 'required|string|max:50|min:3',
            'cidade' => 'required|string|max:255|min:3',
            'datanascimento' => 'required|string|max:255|min:0',
            'bairro' => 'required|string|max:30|min:3',
            'telefone' => 'nullable|string|max:20|min:3',
            'email' => 'nullable|string|max:50|min:3',
            'cpf' => 'required|string|max:50|min:3',
            'sexo' => 'required|string|max:30|min:3',
            'complemento' => 'required|string|max:30|min:3'

        ];
    }
        public function messages(){
            return [
               'nome.required' => 'O campo nome deve ser preenchido',
                'endereco.required' => 'O campo endereço do  deve ser preenchido',
                'cidade.required' => 'O campo cidade pode conter no máximo 15 caracteres',
                'datanascimento.required' => 'O campo data nascimento deve ser preenchido',
                'bairro.required' => 'O campo bairro deve ser preenchido',
                'telefone.required' => 'O campo telefone deve ser preenchido',
                'email.required' => 'O campo  e-mail  deve ser preenchido',
                'cpf.required' => 'O campo cpf deve ser preenchido',
                'sexo.required' => 'O campo sexo deve ser preenchido',
                'complemento.required' => 'O campo complemento deve ser preenchido',
            ];
        }
    }

