@extends('layouts.padrao')

@section('sidebar')
	@parent

		<li class="nav-header">Entradas Editar</li>
		<li>
			{{ HTML::linkRoute('entradas', 'Listar') }}
		</li>
		<li>
			{{ HTML::linkRoute('entradas_add', 'Criar') }}
		</li>


@stop

@section('conteudo')

	@if (isset($errors))
		@foreach($errors->all() as $error)

			{{ Alert::error($error) }}

		@endforeach
	@endif

	{{ Form::open([
		"route" => isset($entrada->id) ? array('entradas_edit', $entrada->id) : '',
		"autocomplete" => "off",
		"class" => "well"
	]) }}

		<h2>Editar Entradas</h2>

		{{ Form::hidden('id', isset($entrada->id) ? $entrada->id : '') }}

		
			{{ Form::label('Descrição') }}
			{{ Form::text('descricao', isset($entrada->descricao) ? $entrada->descricao : Input::old('descricao'), array('class' => 'form-control input-lg')) }}
			
			{{ $errors->first('descricao') }}
		

			{{ Form::label('Valor') }}
			{{ Form::text('valor', isset($entrada->valor) ? $entrada->valor : Input::old('valor'), array('class' => 'form-control input-lg')) }}
			
			{{ Form::label('Categoria') }} 

			<span class="glyphicon glyphicon-plus"></span>{{ HTML::linkRoute('categ_add', 'Categoria') }}
			
			{{ Form::select('categoria_id', [$categorias->lists('descricao', 'id'), isset($entrada->categoria_id) ? $entrada->categoria_id : Input::old('categoria_id')],null, ['class' => 'form-control'] ) }}

			<br/>

			
		
		

		<input type="submit" id="cadDesp" class="btn btn-primary btn-lg btn-block" value="Cadastrar">
		

	{{ Form::close() }}

@stop