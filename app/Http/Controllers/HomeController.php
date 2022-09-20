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

        $role=Auth::user()->role;

        if($role=='1')
        {
            return view('welcome', compact('user', 'role'));
        }

        if($role=='2')
        {
            return view('welcome');
        }

        else{
            return view('welcome');
        }

        return view('welcome');
    }

}
