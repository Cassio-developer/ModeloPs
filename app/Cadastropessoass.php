<?php

namespace App;

use App\Cadastropessoass;
use Illuminate\Database\Eloquent\Model;

class Cadastropessoass extends Model
{
    protected $table = "cadastropessoass";
    protected $fillable = [
        'nome',
        'endereco',
        'cidade',
        'telefone',
        'email',
        'cpf',
        'bairro',
        'datanascimento'
    ];
}
