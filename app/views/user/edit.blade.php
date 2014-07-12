@extends('layouts.user')

@section('conteudo')

	{{ Form::open([
		"route" => isset($user->id) ? array('user_edit', $user->id) : '',
		"autocomplete" => "off",
		"class" => "well"
	]) }}

		<h2> Usuario - Editar</h2>
			
		@if ($errors->any())
			<div class="alert alert-danger" role="alert">
			    <ul>
			        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
			    </ul>
			</div>
		@endif
		
		<hr>

		{{ Form::hidden('id', isset($user->id) ? $user->id : '') }}

		<br/>
		<input type="submit" id="cadDesp" class="btn btn-primary btn-lg btn-block" value="Editar">
		

	{{ Form::close() }}

@stop