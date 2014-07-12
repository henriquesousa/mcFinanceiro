@extends('layouts.padrao')

@section('sidebar')
	@parent
		<li class="nav-header"> Investimentos</li>
		<li>
			{{ HTML::linkRoute('inv', 'Listar') }}
		</li>
		<li>
			{{ HTML::linkRoute('inv_add', 'Criar') }}
		</li>


@stop


@section('conteudo')

<table class="table table-responsive table-striped table-hover">
	<tr>
		<th>Descrição</th>
		<th>Valor</th>
		<th>Categoria</th>
		<th>Ações</th>
	</tr>

	@foreach($investimentos as $investimento)

		@include('elements.list_investimentos')
	
	@endforeach

</table>
	{{ '<span class="badge pull-right">Registros '.$qtd.'</span>' }}
@stop