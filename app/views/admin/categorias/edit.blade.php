@extends('layouts.padrao')

@section('sidebar')
	@parent

		<li class="nav-header">Categorias Editar</li>
		<li>
			{{ HTML::linkRoute('categ_list', 'Listar') }}
		</li>
		<li>
			{{ HTML::linkRoute('categ_add', 'Criar') }}
		</li>


@stop

@section('conteudo')

	

	{{ Form::open([
		"route" => isset($categoria->id) ? array('categ_edit', $categoria->id) : '',
		"autocomplete" => "off",
		"class" => "well"
	]) }}

		<h2> Categorias - Editar</h2>
			
		@if ($errors->any())
			<div class="alert alert-danger" role="alert">
			    <ul>
			        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
			    </ul>
			</div>
		@endif
		
		<hr>

		{{ Form::hidden('id', isset($categoria->id) ? $categoria->id : '') }}

		
			{{ Form::label('Descrição') }}
			{{ Form::text('descricao', isset($categoria->descricao) ? $categoria->descricao : Input::old('descricao'), array('class' => 'form-control input-lg')) }}
			
			{{ Form::label('Tipo') }}
			{{ Form::text('tipo', isset($categoria->tipo) ? $categoria->tipo : Input::old('tipo'), array('class' => 'form-control input-lg')) }}

			
			<br/>
		<input type="submit" id="cadDesp" class="btn btn-primary btn-lg btn-block" value="Editar">
		

	{{ Form::close() }}

@stop