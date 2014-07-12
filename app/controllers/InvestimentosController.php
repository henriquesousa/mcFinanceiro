<?php

class InvestimentosController extends BaseController {

	/**
	 * Display a listing of investimentos
	 *
	 * @return Response
	 */
	public function Index()
	{
		//$user = Auth::user()->id;
		//$investimentos = Investimento::with('user_id', '=', $user);
		$investimentos = Investimento::all();
		$qtd = count($investimentos);

		return View::make('admin.investimento', compact('investimentos','qtd'));
		
	}

	/**
	 * Show the form for creating a new investimento
	 *
	 * @return Response
	 */
	public function Add()
	{

		//dd( Investimento::$rules);
		$form = new GroupForm();

		if ($form->isPosted())
		{
			$this->beforeFilter('csf', array('on' => 'post'));

			if ($form->isValidForAdd(Investimento::$rules))
			{
				$entrada = new Investimento();

					$entrada->descricao = Input::get("descricao");
					$entrada->valor = Input::get("valor");
					$entrada->user_id = isset(Auth::user()->id)? Auth::user()->id : 1;
					$entrada->categoria_id = Input::get("categoria_id");
					$entrada->save();
				

				return Redirect::route("inv");
			}

			return Redirect::route("inv_add")->withInput([
				"descricao"   => Input::get("descricao"),
				"valor"   => Input::get("valor")
			])->withErrors($form->getErrors());
		}
		
		$categorias = Categoria::where('tipo', '=', '3')->get();
		$dadosCat = array();
		foreach ($categorias as $categoria) {
				$dadosCat[$categoria->id] = $categoria->descricao;
			}

		return View::make("admin.investimentos.create", [
			"form" => $form 
		])->with("categorias", $dadosCat);


	}

	
	/**
	 * Show the form for editing the specified investimento.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function Edit($id)
	{
		$form = new GroupForm();

		$investimento = Investimento::find($id);///->first() first pega o primeiro a ser encontrado pela  consulta
		
		$url = URL::full();
		$data = Input::all();
		

		if ($form->isPosted())
		{
			$this->beforeFilter('csf', array('on' => 'post'));

			if ($form->isValidForAdd(Investimento::$rules))
			{
				$entrada->descricao = Input::get("descricao");
				$entrada->valor = Input::get("valor");
				$entrada->user_id = isset(Auth::user()->id)? Auth::user()->id : 1;
				$entrada->categoria_id = Input::get("categoria_id");
				$entrada->save();

				return Redirect::route("inv");
			}

			return Redirect::to($url)->with(compact('investimento'))->withErrors($form->getErrors());
			
			
		}

		/* 
			* Tratamento da requisição GET para exibir a pagina de edição
			*
		*/
		if(!$investimento) {
			return Redirect::route('inv');
		}
		//metodo with envia para view os objetos com o compact			
		return View::make('admin.investimentos.edit')->with(compact('investimento'));
		
	}

	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function Delete($id)
	{
		Investimento::destroy($id);

		return Redirect::route('inv');
	}

}