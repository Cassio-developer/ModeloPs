<?php

use App\Protos;

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
//cassio audiotable                     //cassio audiotable 
class Protos extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table = "protosss";
    protected $primaryKey = 'id';
    protected $fillable = [
        'pessoa',
        'prazo',
        'descricao',
        'DataRequisicao',
        'cadastropessoass_id',
        'departamento_id'
    ];   
    
    protected $dates = [
        'DataRequisicao',
    ];
            
    public function cadastropessoass() {       
        return $this->belongsTo(\App\Cadastropessoass::class);

    }
    public function acompanhamento() {
        return $this->hasMany(\App\Acompanhamento::class);
    }

    public function departamento() {
        return $this->belongsTo(\App\Departamento::class);
    }
}
