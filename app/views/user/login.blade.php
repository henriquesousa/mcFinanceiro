@extends('layouts.user')
@section('content')

	@if ($errors->any())
		<div class="alert alert-danger" role="alert">
		    <ul>
		        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
		    </ul>
		</div>
	@endif

			
	{{ Form::open([
		"route" => "user_logando",
		"autocomplete" => "on",
		"class" => "form-signin"
	]) }}
		<h1 class="form-signin-heading text-muted">Acesso Restrito</h1>
				
		{{ Form::text("email", Input::get("email"), [
		 	"placeholder" => "email@email.com",
		 	"class" => "form-control"
		]) }}

		{{ Form::password("password", [
		 	"placeholder" => "*********",
		 	"class" => "form-control"
		]) }}

		@if($error = $errors->first("password"))
		 	<div class="error">
		 		{{ $error }}
		 	</div>
		@endif
		
		<button class="btn btn-lg btn-primary btn-block" type="submit">
			Entrar
		</button>
	{{ Form::close() }}
@stop