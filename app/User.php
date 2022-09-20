<?php

namespace App;

use App\User;
//use App\RegisterController;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;   
class User extends Authenticatable implements Auditable


    {   
    use \OwenIt\Auditing\Auditable;
    use HasRoles;
    //protected $guard_name = 'api';

    protected $fillable = [
        'name', 'email', 'cpf','password','role'
    ];
    protected $primaryKey = 'id';
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    
    public function isAdministrator() {
        return $this->roles()->where('name', 'AdministradorTI')->exists();
        return $this->roles()->where('name', 'Administradordosistema')->exists();
        return $this->roles()->where('name', 'Operador')->exists();
     }
   
   
    public function acompanhamento() {
        return $this->hasMany(\App\Acompanhamentos::class);
    }

    public function departamento() {
        return $this->belongsToMany(\App\Departamento::class);

     //   }
      //  public function permissions(){
//return $this->belongsToMany(Permission::class,'roles_permissions');
        }
        public function roles(){
            return $this->belongsToMany(Role::class,'user_role');
        }
        public function edit() {
            return $this->belongsToMany(\App\User::class);
        }

}