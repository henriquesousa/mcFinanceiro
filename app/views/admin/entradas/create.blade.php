@extends('layouts.padrao')

@section('sidebar')
	@parent

		<li class="nav-header">Entrada Criar</li>
		<li>
			{{ HTML::linkRoute('ent', 'Listar') }}
		</li>
		<li>
			{{ HTML::linkRoute('ent_add', 'Criar') }}
		</li>


@stop

@section('conteudo')

	{{ Form::open([
		"route" => "ent_add",
		"autocomplete" => "off",
		"class" => "well"
	]) }}


		{{ Form::hidden('id', isset($entrada->id) ? $entrada->id : '') }}

		
			{{ Form::label('Descrição') }}
			{{ Form::text('descricao', isset($entrada->descricao) ? $entrada->descricao : Input::old('descricao'), array('class' => 'form-control input-lg')) }}
			@if($errors->first("descricao") != '')
				<div class="error">
					Favor informar o <strong>dscrição</strong>
				</div>
			@endif
		

			{{ Form::label('Valor') }}
			{{ Form::text('valor', isset($entrada->valor) ? $entrada->valor : Input::old('valor'), array('class' => 'form-control input-lg')) }}
			@if($errors->first("valor") != '')
				<div class="error">
					Favor informar o <strong>valor</strong>
				</div>
			@endif

			{{ Form::label('Categoria') }}
			{{ HTML::linkRoute('categ_add', '+ Categoria', 1, array('class' => 'btn btn-info btn-block')) }}
			{{ Form::select('categoria_id', [$categorias], '', ['class' => 'form-control input-lg']) }}

		
			<br/>
		
		

		<input type="submit" id="cadDesp" class="btn btn-primary btn-lg btn-block" value="Cadastrar">
		

	{{ Form::close() }}

@stop