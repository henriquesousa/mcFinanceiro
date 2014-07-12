@extends('layouts.user')

@section('content')

	<div class="row-fluid marketing">
		<div class="span6">
			@if ( count($errors) > 0)
				Erros encontrados:<br/>
				<ul>
					<li>
					@foreach ($errors->all() as $e)
						{{ $e }}
					@endforeach
					</li>
				</ul>
			@endif


			{{ Form::open([
				"route" => "user_add",
				"autocomplete" => "off",
				"class" => "well"
			]) }}
				
					{{ Form::label('nome') }}
					{{ Form::text('nome', isset($user->nome) ? $user->nome : Input::old('nome'), array('class' => 'form-control')) }}
					@if($errors->first("nome") != '')
						<div class="error">
							Favor informar o <strong>nome</strong>
						</div>
					@endif
				
					{{ Form::label('username') }}
					{{ Form::text('username', isset($user->username) ? $user->username : Input::old('username'), array('class' => 'form-control')) }}
					@if($errors->first("username") != '')
						<div class="error">
							Favor informar o <strong>username</strong>
						</div>
					@endif

					{{ Form::label('password') }}
					{{ Form::password('password', array('class' => 'form-control')) }}
					@if($errors->first("password") != '')
						<div class="error">
							Favor informar a <strong>Senha</strong>
						</div>
					@endif

					{{ Form::label('confirm') }}
					{{ Form::password('password',['name'=>'confirm', 'class' => 'form-control']) }}
					@if($errors->first("confirm") != '')
						<div class="error">
							Favor informar o mesmo valor do campo <strong>Senha</strong>
						</div>
					@endif

					{{ Form::label('email') }}
					{{ Form::text('email', isset($user->email) ? $user->email : Input::old('email'), array('class' => 'form-control')) }}
					@if($errors->first("email") != '')
						<div class="error">
							Favor informar a <strong>e-mail</strong>
						</div>
					@endif

					{{ Form::label('phone') }}
					{{ Form::text('phone', isset($user->phone) ? $user->phone : Input::old('phone'), array('class' => 'form-control')) }}
					@if($errors->first("phone") != '')
						<div class="error">
							Favor informar o <strong>telefone</strong>
						</div>
					@endif
					
					<br/>

				<input type="submit" id="cadDesp" class="btn btn-primary btn-lg btn-block" value="Cadastrar">
				

			{{ Form::close() }}
		</div>
	</div>
@stop