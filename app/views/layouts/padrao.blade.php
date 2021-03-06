<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mini Controle Financeiro</title>
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.responsive.min.css') }}" />
    <style>
        html, body { 
    	   	min-height: 100%;
        }
        body { padding-top: 60px; }
        table form { margin-bottom: 0; }
        .table td { text-align: center; }
        form ul { margin-left: 0; list-style: none; }
        .error { color: red; font-style: italic; }	




        @import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);
body {
  font-family: 'Open Sans', 'sans-serif';
  background:#f0f0f0;
}
.navbar-nav>li>.dropdown-menu {
    margin-top:20px;
    border-top-left-radius:4px;
    border-top-right-radius:4px;
}
.navbar-default .navbar-nav>li>a {
    width:200px;
    font-weight:bold;
}
.mega-dropdown {
  position: static !important;
  width:100%;
}
.mega-dropdown-menu {
    padding: 20px 0px;
    width: 100%;
    box-shadow: none;
    -webkit-box-shadow: none;
}
.mega-dropdown-menu:before {
    content: "";
    border-bottom: 15px solid #fff;
    border-right: 17px solid transparent;
    border-left: 17px solid transparent;
    position: absolute;
    top: -15px;
    left: 285px;
    z-index: 10;
}
.mega-dropdown-menu:after {
    content: "";
    border-bottom: 17px solid #ccc;
    border-right: 19px solid transparent;
    border-left: 19px solid transparent;
    position: absolute;
    top: -17px;
    left: 283px;
    z-index: 8;
}
.mega-dropdown-menu > li > ul {
  padding: 0;
  margin: 0;
}
.mega-dropdown-menu > li > ul > li {
  list-style: none;
}
.mega-dropdown-menu > li > ul > li > a {
  display: block;
  padding: 3px 20px;
  clear: both;
  font-weight: normal;
  line-height: 1.428571429;
  color: #999;
  white-space: normal;
}
.mega-dropdown-menu > li ul > li > a:hover,
.mega-dropdown-menu > li ul > li > a:focus {
  text-decoration: none;
  color: #444;
  background-color: #f5f5f5;
}
.mega-dropdown-menu .dropdown-header {
  color: #428bca;
  font-size: 18px;
  font-weight:bold;
}
.mega-dropdown-menu form {
    margin:3px 20px;
}
.mega-dropdown-menu .form-group {
    margin-bottom: 3px;
}            			
    </style>
</head>

<body>

	

	<div class="container">
<nav class="navbar navbar-default">
    <div class="navbar-header">
		<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">Meini Controle F.</a>
	</div>
	
	
	<div class="collapse navbar-collapse js-navbar-collapse">
		<ul class="nav navbar-nav">
			<li class="dropdown mega-dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu - Acoes <span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
				
				<ul class="dropdown-menu mega-dropdown-menu row">
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">New in Stores</li>                            
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner">
                                <div class="item active">
                                    <a href="#"><img src="http://placehold.it/254x150/3498db/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 1"></a>
                                    <h4><small>Summer dress floral prints</small></h4>                                        
                                    <button class="btn btn-primary" type="button">49,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>       
                                </div><!-- End Item -->
                                <div class="item">
                                    <a href="#"><img src="http://placehold.it/254x150/ef5e55/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 2"></a>
                                    <h4><small>Gold sandals with shiny touch</small></h4>                                        
                                    <button class="btn btn-primary" type="button">9,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>        
                                </div><!-- End Item -->
                                <div class="item">
                                    <a href="#"><img src="http://placehold.it/254x150/2ecc71/f5f5f5/&text=New+Collection" class="img-responsive" alt="product 3"></a>
                                    <h4><small>Denin jacket stamped</small></h4>                                        
                                    <button class="btn btn-primary" type="button">49,99 €</button> <button href="#" class="btn btn-default" type="button"><span class="glyphicon glyphicon-heart"></span> Add to Wishlist</button>      
                                </div><!-- End Item -->                                
                              </div><!-- End Carousel Inner -->
                            </div><!-- /.carousel -->
                            <li class="divider"></li>
                            <li><a href="#">View all Collection <span class="glyphicon glyphicon-chevron-right pull-right"></span></a></li>
						</ul>
					</li>
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">Despesas</li>
							<li>
								{{ HTML::linkRoute('desp', 'Listar') }}
							</li>
							<li>
								{{ HTML::linkRoute('desp_add', 'Criar') }}
							</li>
							
							<li class="divider"></li>
							<li class="dropdown-header">Administracao</li>
							<li>
			            		{{ HTML::linkRoute('dashboard', 'Painel Admin.', array(), array('class' => '')) }}
			            	</li>
						</ul>
					</li>
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">Entradas</li>
							<li>
								{{ HTML::linkRoute('ent', 'Listar') }}
							</li>
							<li>
								{{ HTML::linkRoute('ent_add', 'Criar') }}
							</li>
							<li class="divider"></li>
							<li class="dropdown-header">Perfil</li>
							<li>
			            		{{ HTML::linkRoute('user_perfil', 'Perfil Usuário', array(), array('class' => '')) }}
			            	</li>
						</ul>
					</li>
					<li class="col-sm-3">
						<ul>
							<li class="dropdown-header">Investimentos</li>
							<li>
								{{ HTML::linkRoute('inv', 'Listar') }}
							</li>
							<li>
								{{ HTML::linkRoute('inv_add', 'Criar') }}
							</li>							
							<li class="divider"></li>
                            <li class="dropdown-header">Newsletter</li>
                            <form class="form" role="form">
                              <div class="form-group">
                                <label class="sr-only" for="email">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email">                                                              
                              </div>
                              <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                            </form>                                                       
						</ul>
					</li>
				</ul>
				
			</li>
		</ul>
		
	</div><!-- /.nav-collapse -->
</nav>
</div>








	<div class="container">

		<div class="row-fluid">
			<div class="message">

				

	        </div>
		</div>
		
		<div class="row-fluid">

			<div class="span3">
				
					<div class="well sidebar-nav">
			            <ul class="nav nav-list">
			            	
			            	@section('sidebar')

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