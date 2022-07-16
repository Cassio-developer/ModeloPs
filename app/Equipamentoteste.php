<?php

use App\Equipamentoteste;

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamentoteste extends Model
{    
    protected $table = "equipamentoss";
   
    protected $fillable = [
        'numero',
        'campoprotocolo',
        'descricao',
        'DataRequisicao',
        'pessoa'
        
    ];
    // seria para datas
    protected $dates = [
        'DataRequisicao',
    ];
}
