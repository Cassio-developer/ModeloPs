<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

//use Alert;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
//use  RealRashid\SweetAlert\SweetAlertServiceProvider ;
class AdministradorController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    


    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createUsers()
    {
       
            $user = User::all();

            return view('admin.create-users', compact('user'));
        
         
            return redirect()->route('home');
        }
    

    //Criar usuários por dentro do sistema através de administrador
    public function storeUsers(Request $request)
    {
        // try {
      

        if ($request->tipo_user == 'Admin-demandante') {

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'cpf'=> $request->input('cpf'),
                'password' => Hash::make($request->input('password')),
            ]);

        
    

            $user->assignRole('admin-demandante');
        }

        if ($request->tipo_user == 'Operadores') {

            $user = Operadores::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                //'cpf'=> $request->input('cpf'),
                'password' => Hash::make($request->input('password')),
            ]);

        

        }
      
        return redirect()->route('home');

    }
}


