<?php
namespace App\Http\Requests;
use App\UserController; //CUIDAR COLOQUEI O MODEL EM CIMA NAMESPACE DEU ERRO!!

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserCreateFormRequest extends FormRequest
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
          
    {     if ($this->request->has("cancel")){ return [];} 
        //realiza as validações de campo de erro aqui!
        return [
            'nome' => 'required|string|max:255|min:3',
            'datanascimento' => 'required|string|max:255|min:0',
            'cpf' => 'required|string|max:50|min:3',
            //cuidar pois nao estava passando os nomes corretamente e nao enviava nao fazia nada 
        ];
    }
        public function messages(){
            return [
                'nome.required' => 'O campo nome deve ser preenchido',
                'datanascimento.required' => 'O campo data nascimento deve ser preenchido',
                'cpf.required' => 'O campo cpf deve ser preenchido',
                //não estava funcionado com pessoas_id
            ];
        }
        
    }

