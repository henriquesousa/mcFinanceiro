@extends('layouts.padrao')

@section('sidebar')
	@parent

		<li class="nav-header">Despesa Editar</li>
		<li>
			{{ HTML::linkRoute('desp', 'Listar') }}
		</li>
		<li>
			{{ HTML::linkRoute('desp_add', 'Criar') }}
		</li>


@stop

@section('conteudo')

	

	{{ Form::open([
		"route" => isset($despesa->id) ? array('desp_edit', $despesa->id) : '',
		"autocomplete" => "off",
		"class" => "well"
	]) }}


		{{ Form::hidden('id', isset($despesa->id) ? $despesa->id : '') }}

		
			{{ Form::label('Descrição') }}
			{{ Form::text('descricao', isset($despesa->descricao) ? $despesa->descricao : Input::old('descricao'), array('class' => 'form-control')) }}
			
			{{ $errors->first('descricao') }}
		

			{{ Form::label('Valor') }}
			{{ Form::text('valor', isset($despesa->valor) ? $despesa->valor : Input::old('valor'), array('class' => 'form-control')) }}
			
			{{ Form::label('Categoria') }}
			{{ Form::select('categoria_id', [$categorias->lists('descricao', 'id'), isset($despesa->categoria_id) ? $despesa->categoria_id : Input::old('categoria_id')], null, ['class' => 'form-control']) }}

			{{ Form::label('Data') }}
			{{ Form::text('created_at', isset($despesa->created_at) ? $despesa->created_at : Input::old('created_at'), array('class' => 'form-control')) }}
			<br/>
		
		

		<input type="submit" id="cadDesp" class="btn btn-primary btn-lg btn-block" value="Confirmar">
		

	{{ Form::close() }}

@stop