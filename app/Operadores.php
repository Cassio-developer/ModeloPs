<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operadores extends Model
{
    
    protected $fillable = [
        'id', 'name', 'user_id',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function solicitacao()
    {
        return $this->hasMany(\App\Solicitacao::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

   
    public function adminDemandantes()
    {
        return $this->hasMany(\App\AdminDemandantes::class);
    }

}


