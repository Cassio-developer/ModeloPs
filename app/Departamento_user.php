<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento_user extends Model
{    
    protected $fillable = ['departamento_id', 'user_id'];
    protected $primaryKey = 'id';

    public function protocolo() {
        return $this->hasMany(\App\Protos::class);
    }

    public function user() {
        return $this->belongsToMany(\App\User::class);
}
}