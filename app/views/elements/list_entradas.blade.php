<tr id="{{ $entrada->id }}">
	<td>{{ $entrada->descricao }}</td>
	<td>{{ $entrada->valor }}</td>
	<td>{{ isset($entrada->categoria->descricao) ? $entrada->categoria->descricao : '' }}</td>
	
	<td>
		@if(Auth::check())
			{{ HTML::linkRoute('ent_edit', 'Editar', array($entrada->id), array('class' => 'btn btn-primary checkout')) }}
			{{ HTML::linkRoute('ent_del', 'Excluir', array($entrada->id), array('class' => 'btn btn-danger checkout')) }}
		@else
			{{ HTML::link( '#checkout', 'Nada', array('data-toggle' => 'modal', 'class' => 'btn btn-inverse checkout')) }}
			{{ HTML::link( '#checkout', 'Nada', array('data-toggle' => 'modal', 'class' => 'btn btn-inverse checkout')) }}
		@endif
	</td>
</tr>