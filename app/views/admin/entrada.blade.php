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
	<h1>Listar Entradas</h1>

	<table class="table table-responsive table-striped table-hover">
		<tr>

			<th>Descrição</th>
			<th>Valor</tdh>
			<th>Categoria</th>
			<th>Ações</th>
		</tr>

		@foreach($entradas as $entrada)

			@include('elements.list_entradas')
		
		@endforeach

	</table>
	{{ '<span class="badge pull-right">Registros '.$qtd.'</span>' .$entradas->links()  }}
@stop