<?php

use App\Protos;

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protos extends Model
{
    protected $table = "protosss";
    protected $fillable = [
        'prazo',
        'descricao',
        'DataRequisicao',
        'cadastropessoass_id'

    ];   
    // seria para datas
    protected $dates = [
        'DataRequisicao',
    ];
             //função relaciona pessoa com cadastro
    public function cadastropessoass() {        //nome model!
        return $this->belongsTo(\App\Cadastropessoass::class);
    }
}
