@section('content')
	<div class="upper-menu">
		{{ HTML::link(URL::route('category-create'), 'New Category', ['class'=>'btn btn-default-full btn-add']) }}
		{{ Form::open(array('url'=>'category', 'method'=>'GET', 'class'=>'form-inline pull-right')) }}
			<div class="input-group">
				{{ Form::text('name', '', array('class'=>'form-control')) }}
				<span class="input-group-btn">
					{{ Form::button('<i class="glyphicon glyphicon-zoom-in"></i>', array('type'=>'submit', 'class'=>'btn btn-default-full')) }}
				</span>
			</div>
		{{ Form::close() }}
	</div>
	<div class="middle-menu">
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Action</th>
			</tr>
			@foreach($categories as $category)
			<tr>
				<td>{{ $category->id }}</td>
				<td>{{ $category->name }}</td>
				<td>				
					{{ Form::open(array('route'=>array('category-update', $category->id), 'class'=>'pull-right form-delete')) }}
						{{ Form::hidden('_method', 'DELETE') }}
						<div class="btn-group">
							{{ HTML::linkicon(URL::route('category-show', $category->id), '<i class="fa fa-send-o"></i>', ['id'=>'TEST', 'class'=>'btn btn-default btn-xs']); }}
							{{ HTML::linkicon(URL::route('category-edit', $category->id), '<i class="fa fa-pencil"></i>', ['id'=>'edit', 'class'=>'btn btn-default btn-xs']); }}
							{{ Form::button('<i class="fa fa-trash"></i>', array('type'=>'submit', 'class'=>'btn btn-default btn-xs btn-delete')) }}
						</div>
					{{ Form::close() }}
				</td>
			</tr>
			@endforeach
		</table>
	</div>
	<div class="right">
		{{ $pagination }}
	</div>
@stop