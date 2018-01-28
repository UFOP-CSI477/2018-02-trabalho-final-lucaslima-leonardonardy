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


//Chama a tela de login
Route::prefix('/')->group(function () {

	//Pagina inicial do sistema
	Route::get('/','Pib@viewPrincipal')->name('home');

	//Pagina para inserir os dados no sistema
	Route::post('validar', 'Pib@pibValidar')->name('validar');

	//Tela onde fica todos os graficos do PIB
	Route::get('grafico','Pib@pibGrafico')->name('grafico');
});
