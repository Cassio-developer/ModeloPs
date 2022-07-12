<?php

use App\Models\PessoasTable;

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoasTable extends Model
{
    //
    protected $fillable = [
        'nome',
        'endereco',
        'cidade',
        'telefone',
        'email',
        'cpf',
        'bairro',
    ];
}
