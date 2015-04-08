@section('content')
	{{ HTML::ul($errors->all()) }}
	<div class="upper-menu">
		{{ HTML::link(URL::route('position-list'), 'LIST POSITION', array('class'=>'btn btn-default-full btn-back')) }}
	</div>
	{{ Form::model($position, array('route'=>array('position-update', $position->id), 'method'=>'PUT', 'class'=>'form-add')) }}
		{{ Form::token() }}
		<div class="form-group">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name',null, ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::submit('SAVE', ['class'=>'btn btn-default']) }}
		</div>
	{{ Form::close() }}
@stop