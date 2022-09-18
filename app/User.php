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
    //use Notifiable;
    use HasRoles;//permissões de admin!
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //public $guard_name = 'api';
    //protected $table = "users";
    //protected $guard_name = 'web';
    protected $fillable = [
        'name', 'email', 'cpf','password',
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


    
    public function isAdministrator() {
        return $this->roles()->where('name', 'AdministradorTI')->exists();
        return $this->roles()->where('name', 'Administradordosistema')->exists();
        return $this->roles()->where('name', 'Operador')->exists();
     }
   
//public function isAdministrator() {
       // return $this->roles()->where('name', 'AdministradorTI')->exists();
//return $this->roles()->where('name', 'Administradordosistema')->exists();
       // return $this->roles()->where('name', 'Operador')->exists();
   //  }
   
    public function acompanhamento() {
        return $this->hasMany(\App\Acompanhamentos::class);
    }

    public function departamento() {
        return $this->belongsToMany(\App\Departamento::class);

//DEPOIS VERIFICAR SE COLOCAR DE NOVO ELE SOME AS VISUALIZAÇOES DE PERMISSÕES DA PAGINA USUARIO
}
public function roles(){
    return $this->belongsToMany(Role::class,'user_role');
}
public function edit() {
    return $this->belongsToMany(\App\User::class);
}

//public function roles(){
  //  return $this->belongsToMany(Role::class,'user_role');
//}
 
//public function groups(){
  //  return $this->belongsToMany(Group::class,'user_group');
//}
//public function permissions(){
   // return $this->belongsToMany(Permission::class,'role_permission');
//}
}