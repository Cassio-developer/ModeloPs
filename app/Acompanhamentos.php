<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acompanhamentos extends Model
{    
    protected $table = "acompanhamentos";
    protected $primaryKey = 'id';
    protected $fillable =  ['data', 'descricao', 'user_id', 'protocolo_id'];

    public function protocolo() {
        return $this->belongsTo(Protos::class, 'protocolo_id');
    }                          //passando direto o relacionamento
                            //usar em outras
    public function user() {
        return $this->belongsTo(\App\User::class);
    }
}

