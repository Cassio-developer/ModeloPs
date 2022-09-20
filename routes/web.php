<?php

use App\Http\Controllers\RegistroController;
use Illuminate\Database\Eloquent\Collection;

                             
Route::group(['middleware' => 'web'], function(){
    Route::get('/', 'HomeController@index')->middleware('auth');
    Auth::routes();
 
    Route::get('/welcome', 'HomeController@index')->name('welcome')->middleware('auth');
   
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
    
    
    Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
    

    Route::get('/tabelaprotocolo', 'ProtosController@indextabelaprotoco')->name('tabelaprotocolo')->middleware('auth');

    Route::get('/registrar', 'ProtosController@registrarcadastro')->name('registrar')->middleware('auth');

    Route::post('/salvandoprotocolo', 'ProtosController@cadastroprotocolo')->name('saveprot')->middleware('auth');

    
    Route::get('/acompanhamento/{id}', 'ProtosController@acompanhamentoprotocolo')->name('acompanhamento')->defaults('id', 'acomp')->middleware('auth');

    Route::post('/acompanhamento/saveacomp/{id}', 'ProtosController@saveacompanhamento')->defaults('id', 'saveacompanhamento')->name('salvandoacomp')->middleware('auth');

    Route::get('/cadastroprotocolo/edit/{id}', 'ProtosController@editarprotocolos')->name('editprot')->middleware('auth');

    Route::post('/cadastroprotocolo/{id}', 'ProtosController@atualizandoprotocolo')->name('alterar_protocolo')->middleware('auth');

    Route::get('/deleteprot/{id}',  'ProtosController@deletandoprotocolo')->name('deleteprot')->middleware('auth');


    Route::resource('/cadastropessoass', 'CadastropessoassController')->except([
        'show', 'edit'
    ])->middleware('auth');                     
    Route::get('/cadastropessoass/delete/{cadastropessoass}', function (App\Cadastropessoass $cadastropessoass) {
        if(!session()->has('redirect_to'))
        {
            session(['redirect_to' => url()->previous()]);
        }
        return view('cadastropessoasspasta.destroy', ['eqp' => $cadastropessoass]);
        
    })->name('cadastropessoass.delete')->middleware('auth');                                          
   
    Route::get('/cadastropessoass/edit/{cadastropessoass}', function (App\Cadastropessoass $cadastropessoass) {
        if(!session()->has('redirect_to'))
        {
            session(['redirect_to' => url()->previous()]);
        }
        return view('cadastropessoasspasta.edit', ['eqp' => $cadastropessoass]);
      
    })->name('cadastropessoass.edit')->middleware('auth');       
             
});


Route::get('/usuarios', 'UsuariosController@index')->name('usuarios')->middleware('auth');
Route::get('/usuarios/new', 'UsuariosController@new')->name('new')->middleware('auth');
Route::post('/usuarios/add', 'UsuariosController@add')->name('add')->middleware('auth');
Route::get('/usuarios/{id}/edit', 'UsuariosController@edit')->name('edit')->middleware('auth');
Route::delete('/usuarios/delete/{id}', 'UsuariosController@delete')->middleware('auth');
Route::post('/usuarios/update/{id}', 'UsuariosController@update')->name('update')->middleware('auth');

Route::get('/auditoria', 'AuditoriaController@index')->name('auditoria')->middleware('auth');
Route::get('/auditoria/{id}/detalhamento', 'AuditoriaController@detalhamento')->name('detalhamento')->middleware('auth');


Route::get('/pdf', 'ProtosController@pdf')->name('pdfId')->middleware('auth');
Route::get('/pdfunico/{id}', 'ProtosController@pdfunico')->name('unicopdf')->middleware('auth');
Route::post('/upload', 'ProtosController@upload')->name('upload')->middleware('auth');


Route::get('/cadastrodepart', 'DepartamentoController@indexdepartamento')->middleware('auth');

Route::post('/storedepart', 'DepartamentoController@storedepartamento')->name('storedepart')->middleware('auth');

Route::get('/tabeladepart', 'DepartamentoController@tabeladepartamento')->name('tabeladepart')->middleware('auth');

Route::get('tabeladepart/atribuir/{id}', 'DepartamentoController@atribuirusuario')->name('atribuir')->middleware('auth');
Route::delete('/tabeladepart', 'DepartamentoController@delete')->name('delete')->middleware('auth');


Route::post('saveatribuir/{id}', 'DepartamentoController@savandoatribuicao')->name('atribuirsalvando')->middleware('auth');

Route::get('/', 'HomeController@index')->middleware('auth');


//});
//Route::group(['middleware' => ['auth', 'auth.admin'], function () {
    // Minhas rotas da administração aqui
//});

 //amanhga verificar porque nao esta mostarndo os menus pra super ususario
Route::group([ 'middleware' => ['auth', 'auth.admin'] ,
],function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
   
});

Route::delete('/roles/{id}',  'RoleController@destroy')->name('destroy')->middleware('auth');

Route::delete('/users/{id}',  'UserController@destroy')->name('destroy')->middleware('auth');
Route::put('/users/{user}', 'UserController@update')->name('users.update');

Auth::routes();