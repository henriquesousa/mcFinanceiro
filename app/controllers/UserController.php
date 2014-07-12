<?php

class UserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$id = Auth::user()->id;
		$id = 2;
		$users = User::find($id);
		//dd($users->nome);
		/*
			Exibe a consulta realizada e o tempo de execução

		$queries = DB::getQueryLog();
		$last_query = end($queries);

		dd($last_query);
		*/
		
		return View::make('user.perfil')->with(compact('users'));

		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function Add()
	{
		$form = new GroupForm();

		if ($form->isPosted())
		{
			$this->beforeFilter('csrf', array('on' => 'post'));

			if ($form->isValidForAdd(User::$rules))
			{
				$entrada = new User();

					$entrada->nome = Input::get("nome");
					$entrada->username = Input::get("username");
					$entrada->password = Hash::make(Input::get('password'));;
					$entrada->email = Input::get("email");
					$entrada->phone = Input::get("phone");
					$entrada->save();
				

				$credentials = [
					"email" => Input::get("email"),
					"password" => Input::get("password")
				];
				if (Auth::attempt($credentials))
				{
					return Redirect::route("user_perfil");
				}
				return Redirect::route("user_login");
				
			}


			return Redirect::route("user_add")->withInput([
				"nome"   => Input::get("nome"),
				"username"   => Input::get("username"),
				"email"   => Input::get("email"),
				"phone"   => Input::get("phone")
			])->withErrors($form->getErrors());
		}
		
		
		return View::make("user.create", [
			"form" => $form 
		]);
	}

	/*
		Edit User
	*/
	public function Edit($id)
	{
		$form = new GroupForm();

		$user = User::findOrFail($id);///->first() first pega o primeiro a ser encontrado pela  consulta
		
		$url = URL::full();
		$data = Input::all();
		

		if ($form->isPosted())
		{
			$this->beforeFilter('csf', array('on' => 'post'));

			if ($form->isValidForAdd(User::$rules))
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

	/* 
		modelo de Cookbook app 
		Adequar as functions
	*/
		/*
	*instancia a clase MensaageBag para verificar se tem erros

	
	* verifica se o form enviou uma reuqisição do tipo POST
	

	* array data armazena os erros e os dados de username para serem inserids na view
	
	* Auth::attempt confirma se os dados inseridos conferem cos os dados do BD
	*/
	

	public function login()
	{
		return View::make("user.login");
 	}

 	public function loginAction()
 	{
 		$form = new GroupForm();

		if ($form->isPosted())
		{
			$this->beforeFilter('csrf', array('on' => 'post'));
			$rules = [
				"email"    => "required|email",
				"password" => "required|alpha_num|min:8"
			];

			if ($form->isValidForAdd($rules))
			{
				$credentials = [
					"email" => Input::get("email"),
					"password" => Input::get("password")
				];
				if (Auth::attempt($credentials))
				{
					return Redirect::route("user_perfil");
				}
				$msg = "Dados incorretos";
				return Redirect::route("user_login")->with($msn)->withErrors($form->getErrors());
				
			}

			return Redirect::route("user_login")->withErrors($form->getErrors());

		}

		return View::make("user.login");
 	}
		


	/*
	| Os dados são repassados para Password::remind(). 
	|Este método aceita um array de credenciais (que normalmente incluem um endereço de e-mail)
	*/
	public function requestAction()
	{
		$data = ["requested" => Input::old("requested")];

		$form = new GroupForm();

		if ($form->isPosted())
		{
			$this->beforeFilter('csf', array('on' => 'post'));
			$rules = ["email" => "required|email"];

			if ($form->isValidForAdd($rules))
			{
				$credentials = [
					"email" => Input::get("email")
				];
				
				Password::remind($credentials, function($message, $user)
				{
					$message->from("blecalt@gmail.com");
				});
				

				return Redirect::route("user_request");
			}

			return Redirect::route("user_request")
					->withErrors($form->getErrors());
		}
		return View::make("user.request", $data);
	}



	public function resetAction()
	{
		$token = "?token=" . Input::get("token");

		//$errors = new MessageBag();

		if ($old = Input::old("errors"))
		{
			$errors = $old;
		}

		$data = [
			"token" => $token,
			"errors" => $errors
		];

		if (Input::server("REQUEST_METHOD") == "POST")
		{
			$validator = Validator::make(Input::all(), [
				"email" => "required|email",
				"password" => "required|min:6",
				"password_confirmation" => "same:password",
				"token" => "exists:token,token"
			]);
			if ($validator->passes())
			{
				$credentials = [
					"email" => Input::get("email")
				];

				Password::reset($credentials, function($user, $password)
				{
					$user->password = Hash::make($password);
					$user->save();

					Auth::login($user);
					return Redirect::route("user_perfil");
				});
			}
		
			$data["email"] = Input::get("email");

			$data["errors"] = $validator->errors();

			return Redirect::to(URL::route("user_perfil") . $token)
			  ->withInput($data);
		}

		return View::make("user.reset", $data);
	}

	public function logoutAction()
	{
		Auth::logout();
		return View::make("index");
	}

}
