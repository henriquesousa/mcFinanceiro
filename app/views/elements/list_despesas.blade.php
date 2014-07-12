<tr id="{{ $despesa->id }}">
	<td>{{ $despesa->descricao }}</td>
	<td>{{ $despesa->valor }}</td>
	<td>{{ isset($despesa->categoria->descricao) ? $despesa->categoria->descricao : '' }}</td>
	
	<td>
		@if(Auth::check())
			{{ HTML::linkRoute('desp_edit', 'Editar', array($despesa->id), array('class' => 'btn btn-primary checkout')) }}
			{{ HTML::linkRoute('desp_del', 'Excluir', array($despesa->id), array('class' => 'btn btn-danger checkout')) }}
			
		@else
			{{ HTML::link( '#checkout', 'Nada', array('data-toggle' => 'modal', 'class' => 'btn btn-inverse checkout')) }}
			{{ HTML::link( '#checkout', 'Nada', array('data-toggle' => 'modal', 'class' => 'btn btn-inverse checkout')) }}
		@endif
	</td>
</tr>