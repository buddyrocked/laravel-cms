@section('content')
	<div class="col-md-4 col-md-offset-4">
		<div id="login-container">	
			<div id="login-header">

			</div>
			{{ Form::open(array('route'=>'postLogin', 'method'=>'POST', 'class'=>'form-login')) }}
			@if ($errors->all())
				<div class="alert alert-danger alert-dismissable" role="alert">
		          	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		          	{{ HTML::ul($errors->all()) }}
		      	</div>
	      	@endif	      	              
            @if(Session::has('message'))
              <div class="alert alert-danger alert-dismissable" role="alert">
                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  {{ Session::get('message') }}
              </div>
            @endif
			<div class="form-group">
				{{ Form::label('username', 'Username') }}
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
					{{ Form::text('username',Input::old('username'), array('class'=>'form-control input-lg', 'placeholder'=>'username')) }}
				</div>
			</div>
			<div class="form-group">
				{{ Form::label('password', 'Password') }}
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock fa-lg"></i></span>
					{{ Form::password('password', array('class'=>'form-control input-lg', 'placeholder'=>'password')) }}
				</div>
			</div>
			<div class="form-group">
				{{ Form::checkbox('remember_token', 1) }} Remember Me
			</div>
			<div class="form-group right">
				{{ Form::button('<i class="glyphicon glyphicon-lock"></i> LOGIN', array('type'=>'submit', 'class'=>'btn btn-default-full btn-flat')) }}
			</div>
		</div>
	</div>
@stop