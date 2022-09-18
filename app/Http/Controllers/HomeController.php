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
        
            return view('admin.home', compact('user', 'admin'));
        } else if ($user->hasRole('admin-demandante')) {
            return view('admin-demandante/home', compact('user'));
        } else {
            return view('/welcome');
        }
    }

}
