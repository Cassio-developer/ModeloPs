<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Arr;
//use App\Http\Middleware\AdminCheck;

class UserController extends Controller
{


 //   function __construct()
   // {
         
       //  $this->middleware(AdminCheck::class);

        //}
                 ///verificar se coloco middleware que criei ele barra


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
      
        $roles = Role::all()->pluck('name', 'id');
        return view('users.create', compact('roles'));
           // $id = request()->route()->parameter('id');
          //  $roles = Role::pluck('name','name')->all();
           
            
            return view('users.create',compact('roles',));
           
        

      
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $request->validate([
        //     'name' => 'required|min:3|max:5',
        //     'username' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required'
        // ]);
        $user = User::create($request->only('name', 'username', 'email','cpf','role')
            + [
                'password' => bcrypt($request->input('password')),
            ]);

        $roles = $request->input('role', []);
        $user->syncRoles($roles);
        return redirect()->route('users.index', $user->id)->with('success', 'Usuario criado corretamente!');
   

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        $user->load('roles');
        return view('users.show', compact('user'));
      //  $user = User::find($id);
        //$roles = Role::pluck('name','name')->all();
//return view('users.show',compact('user','roles'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id)
    {   
        //$user->cpf = $re    quest->input('cpf');
        $user = Auth::user();
    //    if ( ! Request::input('password') == '') // verifica se a senha foi alterada
     //   {
      //      $user->password = bcrypt(Request::input(['password'])); // muda a senha do seu usuario já criptografada pela função bcrypt
//}


// $role->permissions()->sync($request->input('permissions', []));
$roles = Role::all()->pluck('name', 'id');
//$user->getRoleNames();
//$user->load('roles');
        //$user = User::all()->pluck('name', 'username', 'email','cpf','role');
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return view('users.edit',compact('user','roles','userRole'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'cpf' => 'required|string|max:50|min:3',
            'role' => 'required'
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
                        ->with('Sucesso','Usuario criado!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('Sucesso','Usuario  deletado com sucesso!');
    }
}