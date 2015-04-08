@section('content')
	{{ HTML::ul($errors->all()) }}
	<div class="upper-menu">
		{{ HTML::link(URL::route('category-list'), 'List Category', array('class'=>'btn btn-default-full btn-back')) }}
	</div>
	{{ Form::model($category, array('route'=>array('category-update', $category->id), 'method'=>'PUT', 'class'=>'form-add')) }}
		<div class="form-group">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name',null, ['class'=>'form-control']) }}
		</div>
		<div class="form-group right">
			{{ Form::button('<i class="fa fa-save"></i> SAVE', array('type'=>'submit', 'name'=>'publish', 'class'=>'btn btn-default-full')) }}
		</div>
	{{ Form::close() }}
@stop