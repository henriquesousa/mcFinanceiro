@extends('layouts.padrao')

@section('sidebar')
	@parent

		<li class="nav-header">Despesa Criar</li>
		<li>
			{{ HTML::linkRoute('desp', 'Listar') }}
		</li>
		<li>
			{{ HTML::linkRoute('desp_add', 'Criar') }}
		</li>


@stop

@section('conteudo')

	{{ Form::open([
		"route" => "desp_add",
		"autocomplete" => "on",
		"class" => "well"
	]) }}


		{{ Form::hidden('id', isset($despesa->id) ? $despesa->id : '') }}

		
			{{ Form::label('Descrição') }}
			{{ Form::text('descricao', isset($despesa->descricao) ? $despesa->descricao : Input::old('descricao'), array('class' => 'form-control')) }}
			@if($errors->first("descricao") != '')
				<div class="error">
					Favor informar o <strong>dscrição</strong>
				</div>
			@endif
		

			{{ Form::label('Valor') }}
			{{ Form::text('valor', isset($despesa->valor) ? $despesa->valor : Input::old('valor'), array('class' => 'form-control')) }}
			@if($errors->first("valor") != '')
				<div class="error">
					Favor informar o <strong>valor</strong>
				</div>
			@endif

			{{ Form::label('Categoria') }}
			{{ HTML::linkRoute('categ_add', '+ Categoria', 2, array('class' => 'btn btn-info btn-block')) }}
			{{ Form::select('categoria_id', [$categorias], '', ['class' => 'form-control input-lg']) }}
			
			{{ Form::label('Data') }}
			{{ Form::text('created_at', isset($despesa->created_at) ? $despesa->created_at : Input::old('created_at'), array('class' => 'form-control')) }}
			@if($errors->first("created_at") != '')
				<div class="error">
					Favor informar a <strong>data</strong>
				</div>
			@endif
			<br/>

		<input type="submit" id="cadDesp" class="btn btn-primary btn-lg btn-block" value="Cadastrar">
		

	{{ Form::close() }}

@stop