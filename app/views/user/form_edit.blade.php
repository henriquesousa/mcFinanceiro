{{ Form::open([
		//"route" => isset(Auth::user()->id) ? array('user_edit', Auth::user()->id) : '',
		"route" => array('user_edit', 1),
		"autocomplete" => "on",
		"class" => "form-horizontal"
	]) }}

		 <fieldset>

		{{ Form::hidden('id', isset(Auth::user()->id) ? Auth::user()->id : '') }}

					
		<!-- Text input-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="body">Nome :</label>  
              <div class="col-md-8">
              	{{ Form::text('descricao', isset( Auth::user()->nome ) ? Auth::user()->nome : Input::old('nome'), array('class' => 'form-control input-md')) }}
				
				{{ $errors->first('descricao') }}
                
              </div>
            </div>

        <!-- Text input-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="email">E-mail :</label>  
              <div class="col-md-8">
              	{{ Form::text('email', isset(Auth::user()->email) ? Auth::user()->email : Input::old('email'), array('class' => 'form-control input-md')) }}
				
				{{ $errors->first('email') }}
                
              </div>
            </div>

        <!-- Text input-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="body">Telefone :</label>  
              <div class="col-md-8">
              	{{ Form::text('telefone', isset(Auth::user()->phone) ? Auth::user()->phone : Input::old('phone'), array('class' => 'form-control input-md')) }}
				
				{{ $errors->first('telefone') }}
                
              </div>
            </div>

        <!-- Text input-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="body">Nome :</label>  
              <div class="col-md-8">
              	{{ Form::text('descricao', isset($despesa->descricao) ? $despesa->descricao : Input::old('descricao'), array('class' => 'form-control input-md')) }}
				
				{{ $errors->first('descricao') }}
                
              </div>
            </div>

        <!-- Text input-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="body">Nome :</label>  
              <div class="col-md-8">
              	{{ Form::text('descricao', isset($despesa->descricao) ? $despesa->descricao : Input::old('descricao'), array('class' => 'form-control input-md')) }}
				
				{{ $errors->first('descricao') }}
                
              </div>
            </div>
            
            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-2 control-label" for="message">Message :</label>
              <div class="col-md-8">                     
                <textarea class="form-control" id="message" name="message"></textarea>
              </div>
            </div>	
		
		<div class="form-group">
              <label class="col-md-2 control-label" for="send"></label>
              <div class="col-md-8">
                <button id="send" name="send" class="btn btn-primary">Send</button>
              </div>
            </div>
            
        </fieldset>

		

{{ Form::close() }}