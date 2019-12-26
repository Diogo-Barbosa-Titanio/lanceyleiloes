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

use App\Mail\TestAmazonSes;

Route::get('/', 'Front\HomeController@index');
Route::get('/home', 'Front\HomeController@index')->name('home');
Route::get('/lote/{id}', 'Front\LoteController@index');
Route::get('/pessoa_fisica', 'Front\PessoaFisicaController@create');
Route::post('/pessoa_fisica/store', 'Front\PessoaFisicaController@store');
Route::get('/pessoa_juridica', 'Front\PessoaJuridicaController@create');
Route::post('/pessoa_juridica/store', 'Front\PessoaJuridicaController@store');
Route::get('/quem_somos', function () {
    return view('front/quem_somos');
});

Route::get('/admin','Admin\LoginController@index');
Route::get('/admin/login','Admin\LoginController@index');
Route::post('/admin/login','Admin\LoginController@index')->name('admin_login');
Route::get('/admin/home','Admin\HomeController@index');

//Admin - Lotes
Route::get('/admin/lotes','Admin\LoteController@index');
Route::get('/admin/lotes/create','Admin\LoteController@create');
Route::post('/admin/lotes/store','Admin\LoteController@store');
Route::get('/admin/lotes/edit','Admin\LoteController@edit');
Route::put('/admin/lotes/update','Admin\LoteController@update');
Route::delete('/admin/lotes/delete','Admin\LoteController@destroy');


//Admin - Categorias
Route::get('/admin/lotes_categorias','Admin\LoteCategoriaController@index');
Route::get('/admin/lotes_categorias/create','Admin\LoteCategoriaController@create');
Route::post('/admin/lotes_categorias/store','Admin\LoteCategoriaController@store');
Route::get('/admin/lotes_categorias/edit','Admin\LoteCategoriaController@edit');
Route::put('/admin/lotes_categorias/update','Admin\LoteCategoriaController@update');
Route::delete('/admin/lotes_categorias/delete','Admin\LoteCategoriaController@destroy');

//Admin - Leilões
Route::get('/admin/leiloes','Admin\LeilaoController@index');
Route::get('/admin/leiloes/create','Admin\LeilaoController@create');
Route::post('/admin/leiloes/store','Admin\LeilaoController@store');
Route::get('/admin/leiloes/edit','Admin\LeilaoController@edit');
Route::put('/admin/leiloes/update','Admin\LeilaoController@update');
Route::delete('/admin/leiloes/delete','Admin\LeilaoController@destroy');



//Admin - Comitentes
Route::get('/admin/comitentes','Admin\ComitenteController@index');
Route::get('/admin/comitentes/create','Admin\ComitenteController@create');
Route::post('/admin/comitentes/store','Admin\ComitenteController@store');
Route::get('/admin/comitentes/edit','Admin\ComitenteController@edit');
Route::put('/admin/comitentes/update','Admin\ComitenteController@update');
Route::delete('/admin/comitentes/delete','Admin\ComitenteController@destroy');

//Admin - Administradores
Route::get('/admin/administradores', 'Admin\AdministradorController@index');
Route::get('/admin/administradores/create', 'Admin\AdministradorController@create');
Route::post('/admin/administradores/store', 'Admin\AdministradorController@store');
Route::get('/admin/administradores/edit','Admin\AdministradorController@edit');
Route::put('/admin/administradores/update','Admin\AdministradorController@update');
Route::delete('/admin/administradores/delete','Admin\AdministradorController@destroy');


//Admin - Pessoa Física
Route::get('/admin/pessoa_fisica','Admin\PessoaFisicaController@index');
Route::get('/admin/pessoa_fisica/create','Admin\PessoaFisicaController@create');
Route::post('/admin/pessoa_fisica/store','Admin\PessoaFisicaController@store');
Route::get('/admin/pessoa_fisica/edit','Admin\PessoaFisicaController@edit');
Route::put('/admin/pessoa_fisica/update','Admin\PessoaFisicaController@update');
Route::delete('/admin/pessoa_fisica/delete','Admin\PessoaFisicaController@destroy');


//Admin - Pessoa Jurídica
Route::get('/admin/pessoa_juridica','Admin\PessoaJuridicaController@index');
Route::get('/admin/pessoa_juridica/create','Admin\PessoaJuridicaController@create');
Route::post('/admin/pessoa_juridica/store','Admin\PessoaJuridicaController@store');
Route::get('/admin/pessoa_juridica/edit','Admin\PessoaJuridicaController@edit');
Route::put('/admin/pessoa_juridica/update','Admin\PessoaJuridicaController@update');
Route::delete('/admin/pessoa_juridica/delete','Admin\PessoaJuridicaController@destroy');



Route::get('test', function () {
    Mail::to('diogo.barbosa@gm5.com.br')->send(new TestAmazonSes());
});

Auth::routes();

Route::get('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return \Illuminate\Support\Facades\Redirect::route('home');
});

Route::get('admin/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return \Illuminate\Support\Facades\Redirect::route('admin_login');
});
