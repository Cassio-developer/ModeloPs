<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = ['departamento'];
    protected $primaryKey = 'id';

    public function protocolo() {
        return $this->hasMany(\App\Protos::class);
    }

    public function user() {
        return $this->belongsToMany(\App\User::class);
}
}