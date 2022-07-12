<?php

use App\Protocolo;

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protocolo extends Model
{
    protected $fillable = [
        'numero_protocolo',
        'campo_protocolo',
        'descrição',
        'Data_Requisição',
        'demandante',
    ];
}
