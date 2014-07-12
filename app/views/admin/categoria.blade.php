@extends('layouts.padrao')

@section('sidebar')
	@parent
		<li class="nav-header"> Categorias</li>
		<li>
			{{ HTML::linkRoute('categ_list', 'Listar') }}
		</li>
		<li>
			{{ HTML::linkRoute('categ_add', 'Criar') }}
		</li>


@stop


@section('conteudo')

<table class="table table-responsive table-striped table-hover">
	<tr>
		<th>Descrição</th>
		<th>Tipo</th>
		<th>Acoes</th>
	</tr>

	@foreach($categorias as $categoria)

		@include('elements.list_categorias')
	
	@endforeach

</table>
	{{ '<span class="badge pull-right">Registros '.$qtd.'</span>'   }}
@stop