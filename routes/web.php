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

	//Pagina para alterar o PIB
	Route::get('pib/alterar','Pib@alterarPib')->name('alterarPib');

	//Rota para Deletar o PIB
	Route::get('pib/deletar/{id?}','Pib@deletarPib')->name('deletarPib');

	//ROta para alterar o pib modal
	Route::get('pib/alterarModal/{id?}', 'Pib@selectPibPorIdModel')->name('pibModal');

	//Altra o pib de verdade
	Route::post('pib/alterarValidar', 'Pib@aterarPibValidar')->name('pibAlterarValidar');

	//chama a a pagina de pais
	Route::get('pais/gerenciar', 'Pais@gerenciarPais')->name('gerenciarPais');

	//Chama a roda de deletar um pais
	Route::get('pais/deletar/{id?}', 'Pais@deletarPais')->name('deletarPais');

	//Gravar um pais
	Route::post('pais/cadastrarValidar', 'Pais@cadastrarPais')->name('cadastrarPais');

	//Pagina para inserir os dados no sistema
	Route::post('validar', 'Pib@pibValidar')->name('validar');

	//Tela onde fica todos os graficos do PIB
	Route::get('grafico','Pib@pibGrafico')->name('grafico');

	//Pegando os dados do grafico
	Route::get('graficoPost/{anoPais?}','Pib@grafico')->name('dadosGrafico');

	//Pegando os dados do grafico
	Route::get('graficoPostPer/{anoPais?}','Pib@graficoPer')->name('dadosGraficoPer');
});
