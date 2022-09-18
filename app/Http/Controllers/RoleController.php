<?php
    
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;   
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
    
class RoleController extends Controller
{
  
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
         //testar esse middleware pra barrar os usuarios, somente administrador
         //$this->middleware(AdminCheck::class);
         ///verificar se coloco middleware que criei ele barra
        }
  
    public function index(Request $request)
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
   
    public function create()
    {
        $permissions = Permission::all()->pluck('name', 'id');
        return view('roles.create', compact('permissions'));
    }
    


    public function store(Request $request)
    {
        $role = Role::create($request->only('name'));
        $role->syncPermissions($request->input('permissions', []));
    
        return redirect()->route('roles.index')
                        ->with('Sucesso','Role criado!');
    }
    
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
    
        return view('roles.show',compact('role','rolePermissions'));
    }
    
    
    public function edit(Role $role)
    {


        $permissions = Permission::all()->pluck('name', 'id');
        $role->load('permissions');
        return view('roles.edit',compact('role', 'permissions'));
    }
    
    
    public function update(Request $request, Role $role)
    {
      
           $role->update($request->only('name'));
           $role->syncPermissions($request->input('permissions', []));
        return redirect()->route('roles.index')
                        ->with('Sucesso','Role atualizado!');
    }
    
    public function destroy(Role $role)
    {  

         $role->delete();
        return redirect()->route('roles.index')
                        ->with('Sucesso','Role deletado !');
    }
}