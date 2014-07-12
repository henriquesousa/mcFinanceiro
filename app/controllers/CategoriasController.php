<?php

class CategoriasController extends BaseController {

	/**
	 * Display a listing of categorias
	 *
	 * @return Response
	 */
	public function Index()
	{
		$categorias = Categoria::all();
		$qtd = count($categorias);

		return View::make('admin.categoria', compact('categorias','qtd'));
		
	}

	/**
	 * Show the form for creating a new categoria
	 *
	 * @return Response
	 */
	public function Add($id)
	{

		//dd( Categoria::$rules);
		$form = new GroupForm();

		if ($form->isPosted())
		{
			$this->beforeFilter('csf', array('on' => 'post'));

			if ($form->isValidForAdd(Categoria::$rules))
			{
				$entrada = new Categoria();

					$entrada->descricao = Input::get("descricao");
					$entrada->tipo = Input::get("tipo");
					$entrada->user_id = isset(Auth::user()->id)? Auth::user()->id : 1;
					$entrada->save();
				

				return Redirect::route("categ_list");
			}

			return Redirect::route("categ_add")->withInput([
				"descricao"   => Input::get("descricao"),
				"tipo"   => Input::get("tipo")
			])->withErrors($form->getErrors());
		}
		$categorias = Categoria::all();
		$cat = $categorias;
		$dadosCat = array();
		foreach ($categorias as $categoria) {
			
			$dadosCat[$categoria->id] = $categoria->descricao;
		}

		
		return View::make("admin.categorias.create", [
			"tipo" => $id,
			"form" => $form 
		], compact('cat'))->with("categorias", $dadosCat);
		
	}

	
	/**
	 * Show the form for editing the specified categoria.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function Edit($id)
	{
		$form = new GroupForm();

		$categoria = Categoria::find($id);///->first() first pega o primeiro a ser encontrado pela  consulta
		
		$url = URL::full();
		$data = Input::all();
		

		if ($form->isPosted())
		{
			$this->beforeFilter('csf', array('on' => 'post'));

			if ($form->isValidForAdd(Categoria::$rules))
			{
				$categoria->descricao = Input::get("descricao");
				$categoria->tipo = Input::get("tipo");
				$categoria->save();

				return Redirect::route("categ_list");
			}

			return Redirect::to($url)->with(compact('categoria'))->withErrors($form->getErrors());
			
			
		}

		/* 
			* Tratamento da requisição GET para exibir a pagina de edição
			*
		*/
		if(!$categoria) {
			return Redirect::route('categ_edit');
		}
		//metodo with envia para view os objetos com o compact			
		return View::make('admin.categorias.edit')->with(compact('categoria'));
		
	}

	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function Delete($id)
	{
		Categoria::destroy($id);

		return Redirect::route('categ_list');
	}

}