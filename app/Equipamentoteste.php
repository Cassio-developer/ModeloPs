<?php

use App\Equipamentoteste;

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamentoteste extends Model
{
    protected $table = "equipamentoss";
    protected $fillable = [
        'nome',
        'campoprotocolo',
        'descricao',
        'DataRequisicao',
        'demandante'
    ];
}