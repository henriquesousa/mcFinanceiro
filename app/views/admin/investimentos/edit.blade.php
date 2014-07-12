@extends('layouts.padrao')

@section('sidebar')
	@parent

		<li class="nav-header">Despesa Editar</li>
		<li>
			{{ HTML::link('admin/desp', 'Listar') }}
		</li>
		<li>
			<a href="{{ URL::route('despesas_criar' )}}">Criar</a>
		</li>


@stop

@section('conteudo')

	@if (isset($errors))
		@foreach($errors->all() as $error)

			{{ Alert::error($error) }}

		@endforeach
	@endif

	{{ Form::open([
		"route" => isset($despesa->id) ? array('despesas_edit', $despesa->id) : '',
		"autocomplete" => "off",
		"class" => "well"
	]) }}


		{{ Form::hidden('id', isset($despesa->id) ? $despesa->id : '') }}

		
			{{ Form::label('Descrição') }}
			{{ Form::text('descricao', isset($despesa->descricao) ? $despesa->descricao : Input::old('descricao'), array('class' => 'form-control input-lg')) }}
			
			{{ $errors->first('descricao') }}
		

			{{ Form::label('Valor') }}
			{{ Form::text('valor', isset($despesa->valor) ? $despesa->valor : Input::old('valor'), array('class' => 'form-control input-lg')) }}
			
			{{ Form::label('Categoria') }}
			{{ Form::select('categoria_id', $categorias->lists('descricao', 'id'), isset($despesa->categoria_id) ? $despesa->categoria_id : Input::old('categoria_id')) }}
		
		

		<input type="submit" id="cadDesp" class="btn btn-primary btn-lg btn-block" value="Cadastrar">
		

	{{ Form::close() }}

@stop