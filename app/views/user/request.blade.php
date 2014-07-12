@extends("layouts.user")
@section("content")

	@if ($errors->any())
			<div class="alert alert-danger" role="alert">
			    <ul>
			        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
			    </ul>
			</div>
		@endif

	{{ Form::open([
		"route" => "user_request",
		"autocomplete" => "off",
		"class" => "form-signin"
	]) }}
		
		<h1 class="form-signin-heading text-muted">Recuperar Senha</h1>

		<p>Insira o e-mail informado no cadastro</p>
		{{ Form::text("email", Input::get("email"), [
			"placeholder" => "john@example.com",
			"class" => "form-control"
		]) }}
		
		{{ Form::submit('Submit', array('class'=>'btn btn-lg btn-primary btn-block')) }}
	{{ Form::close() }}
@stop