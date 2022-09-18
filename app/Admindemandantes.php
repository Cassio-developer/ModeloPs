<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admindemandantes extends Model
{

    
    protected $fillable = [
        'id', 'name', 'user_id', 'operadore_id'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function operadores()
    {
        return $this->belongsTo(\App\Operadores::class);
    }
}


