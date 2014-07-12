@extends("layout.user")
@section("content")
	{{ Form::open([
		"url" => URL::route("user_reset") . $token,
		"autocomplete" => "off"
	]) }}

	@if ($error = $errors->first("token"))
		<div class="error">
			{{ $error }}
		</div>
	@endif

	{{ Form::label("email", "E-mail") }}
	{{ Form::text("email", Input::get("email"), [
		"placeholder" => "john@example.com"
	]) }}

	@if ($error = $errors->first("email"))
		<div class="error">
			{{ $error }}
		</div>
	@endif

	{{ Form::label("password", "Password") }}
	{{ Form::password("password", [
		"placeholder" => "••••••••••"
	]) }}

	@if ($error = $errors->first("password"))
		<div class="error">
			{{ $error }}
		</div>
	@endif

	{{ Form::label("password_confirmation", "Confirm") }}
	{{ Form::password("password_confirmation", [
		"placeholder" => "••••••••••"
	]) }}
	
	@if ($error = $errors->first("password_confirmation"))
		<div class="error">
			{{ $error }}
		</div>
	@endif

	{{ Form::submit("Salvar") }}
{{ Form::close() }}

@stop