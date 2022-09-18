<?php

namespace App;

use App\Cadastropessoass;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class Cadastropessoass extends Model implements Auditable


{    
    use \OwenIt\Auditing\Auditable;
    protected $table = "cadastropessoass";
    protected $fillable = [
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
        'numero',
        'complemento',
        'created_at', 
        'updated_at'
    ];
    protected $dates = [
        'DataRequisicao',
    ]; 
    public function protocolo() {
        return $this->hasMany(\App\Protos::class);
    }
}
