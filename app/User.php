<?php

namespace App;
use App\User;
//use App\RegisterController;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements Auditable
{   
    use \OwenIt\Auditing\Auditable;
    //use Notifiable;
    use HasRoles;//permissões de admin!
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = "users";

    protected $fillable = [
        'name', 'email', 'cpf', 'role', 'password','created_at','updated_at',
    ];
    protected $primaryKey = 'id';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function acompanhamento() {
        return $this->hasMany(\App\Acompanhamentos::class);
    }

    public function departamento() {
        return $this->belongsToMany(\App\Departamento::class);

}
}