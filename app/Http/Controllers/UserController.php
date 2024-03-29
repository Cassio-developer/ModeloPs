<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUpdateUserCreateFormRequest;

use Illuminate\Support\Arr;
use App\Http\Middleware\AdminCheck;

class UserController extends Controller
{


   function __construct()
   {
         
        $this->middleware(AdminCheck::class);

        }
                 ///verificar se coloco middleware que criei ele barra


    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    
    public function create()
    {    
      
        $roles = Role::all()->pluck('name', 'id');

       
     


        return view('users.create', compact('roles'));
    }
    

    public function store(StoreUpdateUserCreateFormRequest  $request)
    {
       
       
        $user = User::create($request->only('name', 'username', 'email','cpf','role')
            + [
                'password' => bcrypt($request->input('password')),
            ]);
            

            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                    'cpf' => ['required', 'string', 'cpf', 'unique:users'],
    
            ], [
                'name.required' => 'Nome é obrigatório',
                'name.string' => 'Somente letras',
                'name.max' => 'Máximo 255 caracteres',
                'email.required' => 'Email é obrigatório',
                'email.email' => 'Formato errado',
                'email.max' => 'Máximo 255 caracteres',
            
                'email.unique' => 'E-mail já cadastrado',
                'cpf.required' => 'CPF é obrigatório',
                'cpf.max' => 'Máximo 14 numeros',
                'cpf.unique' => 'CPF já cadastrado',
                'cpf.cpf' => 'CPF inválido',
                'password.required' => 'Senha é obrigatório',
                'password.min' => 'Minimo 8 caracteres',
                'password.confirmed' => 'Senhas precisam ser iguais',
    
            ]);
    
            if ($validator->fails()) {
                return redirect('users') 
                    ->withErrors($validator)
                    ->withInput();
            }




        $roles = $request->input('role', []);
        $user->syncRoles($roles);
        return redirect()->route('users.index', $user->id)->with('success', 'Usuario criado corretamente!');
   

        }

    
    public function show(User $user)
    {

        $user->load('roles');
        return view('users.show', compact('user'));
      
    }
    
    
    public function edit(Request $request ,$id)
    {   
       
        $user = Auth::user();
        //$roles = Role::all()->pluck('name', 'id');
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        $roles = Role::all()->pluck('name', 'id');
        $user->load('roles');
        return view('users.edit',compact('user','roles','userRole'));
    }
    
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'cpf' => 'required|string|max:50|min:3',
            //'role' => 'required'
        ]);
    
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('users.index')
                        ->with('Sucesso','Usuario criado com sucesso!');
    }
    
    
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('Sucesso','Usuario  deletado com sucesso!');
    }
}