@section('content')
	{{ HTML::ul($errors->all()) }}
	<div class="upper-menu">
		{{ HTML::link(URL::route('position-list'), 'LIST position', array('class'=>'btn btn-default-full btn-back')) }}
	</div>
	{{ Form::open(array('route'=>'position-store', 'method'=>'POST', 'class'=>'form-add')) }}
		{{ Form::token() }}
		<div class="form-group">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name',Input::old('name'), ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::submit('SAVE', ['class'=>'btn btn-default']) }}
		</div>
	{{ Form::close() }}
@stop