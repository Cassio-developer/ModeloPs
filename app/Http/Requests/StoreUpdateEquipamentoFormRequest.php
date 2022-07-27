<?php
namespace App\Http\Requests;
use App\Equipamentoteste; //CUIDAR COLOQUEI O MODEL EM CIMA NAMESPACE DEU ERRO!!

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
          
    {     if ($this->request->has("cancel")){ return [];} 
        //realiza as validações de campo de erro aqui!
        return [
             'prazo' => 'required|string|max:50|min:3',
            'descricao' => 'required|string|max:255|min:3',
            'DataRequisicao' => 'required|string|max:50|min:0',
            'pessoa_id' => 'required|string|max:50|min:0'
            //cuidar pois nao estava passando os nomes corretamente e nao enviava nao fazia nada 
        ];
    }
        public function messages(){
            return [
               'prazo.required' => 'O campo prazo deve ser preenchido',
                'descricao.required' => 'O campo descrição deve ser preenchido',
                'DataRequisicao.required' => 'O campo data deve ser preenchido',
                'pessoa_id.required' => 'O campo pessoa deve ser selecionado',
                
            ];
        }
        
    }

