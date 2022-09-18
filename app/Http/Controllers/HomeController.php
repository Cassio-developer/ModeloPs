<?php

namespace App\Http\Controllers;

use App\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user();

        if ($user->hasRole('super-admin')) {
            $totalUsers = User::count();

            $usersRoles = DB::table('model_has_roles')->get();

            $admin = $usersRoles->where('role_id', 1)->count();
           
            $recrutador = $usersRoles->where('role_id', 3)->count();
          
          

         
            return view('admin.home', compact('user', 'admin', 'candidato', 'recrutador', 'adminDemandante', 'secretaria', 'secretario', 'solicitacoes', 'listaEscolaridades'));
        } else if ($user->hasRole('candidato')) {
            error_log("teste1555");
            return view('candidato.home', compact('user', 'formacao', 'profissional', 'cursoExtra', 'candidato','listaEscolaridades','listaCursos', 'listaCidades', 'listaBairros'));
        } else if ($user->hasRole('recrutador-demandante')) {
            return view('recrutador-demandante/home', compact('user'));
        } else if ($user->hasRole('admin-demandante')) {
            return view('admin-demandante/home', compact('user'));
        } else if ($user->hasRole('secretario')) {
            return view('secretario/home', compact('user'));
        } else if ($user->hasRole('rh')) {
            return view('rh/home', compact('user'));
        } else {
            return view('/welcome');
        }
    }

}
