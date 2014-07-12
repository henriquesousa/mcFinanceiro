<?php

class createComposer
{
	$categorias = static::getCategorias();
	dd($categorias);
	$dadosCat = array();
	foreach ($categorias as $categoria) {
		$dadosCat[$categoria->id] = $categoria->descricao;
	}
	$view->with('categorias', $dadosCategoria);
};



View::composer('admin.despesas.edit', function($view)
{
	$categorias = static::getCategorias();
	$dadosCategoria = array();
	foreach ($categorias as $categoria) {
		$dadosCategoria[$categoria->id] = $categoria->nome;
	}
    $view->with('categorias', $dadosCategoria);
});

private static function getCategorias() {
		Cache::forget('categorias');
		return Cache::remember('categorias', 60, function()
		{
	    	return Categoria::all();
		});

	}
