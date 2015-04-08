@section('content')
	<div class="upper-menu">
		{{ HTML::link(URL::route('tag-create'), 'Add Tag', ['class'=>'btn btn-default-full btn-add']) }}
		{{ Form::open(array('route'=>'tag-list', 'method'=>'GET', 'class'=>'form-inline pull-right')) }}
			<div class="input-group">
				{{ Form::text('name', '', array('class'=>'form-control')) }}
				<span class="input-group-btn">
					{{ Form::button('<i class="glyphicon glyphicon-zoom-in"></i>', array('type'=>'submit','class'=>'btn btn-default-full')) }}
				</span>
			</div>
		{{ Form::close() }}
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th>ID</th>
			<th>NAME</th>
			<th class="action">ACTION</th>
		</tr>
		@foreach($tags as $tag)
		<tr>
			<td>{{ $tag->id }}</td>
			<td>{{ $tag->name }}</td>
			<td>
				{{ Form::open(array('route'=>array('tag-delete', $tag->id), 'class'=>'form-delete')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					<div class="btn-group">
						{{ HTML::linkicon(URL::route('tag-show', $tag->id), '<i class="fa fa-send-o"></i>', ['id'=>'TEST', 'class'=>'btn btn-default btn-xs']); }}
						{{ HTML::linkicon(URL::route('tag-edit', $tag->id), '<i class="fa fa-pencil"></i>', ['id'=>'edit', 'class'=>'btn btn-default btn-xs']); }}
						{{ Form::button('<i class="glyphicon glyphicon-remove"></i>', array('type'=>'submit', 'class'=>'btn btn-red btn-xs btn-delete')) }}
					</div>
				{{ Form::close() }}
			</td>
		</tr>
		@endforeach
	</table>
	<div class="right">
		{{ $pagination }}
	</div>
@stop