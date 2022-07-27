<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Database\Eloquent\Collection;
                                      //function é função de callback com retorno
Route::group(['middleware' => 'web'], function(){
    Route::get('/', 'HomeController@index')->middleware('auth');
    Auth::routes();
    //com esta route abaixo funcionou direto pagina de login!!
    //Route::post('/login',['users'=>'loginController@checkLogin','as' => 'VerificarLogin']);
    Route::get('/welcome', 'HomeController@index')->name('welcome')->middleware('auth');
    //Route::get('/', function () {
        //return view('home');//rota antes welcome
   // });
    
    
    Route::get('/cadastro', function () {
        return view('cadastro');
    })->name('cadastro')->middleware('auth');
    
    Route::get('/lista', function () {
        $collection = collect([
            ['id' => 1, 'name' => 'John', 'surname' => 'Constantine', 'age' => 45],
            ['id' => 2, 'name' => 'Jane', 'surname' => 'Tarzan', 'age' => 33],
            ['id' => 3, 'name' => 'James', 'surname' => 'Hetfield', 'age' => 56],
            ['id' => 4, 'name' => 'Pablo', 'surname' => 'Picasso', 'age' => 91],
            ['id' => 5, 'name' => 'Elton', 'surname' => 'John', 'age' => 72],
        ]);
        //dd($collection);
        $cadastros = json_decode(json_encode($collection));
        // dd($cadastros);
        return view('tabela', compact('cadastros'));
    })->name('lista')->middleware('auth');
    
    Route::get('/pdf', function () {
        $collection = collect([
            ['id' => 1, 'name' => 'John', 'surname' => 'Constantine', 'age' => 45],
            ['id' => 2, 'name' => 'Jane', 'surname' => 'Tarzan', 'age' => 33],
            ['id' => 3, 'name' => 'James', 'surname' => 'Hetfield', 'age' => 56],
            ['id' => 4, 'name' => 'Pablo', 'surname' => 'Picasso', 'age' => 91],
            ['id' => 5, 'name' => 'Elton', 'surname' => 'John', 'age' => 72],
        ]);
        $cadastros = json_decode(json_encode($collection));
        $pdf = \PDF::loadView('pdf', compact('cadastros'));
        return $pdf->stream('exemplo.pdf');
    })->name('pdf')->middleware('auth');
    
   // Auth::routes();
    
    Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
    
    //testes de input de search!! continuar os testes
    //Route::get('/equipamento/delete/{equipamento}', function (App\Equipamentoteste $equipamento) {
     //   return view('protocolos.destroy', ['eqp1' => $equipamento]);
   // })->name('equipamento.delete')->middleware('auth');
    //Route::get('/equipamento/edit/{equipamento}', function (App\Equipamentoteste $equipamento) {
       // return view('protocolos.edit', ['eqp1' => $equipamento]);
    //})->name('equipamento.edit')->middleware('auth');
    
    //Route::get('/equipamento', 'EquipamentostesteController@index')->name('index');
    //rota de teste
    //Route::resource('/equipamento', 'EquipamentostesteController')->except([
       // 'show', 'edit'

    Route::post('/saveprot', 'EquipamentostesteController@store')->name('saveprot')->middleware('auth');
    
    Route::get('/registrar', 'EquipamentostesteController@cadastro')->name('registrar')->middleware('auth');

    Route::get('/tabelaprotocolo', 'EquipamentostesteController@index')->name('tabelaprotocolo')->middleware('auth');
    

    Route::get('/cadastroprotocolo/edit/{id}', 'EquipamentostesteController@edit')->name('editprot')->middleware('auth');

    Route::post('/cadastroprotocolo/{id}', 'EquipamentostesteController@update')->name('alterar_protocolo')->middleware('auth');

    Route::get('/deleteprot/{id}',  'EquipamentostesteController@delete')->name('deleteprot')->middleware('auth');


    //nova rota para cadastro de pessoas
    Route::resource('/cadastropessoass', 'CadastropessoassController')->except([
        'show', 'edit'
    ])->middleware('auth');                      //este parametro verficar no php artisa route:list {cadastropessoass}
    Route::get('/cadastropessoass/delete/{cadastropessoass}', function (App\Cadastropessoass $cadastropessoass) {
        if(!session()->has('redirect_to'))
        {
            session(['redirect_to' => url()->previous()]);
        }
        return view('cadastropessoasspasta.destroy', ['eqp' => $cadastropessoass]);
        //nome da pasta
    })->name('cadastropessoass.delete')->middleware('auth');                                           //passei aqui mesmo nome
    //nome da rota.arquivo
    Route::get('/cadastropessoass/edit/{cadastropessoass}', function (App\Cadastropessoass $cadastropessoass) {
        if(!session()->has('redirect_to'))
        {
            session(['redirect_to' => url()->previous()]);
        }
        return view('cadastropessoasspasta.edit', ['eqp' => $cadastropessoass]);
        //nome da pasta
    })->name('cadastropessoass.edit')->middleware('auth');        //acionado pelo botao eqp
              //nome da rota.arquivo
});


Route::get('/usuarios', 'UsuariosController@index')->name('usuarios')->middleware('auth');
Route::get('/usuarios/new', 'UsuariosController@new')->name('new')->middleware('auth');
Route::post('/usuarios/add', 'UsuariosController@add')->name('add')->middleware('auth');
Route::get('/usuarios/{id}/edit', 'UsuariosController@edit')->name('edit')->middleware('auth');
Route::delete('/usuarios/delete/{id}', 'UsuariosController@delete')->middleware('auth');
Route::post('/usuarios/update/{id}', 'UsuariosController@update')->name('update')->middleware('auth');