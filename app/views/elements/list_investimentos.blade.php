<tr id="{{ $investimento->id }}">
	<td>{{ $investimento->descricao }}</td>
	<td>{{ $investimento->valor }}</td>
	<td>{{ isset($investimento->categoria->descricao) ? $investimento->categoria->descricao : '' }}</td>
	
	<td>
		@if(Auth::check())
			{{ HTML::linkRoute('inv_edit', 'Editar', array($investimento->id), array('class' => 'btn btn-primary checkout')) }}
			{{ HTML::linkRoute('inv_del', 'Excluir', array($investimento->id), [ 
				"class"			=>	"btn btn-danger checkout", 
				"data-confirm"  =>	"Você realmente deseja excluir este item?"
				]) }}
			
		@else
			{{ HTML::link( '#checkout', 'Nada', array('data-toggle' => 'modal', 'class' => 'btn btn-inverse checkout')) }}
			{{ HTML::link( '#checkout', 'Nada', array('data-toggle' => 'modal', 'class' => 'btn btn-inverse checkout')) }}
		@endif
	</td>
</tr>