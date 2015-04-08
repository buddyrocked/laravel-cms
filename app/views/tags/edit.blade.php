@section('content')
	{{ HTML::ul($errors->all()) }}
	<div class="upper-menu">
		{{ HTML::link(URL::route('tag-list'), 'List Tag', ['class'=>'btn btn-default-full btn-back']) }}
	</div>
	{{ Form::model($tag, array('route'=>array('tag-update', $tag->id), 'method'=>'PUT', 'class'=>'form-add')) }}
		<div class="form-group">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', null, ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::submit('SUBMIT', ['class'=>'btn btn-default']) }}
		</div>
	{{ Form::close() }}
@stop