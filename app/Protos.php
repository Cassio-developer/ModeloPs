<?php

use App\Protos;

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protos extends Model
{
    protected $table = "protosss";
    protected $fillable = [
        'nome',
        'campoprotocolo',
        'descricao',
        'DataRequisicao',
        'demandante'

    ];   
    // seria para datas
    protected $dates = [
        'DataRequisicao',
    ];
}
