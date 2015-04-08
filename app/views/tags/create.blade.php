@section('content')
	{{ HTML::ul($errors->all()) }}
	<div class="upper-menu">
		{{ HTML::link(URL::route('tag-list'), 'LIST TAG', array('class'=>'btn btn-default-full btn-back')) }}
	</div>
	{{ Form::open(array('url'=>'tag', 'method'=>'POST', 'class'=>'form-add')) }}
		<div class="form-group">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', Input::old('name'), array('class'=>'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::submit('SAVE', array('class'=>'btn btn-default')) }}
		</div>
	{{ Form::close() }}
@stop