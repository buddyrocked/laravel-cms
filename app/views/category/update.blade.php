@section('content')
	<div class="well">
		{{ HTML::link(URL::route('category-list'), 'List Category', array('class'=>'btn btn-default')) }}
	</div>
	{{ HTML::ul($errors->all()) }}
	{{ Form::model($category, array('route'=>'category-update', $category->id)) }}
		<div class="form-group">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name',null, ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::submit('SAVE', ['class'=>'btn btn-default']) }}
		</div>
	{{ Form::close() }}
@stop