@extends('layouts.padrao')

@section('sidebar')
	@parent
		<li class="nav-header"> Despesas</li>
		<li>
			{{ HTML::linkRoute('desp', 'Listar') }}
		</li>
		<li>
			{{ HTML::linkRoute('desp_add', 'Criar') }}
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

	@foreach($despesas as $despesa)

		@include('elements.list_despesas')
	
	@endforeach

</table>
	{{ '<span class="badge pull-right">Registros '.$qtd.'</span>' .$despesas->links()  }}
@stop