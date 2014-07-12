<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::any("/cadastrousuario", [
	"as" => "user_add",
	"uses" => "UserController@Add"
]);



/*
	Rotas para login , reset , request
*/
Route::group(["before" => "guest"], function()
{
	Route::any("/login", [
		"as" => "user_login",
		"uses" => "UserController@login"
	]);
	
	Route::any("/logando", [
		"as" => "user_logando",
		"uses" => "UserController@loginAction"
	]);

	Route::any("/request", [
		"as" => "user_request",
		"uses" => "UserController@requestAction"
	]);
	 
	Route::any("/reset", [
		"as" => "user_reset",
		"uses" => "UserController@resetAction"
	]);
});

//Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
Route::group(array('prefix' => 'admin'), function()
{

	/*
		Paineis Administrativos
	*/
	Route::any('/dashboard',[
		"as"   => "dashboard",
		"uses" => "DespesaController@Index"
	]);
	
	Route::any('/',[
		"as"   => "user_perfil",
		"uses" => "UserController@Index"
	]);

	Route::any('/perfil',[
		"as"   => "user_perfil",
		"uses" => "UserController@Index"
	]);

	Route::any("/logout", [
		"as" => "user_logout",
		"uses" => "UserController@logoutAction"
	]);

	Route::any("/editar-usuario/{id}", [
		"as" => "user_edit",
		"uses" => "UserController@Edit"
	]);


	

	/*
	| Rotas para DESPESAS
	*/

	Route::any("/despesas",[
		"as"   => "desp",
		"uses" => "DespesaController@Index"
	]);

	Route::any("/despesas/add", [
		"as" => "desp_add",
		"uses" => "DespesaController@add"
	]);

	Route::any("/despesas/list", [
		"as" => "desp_list",
		"uses" => "DespesaController@Listar"
	]);

	Route::any("/despesas/edit/{id}", [
		"as" => "desp_edit",
		"uses" => "DespesaController@Edit"
	]);

	Route::any("/despesas/delete/{id}", [
		"as" => "desp_del",
		"uses" => "DespesaController@Delete"
	]);


	/*
	| Rotas para ENTRADAS
	*/
	Route::any('/entradas',[
		"as"   => "ent",
		"uses" => "EntradasController@Index"
	]);

	Route::any("/entradas/add", [
		"as" => "ent_add",
		"uses" => "EntradasController@Add"
	]);

	Route::any("/entradas/list", [
		"as" => "ent_list",
		"uses" => "EntradasController@Listar"
	]);

	Route::any("/entradas/edit/{id}", [
		"as" => "ent_edit",
		"uses" => "EntradasController@Edit"
	]);

	Route::any("/entradas/delete/{id}", [
		"as" => "ent_del",
		"uses" => "EntradasController@Delete"
	]);


	/*
	| Rotas para Categorias
	*/
	Route::any("/categorias", [
		"as" => "categ_list",
		"uses" => "CategoriasController@Index"
	]);
	Route::any("/categorias/add/{id}", [
		"as" => "categ_add",
		"uses" => "CategoriasController@Add"
	]);
	Route::any("/categorias/edit/{id}", [
		"as" => "categ_edit",
		"uses" => "CategoriasController@Edit"
	]);
	Route::any("/categorias/excluir/{id}", [
		"as" => "categ_del",
		"uses" => "CategoriasController@Delete"
	]);


	/*
	| Rotas para INVESTIMENTOS
	*/
	Route::any('/investimentos',[
		"as"   => "inv",
		"uses" => "InvestimentosController@Index"
	]);

	Route::any("/investimentos/add", [
		"as" => "inv_add",
		"uses" => "InvestimentosController@Add"
	]);

	Route::any("/investimentos/list", [
		"as" => "inv_list",
		"uses" => "InvestimentosController@Listar"
	]);

	Route::any("/investimentos/edit/{id}", [
		"as" => "inv_edit",
		"uses" => "InvestimentosController@Edit"
	]);

	Route::any("/investimentos/delete/{id}", [
		"as" => "inv_del",
		"uses" => "InvestimentosController@Delete"
	]);




});