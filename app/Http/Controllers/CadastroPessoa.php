<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroPessoa extends Controller
{
    public function cadastroPessoa (){
        var_dump($_POST);
        $request->validate();
        
        return  view('cadastroPessoa');
    }
}