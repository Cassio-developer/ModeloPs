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
use App\Http\Controllers\RegistroController;
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
    
   // Route::get('/pdf', function () {
      //  $collection = collect([
         //   ['id' => 1, 'name' => 'John', 'surname' => 'Constantine', 'age' => 45],
          //  ['id' => 2, 'name' => 'Jane', 'surname' => 'Tarzan', 'age' => 33],
          //  ['id' => 3, 'name' => 'James', 'surname' => 'Hetfield', 'age' => 56],
          //  ['id' => 4, 'name' => 'Pablo', 'surname' => 'Picasso', 'age' => 91],
          //  ['id' => 5, 'name' => 'Elton', 'surname' => 'John', 'age' => 72],
      //  ]);
       // $cadastros = json_decode(json_encode($collection));
      //  $pdf = \PDF::loadView('pdf', compact('cadastros'));
       // return $pdf->stream('exemplo.pdf');
   // })->name('pdf')->middleware('auth');
    
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

    Route::post('/saveprot', 'ProtosController@cadastroprotocolo')->name('saveprot')->middleware('auth');
    
    Route::get('/registrar', 'ProtosController@registrarcadastro')->name('registrar')->middleware('auth');

    Route::get('/tabelaprotocolo', 'ProtosController@index')->name('tabelaprotocolo')->middleware('auth');
    
    Route::get('/acompanhamento/{id}', 'ProtosController@acompanhamentoprotocolo')->name('acompanhamento')->defaults('id', 'acomp')->middleware('auth');

    Route::post('/acompanhamento/saveacomp/{id}', 'ProtosController@saveacompanhamento')->defaults('id', 'saveacompanhamento')->name('salvandoacomp')->middleware('auth');

    Route::get('/cadastroprotocolo/edit/{id}', 'ProtosController@editarprotocolos')->name('editprot')->middleware('auth');

    Route::post('/cadastroprotocolo/{id}', 'ProtosController@atualizandoprotocolo')->name('alterar_protocolo')->middleware('auth');

    Route::get('/deleteprot/{id}',  'ProtosController@deletandoprotocolo')->name('deleteprot')->middleware('auth');


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
//auditoria
Route::get('/auditoria', 'AuditoriaController@index')->name('auditoria')->middleware('auth');
Route::get('/auditoria/{id}/detalhamento', 'AuditoriaController@detalhamento')->name('detalhamento')->middleware('auth');


Route::get('/pdf', 'ProtosController@pdf')->name('pdfId')->middleware('auth');
Route::get('/pdfunico/{id}', 'ProtosController@pdfunico')->name('unicopdf')->middleware('auth');
Route::post('/upload', 'ProtosController@upload')->name('upload')->middleware('auth');


//Route::get('auth/login', 'Auth\LoginController@getLogin')->name('login');
//Route::post('auth/login', 'Auth\LoginController@postLogin')->name('login');
//Route::get('auth/logout', 'Auth\LoginController@getLogout')->name('login');

// Registration routes...
//Route::get('auth/register', 'Auth\RegisterController@index')->name('register');
//Route::post('auth/register', 'Auth\RegisterController@create')->name('register');
//Auth::routes();


//Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');


Route::get('/cadastrodepart', 'DepartamentoController@indexdepartamento')->middleware('auth');

Route::post('/storedepart', 'DepartamentoController@storedepartamento')->name('storedepart')->middleware('auth');

Route::get('/tabeladepart', 'DepartamentoController@tabeladepartamento')->name('tabeladepart')->middleware('auth');

Route::get('tabeladepart/atribuir/{id}', 'DepartamentoController@atribuirusuario')->name('atribuir')->middleware('auth');

Route::post('saveatribuir/{id}', 'DepartamentoController@savandoatribuicao')->name('atribuirsalvando')->middleware('auth');
Auth::routes();