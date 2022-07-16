<?php

namespace App;

use App\Cadastropessoass;
use Illuminate\Database\Eloquent\Model;

class Cadastropessoass extends Model
{
    protected $table = "cadastropessoass";
    protected $fillable = [
        //sempre colocar as variaveis do banco aqui!
        'nome',
        'endereco',
        'cidade',
        'telefone',
        'email',
        'cpf',
        'bairro',
        'pessoa',
        'datanascimento',
        'sexo',
        'created_at', 
        'updated_at'
    ];
    // seria para datas
    protected $dates = [
        'DataRequisicao',
    ];  //teste
    public function cadastropessoass(){
        return $this->hasMany('App\Equipamentoteste');
}
}