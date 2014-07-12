<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>M-Control - Administração</title>
  
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" />
     
  
</head>
<body>


<nav class="navbar navbar-inverse container" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <p class="navbar-brand">Mini Controle Financeiro <strong> - Usuário</strong></p>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    
      <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuário <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li align="center" class="well">
                <div><img class="img-responsive" style="padding:2%;" src="http://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/twDq00QDud4/s120-c/photo.jpg"/><a class="change" href="">Change Picture</a></div>
                <a href="#" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-lock"></span> Security</a>
                
                <a href="{{ URL::route("user_logout") }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
            </li>
           </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>











<div class="container">
  <div class="row well">
    <div class="col-md-2">
          <ul class="nav nav-pills nav-stacked well">
              <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
              <li  class="active"><a href="#"><i class="fa fa-user"></i> Perfil</a></li>
              
              <li><a href="#"><i class="fa fa-envelope"></i> Profile</a></li>
              <li><a href="#"><i class="fa fa-key"></i> Security</a></li>
              <li><a href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
        </div>
        <div class="col-md-10">
                <div class="panel">
                    <img class="pic img-circle" src="http://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/twDq00QDud4/s120-c/photo.jpg" alt="...">
                    <div class="name"><small>{{ $users->nome }}</small></div>
                    <a href="#" class="btn btn-xs btn-primary pull-right" style="margin:10px;"><span class="glyphicon glyphicon-picture"></span> Change cover</a>
                </div>
                
    <br><br><br>
    <ul class="nav nav-tabs" id="myTab">
      <li class="active"><a href="#inbox" data-toggle="tab"><i class="glyphicon glyphicon-user"></i> PESSOAL:</a></li>
      <li><a href="#sent" data-toggle="tab"><i class="glyphicon glyphicon-map-marker"></i> LOCAL:</a></li>
      <li><a href="#assignment" data-toggle="tab"><i class="glyphicon glyphicon-briefcase"></i> TRABALHO:</a></li>
      <li><a href="#event" data-toggle="tab"><i class="glyphicon glyphicon-book"></i> EDUCAÇÃO:</a></li>
    </ul>
    
    <div class="tab-content">
      <div class="tab-pane active" id="inbox">
        <a type="button" data-toggle="collapse" data-target="#a1">
            <div class="btn-toolbar well well-sm" role="toolbar"  style="margin:0px;">
              
              <div class="col-md-3">
              
                <p><i class="glyphicon glyphicon-user"></i> {{ $users->username }}</p>
                <p><i class="glyphicon glyphicon-envelope"></i> {{ $users->email }}</p>
                <p><i class="glyphicon glyphicon-phone"></i> {{ $users->phone }}</p>
               

              </div>
              <div class="btn-group col-md-8">
                <b></b> 
                <div class="pull-right">
                  <i class="glyphicon glyphicon-time"></i> {{ $users->created_at }}
                </div> 
              </div>
            </div>
        </a>
        <div id="a1" class="collapse out well"></div>
        <br>
        
      </div>
     
       
      <div class="tab-pane" id="sent">
            <a type="button" data-toggle="collapse" >
            <div class="btn-toolbar well well-sm" role="toolbar"  style="margin:0px;">
              <div class="btn-group col-md-8">
                @if(null !== $users->localizacao()->get())
                @foreach($users->localizacao()->get() as $local)
                  <p>
                    <i class="glyphicon glyphicon-map-marker"></i>
                    {{ $local->rua }}, {{ $local->bairro }}, {{ $local->cidade }} - {{ $local->uf }}
                  </p>
                @endforeach
                @endif
                
              </div>
              <div class="btn-group col-md-3"> 
                  <div class="pull-right"></div> 
              </div>
            </div>
        </a><br/>
      </div>
      
      
     <div class="tab-pane" id="assignment">
        <a type="button" data-toggle="collapse">
          <div class="well well-sm" style="margin:0px;">
            @if(null !== $users->trabalho()) 

            @foreach($users->trabalho()->get() as $trab)
              <p><i class="glyphicon glyphicon-check"></i> {{ $trab->cargo }}</p>
              <p><i class="glyphicon glyphicon-check"></i> {{ $trab->empresa }}</p>
            @endforeach
            @endif
            <span class="pull-right"></span>
          </div>
        </a>        
     </div>
     
     <div class="tab-pane" id="event">
        <div class="media">
          <a class="pull-left" href="#">
            <img class="media-object img-thumbnail" width="100" src="http://cfi-sinergia.epfl.ch/files/content/sites/cfi-sinergia/files/WORKSHOPS/Workshop1.jpg" alt="...">
          </a>
          <div class="media-body">
          @if(null !== $users->educacao()->get())
            @foreach($users->educacao()->get() as $ed) 
              <h4 class="media-heading">Curso -> {{ $ed->curso }}</h4>
              <p>Formação -> {{ $ed->formacao }}</p>
              <p>Instituição -> {{ $ed->instituicao }}</p>
              <hr>
            @endforeach
            @endif
          </div>
        </div>
      
    </div>

    
    <button class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-share-square-o"> Edit</i></button>
    
        
    </div>

     </div>
  </div>
    
    
</div>




<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"><br/><br/>

      @include('user.form_edit')
            

    </div>
  </div>
</div>

</body>
</html>
    <script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="javascript">
   $(function () {
    $('#myTab a:last').tab('show')
  })
</script>