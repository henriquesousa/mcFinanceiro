<div class="navbar navbar-fixed-top" role="navigation">
  <div class="navbar-inner">
    <div class="container-fluid">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="brand" href="#">Micro Contabil L4</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li class="active"><a href="#">Home</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Opções <b class="caret"></b></a>
            <ul class="dropdown-menu">
              
              <li>{{ HTML::link('admin/desp', 'Despesas') }}</li>
              <li>{{ HTML::link('admin/ent', 'Entradas') }}</a></li>
              <li>{{ HTML::link('admin/ent', 'Investimentos') }}</a></li>
            </ul>
          </li>
        </ul>
        <div class="pull-right">
          @if(Auth::check())
            <span>Olá, {{ Auth::User()->nome }}.</span>
            {{ HTML::link('logout', 'Sair') }}

          @else
            {{ Form::open(array('url' => 'login', 'class' => 'navbar-form')) }}
            {{ Form::text("email", Input::old('email'), [
                "placeholder" => "email@email.com", 
                'class' => 'span2'
              ]) }}

            {{ Form::input('password', 'password', '', array('class' => 'span2', 'placeholder' => '*****')) }}
            {{ Form::submit('Enviar') }}
            {{ Form::close() }}
          @endif
        </div>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>