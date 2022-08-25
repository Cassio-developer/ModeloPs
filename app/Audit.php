<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Audit;
use App\Protos;

use App\Cadastropessoass;
use OwenIt\Auditing\Contracts\Auditable;
//cassio audiotable                     //cassio audiotable  
class Audit extends Model
{
    

    protected $table = "audits";
    protected $fillable = [
        //sempre colocar as variaveis do banco aqui!
        'user_type',
        'user_id',
        'event',
        'auditable',
        'old_values',
        'new_values',
        'url',
        'ip_address',
        'user_agent',
        'tags',
        'created_at',
        'new_values',
        'updated_at',
    
        'model'       => App\Cadastropessoass::class,
        
        // with this
        'model'       => App\Models\Cadastropessoass::class,
        'model'       => App\Protos::class,
        
        // with this
        'model'       => App\Models\Protos::class,



    ];
    
}
