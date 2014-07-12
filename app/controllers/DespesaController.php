<?php

class DespesaController extends BaseController {

	//$rules = Despesa::rule;
	/**
	 * Display a listing of despesas
	 *
	 * @return Response
	 */
	function Index()
	{
		$despesas = Despesa::with('categoria')->orderBy('descricao', 'ASC')->paginate(10);

		$qtd = count($despesas);
		return View::make('admin.despesa', compact('despesas', 'qtd'));
	}


	/*
	Formulario de criação atendendo aos 2 metodos GET e POST
	*/
	public function add()
	{
		
		$form = new GroupForm();

		if ($form->isPosted())
		{
			$this->beforeFilter('csrf', array('on' => 'post'));

			if ($form->isValidForEdit(Despesa::$rules))
			{
				
				$despesa = new Despesa();

					$despesa->descricao = Input::get("descricao");
					$despesa->valor = Input::get("valor");
					$despesa->user_id = isset(Auth::user()->id)? Auth::user()->id : 1;
					$despesa->categoria_id = Input::get("categoria_id");

					$despesa->save();
				

				return Redirect::route("desp");
			}
			
			
			return Redirect::route("desp_add")->withInput([
				"descricao"   => Input::get("descricao"),
				"valor"   => Input::get("valor")])
				->withErrors($form->getErrors());
			
			
		}
		$categorias = Categoria::where('tipo', '=', '2')->get();
		
		$dadosCat = array();
		foreach ($categorias as $categoria) {
			$dadosCat[$categoria->id] = $categoria->descricao;
		}

		return View::make("admin.despesas.create", [
			"form" => $form 
		])->with("categorias", $dadosCat);
	}



	/**
	 * Show the form for editing the specified despesa.
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

		$despesa = Despesa::findOrFail($id);///->first() first pega o primeiro a ser encontrado pela  consulta
		
		$categorias = Categoria::where('tipo', '=', '2')->get();
		$url = URL::full();
		$data = Input::all();
		

		if ($form->isPosted())
		{
			$this->beforeFilter('csf', array('on' => 'post'));

			if ($form->isValidForAdd(Despesa::$rules))
			{
				$despesa->descricao = Input::get("descricao");
				$despesa->valor = Input::get("valor");
				$despesa->categoria_id = Input::get("categoria_id");
				$despesa->created_at = Input::get("created_at");
				$despesa->save();

				return Redirect::route("desp");
			}

			return Redirect::to($url)->with(compact('despesa', 'categorias'))->withErrors($form->getErrors());;
			
			
		}

		/* 
			* Tratamento da requisição GET para exibir a pagina de edição
			*
		*/
		if(!$despesa) {
			return Redirect::route('desp_edit');
		}
		//metodo with envia para view os objetos com o compact			
		return View::make('admin.despesas.edit')->with(compact('despesa', 'categorias'));
		
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function Delete($id)
	{
		Despesa::destroy($id);

		return Redirect::route('desp');
	}

}