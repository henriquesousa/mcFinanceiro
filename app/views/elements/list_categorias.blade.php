<tr id="{{ $categoria->id }}">
	<td>{{ $categoria->descricao }}</td>
	<td><?php 
		$categoria->tipo;
		 if($categoria->tipo == '1') {
		
			echo 'Entradas';
			}
		if($categoria->tipo == '2') {
		
			echo 'Despesas';
			}
		if($categoria->tipo == '3') {
		
			echo 'Investimentos';
			}
	?>
	</td>
	
	<td>
		@if(Auth::check())
			{{ HTML::linkRoute('categ_edit', 'Editar', array($categoria->id), array('class' => 'btn btn-primary checkout')) }}
			{{ HTML::linkRoute('categ_del', 'Excluir', array($categoria->id), array('class' => 'btn btn-danger checkout')) }}
			
		@else
			{{ HTML::link( '#checkout', 'Nada', array('data-toggle' => 'modal', 'class' => 'btn btn-inverse checkout')) }}
			{{ HTML::link( '#checkout', 'Nada', array('data-toggle' => 'modal', 'class' => 'btn btn-inverse checkout')) }}
		@endif
	</td>
</tr>