<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Painel Administrativo</title>
	
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-responsive.css') }}" />
    <style>
        html, body { 
    	   	min-height: 100%;
        }
        body { padding-top: 60px; }
        table form { margin-bottom: 0; }
        .table td { text-align: center; }
        form ul { margin-left: 0; list-style: none; }
        .error { color: red; font-style: italic; }	            			
    </style>
	
</head>
<body>

	@include('elements.header')

	<div class="container">

		<div class="row-fluid">
			<div class="message">

				

	        </div>
		</div>
		
		<div class="row-fluid">

			<div class="span3">
				@section('sidebar')
					<div class="well sidebar-nav">
			            <ul class="nav nav-list">
			            	<li class="nav-header">Gerência M-C</li>
			            	<li>
			            		{{ HTML::linkRoute('dashboard', 'Painel Admin.', array(), array('class' => '')) }}
			            	</li>
			            	<li>
			            		{{ HTML::linkRoute('perfil_user', 'Perfil Usuário', array(), array('class' => '')) }}
			            	</li>

			            	@show

			            </ul>
			        </div>
		        
	        </div>

	        <div class="span8">
	        	<div class="row-fluid">
	        		@yield('conteudo')
	        	</div>
	        </div>

	    </div>

	</div>

	
	<script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

	

</body>
</html>