@section('content')
	{{ HTML::ul($errors->all()) }}
	<div class="upper-menu">
		{{ HTML::link(URL::route('category-list'), 'LIST CATEGORY', array('class'=>'btn btn-default-full btn-back')) }}
	</div>
	{{ Form::open(array('route'=>'category-store', 'method'=>'POST', 'class'=>'form-add')) }}
		<div class="form-group">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name',Input::old('name'), ['class'=>'form-control']) }}
		</div>
		<div class="form-group right">
			{{ Form::button('<i class="fa fa-save"></i> SAVE', array('type'=>'submit', 'name'=>'publish', 'class'=>'btn btn-default-full')) }}
		</div>
	{{ Form::close() }}
@stop