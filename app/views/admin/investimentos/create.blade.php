@extends('layouts.padrao')

@section('sidebar')
	@parent

		<li class="nav-header">Investimento Criar</li>
		<li>
			{{ HTML::linkRoute('inv', 'Listar') }}
		</li>
		<li>
			{{ HTML::linkRoute('inv_add', 'Criar') }}
		</li>


@stop

@section('conteudo')

	{{ Form::open([
		"route" => "inv_add",
		"autocomplete" => "off",
		"class" => "well"
	]) }}


		{{ Form::hidden('id', isset($investimento->id) ? $investimento->id : '') }}

		
			{{ Form::label('Descrição') }}
			{{ Form::text('descricao', isset($investimento->descricao) ? $investimento->descricao : Input::old('descricao'), array('class' => 'form-control input-sm')) }}
			@if($errors->first("descricao") != '')
				<div class="error">
					Favor informar o <strong>dscrição</strong>
				</div>
			@endif
		

			{{ Form::label('Valor') }}
			{{ Form::text('valor', isset($investimento->valor) ? $investimento->valor : Input::old('valor'), array('class' => 'form-control input-sm')) }}
			@if($errors->first("valor") != '')
				<div class="error">
					Favor informar o <strong>valor</strong>
				</div>
			@endif

			{{ Form::label('Categoria') }}
			{{ HTML::linkRoute('categ_add', '+ Categoria', 3, array('class' => 'btn btn-info btn-block')) }}
			{{ Form::select('categoria_id', [$categorias], '', ['class' => 'form-control input-sm']) }}
		
			<br/>

		<input type="submit" id="cadDesp" class="btn btn-primary btn-lg btn-block" value="Cadastrar">
		

	{{ Form::close() }}

@stop