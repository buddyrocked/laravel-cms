@section('content')
	{{ HTML::ul($errors->all()) }}
	<div class="upper-menu">
		{{ HTML::link(URL::to('setting'), 'LIST SETTING', array('class'=>'btn btn-default-full btn-back')) }}
	</div>
	{{ Form::open(array('route'=>'setting-store', 'method'=>'POST', 'class'=>'form-add')) }}
		<div class="form-group">
			{{ Form::label('key', 'Key') }}
			{{ Form::text('key',Input::old('key'), ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('value', 'Value') }}
			{{ Form::text('value',Input::old('value'), ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::submit('SAVE', ['class'=>'btn btn-default']) }}
		</div>
	{{ Form::close() }}
@stop