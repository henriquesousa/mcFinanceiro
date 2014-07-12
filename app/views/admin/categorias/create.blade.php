@extends('layouts.padrao')

@section('sidebar')
	@parent

		<li class="nav-header">Categorias - Criar</li>
		<li>
			{{ HTML::linkRoute('categ_list', 'Listar') }}
		</li>
		<li>
			{{ HTML::linkRoute('categ_add', 'Criar') }}
		</li>


@stop

@section('conteudo')

	{{ Form::open([
		"route" => "categ_add",
		"autocomplete" => "off",
		"class" => "well"
	]) }}


		{{ Form::hidden('id', isset($categoria->id) ? $categoria->id : '') }}

		

		
			{{ Form::label('Descrição') }}
			{{ Form::text('descricao', isset($categoria->descricao) ? $categoria->descricao : Input::old('descricao'), array('class' => 'form-control')) }}
			@if($errors->first("descricao") != '')
				<div class="error">
					Favor informar o <strong>descrição</strong>
				</div>
			@endif
		
			
			@if($tipo < 1)	
				{{ Form::label('Tipo') }}
				{{ Form::text('tipo', isset($categoria->tipo) ? $categoria->tipo : Input::old('tipo'), array('class' => 'form-control')) }}
				@if($errors->first("tipo") != '')
					<div class="error">
						Favor informar o <strong>tipo</strong>
					</div>
				@endif
			@else 
				{{ Form::hidden('tipo', $tipo) }}
			@endif
			
			<!--
			<select name="tipo">

				@foreach($cat as $cate)					
				
					@if($cate->tipo == '1')
					<optgroup label="Entradas">
						<option value="{{ $cate->id }}">{{ $cate->descricao }}</option>
					</optgroup>
					
					@elseif($cate->tipo == '2')
					<optgroup label="Despesas">
						<option value="{{ $cate->id }}">{{ $cate->descricao }}</option>
					</optgroup>
					
					@elseif($cate->tipo == '3')
					<optgroup label="Investimentos">
						<option value="{{ $cate->id }}">{{ $cate->descricao }}</option>
					</optgroup>
					@endif				
				@endforeach
				
			</select>
			-->
			<br/>

		<input type="submit" id="cadDesp" class="btn btn-primary btn-lg btn-block" value="Cadastrar">
		

	{{ Form::close() }}

@stop