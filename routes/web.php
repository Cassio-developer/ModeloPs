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
                                      //function é função de callback
Route::group(['middleware' => 'web'], function(){

    Route::get('/', function () {
        return view('home');//rota antes welcome
    });
    
    
    Route::get('/cadastro', function () {
        return view('cadastro');
    })->name('cadastro');
    
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
    })->name('lista');
    
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
    })->name('pdf');
    
    Auth::routes();
    
    Route::get('/home', 'HomeController@index')->name('home');
    
    //testes de input de search!! continuar os testes
    
    //Route::get('/equipamento', 'EquipamentostesteController@index')->name('index');
    //rota de teste
    Route::resource('/equipamento', 'EquipamentostesteController')->except([
        'show', 'edit'
    ]);
    Route::get('/equipamento/delete/{equipamento}', function (App\Equipamentoteste $equipamento) {
        return view('protocolos.destroy', ['eqp1' => $equipamento]);
    })->name('equipamento.delete');
    Route::get('/equipamento/edit/{equipamento}', function (App\Equipamentoteste $equipamento) {
        return view('protocolos.edit', ['eqp1' => $equipamento]);
    })->name('equipamento.edit');
    
    
    //nova rota para cadastro de pessoas
    Route::resource('/cadastropessoass', 'CadastropessoassController')->except([
        'show', 'edit'
    ]);                        //este parametro verficar no php artisa route:list {cadastropessoass}
    Route::get('/cadastropessoass/delete/{cadastropessoass}', function (App\Cadastropessoass $cadastropessoass) {
        return view('cadastropessoasspasta.destroy', ['eqp' => $cadastropessoass]);
        //nome da pasta
    })->name('cadastropessoass.delete');                                            //passei aqui mesmo nome
    //nome da rota.arquivo
    Route::get('/cadastropessoass/edit/{cadastropessoass}', function (App\Cadastropessoass $cadastropessoass) {
        return view('cadastropessoasspasta.edit', ['eqp' => $cadastropessoass]);
        //nome da pasta
    })->name('cadastropessoass.edit');        //acionado pelo botao eqp
              //nome da rota.arquivo
    
    




});


