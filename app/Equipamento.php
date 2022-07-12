<?php

use App\Equipamento;

namespace App;

use Illuminate\Database\Eloquent\Model;


class Equipamento extends Model
{
    protected $table = "equipamentos";
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
