<?php

class EntradasController extends BaseController {

	//$rules = Entrada::rule;
	/**
	 * Display a listing of entradas
	 *
	 * @return Response
	 */
	function Index()
	{
		$entradas = Entrada::with('categoria')->orderBy('descricao', 'ASC')->paginate(10);

		$qtd = count($entradas);

		return View::make('admin.entrada', compact('entradas', 'qtd'));
	}


	/*
	Formulario de criação atendendo aos 2 metodos GET e POST
	*/
	public function Add()
	{
		//dd( Entrada::$rules);
		$form = new GroupForm();

		if ($form->isPosted())
		{
			$this->beforeFilter('csf', array('on' => 'post'));

			if ($form->isValidForAdd(Entrada::$rules))
			{

				$entrada = new Entrada();
				$entrada->descricao = Input::get("descricao");
				$entrada->valor = Input::get("valor");
				$entrada->user_id = isset(Auth::user()->id)? Auth::user()->id : 1;
				$entrada->categoria_id = Input::get("categoria_id");
				$entrada->save();
				
				return Redirect::route("ent");
			}

			return Redirect::route("entradas_add")->withInput([
					"descricao"   => Input::get("descricao"),
					"valor"   => Input::get("valor")])
					->withErrors($form->getErrors());
				
		}

		$categorias = Categoria::where('tipo', '=', '1')->get();
		$dadosCat = array();
		foreach ($categorias as $categoria) {
				$dadosCat[$categoria->id] = $categoria->descricao;
			}

		return View::make("admin.entradas.create", [
			"form" => $form 
		])->with("categorias", $dadosCat);

	}



	/**
	 * Show the form for editing the specified entrada.
	 *
	 * @param  int  $id
	 * @return Response
	 *
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function Edit($id)
	{
		$form = new GroupForm();

		$entrada = Entrada::findOrFail($id);///->first() first pega o primeiro a ser encontrado pela  consulta
		
		$categorias = Categoria::where('tipo', '=', '1')->get();
		$url = URL::full();
		$data = Input::all();
		

		if ($form->isPosted())
		{
			$this->beforeFilter('csf', array('on' => 'post'));

			if ($form->isValidForAdd(Entrada::$rules))
			{
				$entrada->descricao = Input::get("descricao");
				$entrada->valor = Input::get("valor");
				$entrada->categoria_id = Input::get("categoria_id");
				$entrada->save();

				return Redirect::route("ent");
			}

			return Redirect::to($url)->with(compact('entrada', 'categorias'))->withErrors($form->getErrors());;
			
			
		}

		/* 
			* Tratamento da requisição GET para exibir a pagina de edição
			*
		*/
		if(!$entrada) {
			return Redirect::route('ent');
		}
		//metodo with envia para view os objetos com o compact			
		return View::make('admin.entradas.edit')->with(compact('entrada', 'categorias'));
		
	}
	

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function Delete($id)
	{
		Entrada::destroy($id);

		return Redirect::route('ent');
	}

	

}