<?php

namespace App\Http\Controllers;



use View;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use App\User;
use App\App\atribuir;
use App\Departamento;
use App\Departamento_user;
use App\Protos;
use App\Cadastropessoass; 
use App\Acompanhamento;
use PDF;
use App\Arquivo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DepartamentoController extends Controller
{


    public function __construct()
    {
        $this->middleware(['AdmSistema' OR 'AdmTI']);
    }

    public function indexdepartamento()
    {
        $user = User::all();

        $departamento = \App\Departamento::all();

        return view('departamentos/cadastrodepart', compact('departamento', $departamento,'user',$user));
    }


    public function storedepartamento(Request $request)
    {

        $departamento = new Departamento();
        $departamento->departamento = $request->input('departamento');


        $validator = Validator::make($request->all(), [
            'departamento' => 'required',

        ], [
            'departamento.required' => 'O campo descrição é obrigatório',

        ]);

        if ($validator->fails()) {
            return redirect('tabeladepart') //retorno para tabela departamento
                ->withErrors($validator)
                ->withInput();
        }

        $departamento->save();


                   //retorno tabela departamento
        return redirect('/tabeladepart')->with('success', 'Departamento cadastrado com sucesso!');
    }

    public function tabeladepartamento()
    {

        $user = User::all();
        $departamento = Departamento::all();
        return view('departamentos/tabeladeparta', compact('departamento', $departamento, 'user', $user));
    }


    public function atribuirusuario(Request $request, $id)
    {

        $id = request()->route()->parameter('id');
        $departamento = Departamento::find($id);
        $user = User::all();
        
        return view('departamentos/atribuir', compact('departamento', $departamento, 'user', $user))->with('success', 'Usuario atribuido cadastrado com sucesso!');
    }

    public function savandoatribuicao(Request $request, $id)
    {


        $atribuir = new User();
        $departamento = Departamento::find($id);
        $usuario_id = $request->input('user_id');
        $usuario = User::find($usuario_id);
        $usuario->save();
        //$limit = Departamento_user::where('user_id', $departamento->user_id)
        //->where('departamento_id', $departamento->id)->exists();
        $limit = $departamento->user()->where('user_id', $usuario_id)->exists();
        error_log('teste' . $limit);
        if ($limit) {
            error_log('teste2');
            return redirect()->back();
        } else {
            $departamento->user()->attach($usuario);
            return redirect()->back();
            //anilizar porque napo esta salvando
            return redirect('/tabeladepartamento')->with('success', 'Usuario atribuido cadastrado com sucesso!');
        }
    }
}
