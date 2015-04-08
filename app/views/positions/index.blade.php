@section('content')
<div class="col-md-9">
	<div class="upper-menu">
		<div class="row">
			<div class="col-md-6">
				<div class="btn-group">
					{{ HTML::link(URL::route('position-create'), 'New Position', ['class'=>'btn btn-default-full btn-add']) }}
				</div>
			</div>
			<div class="col-md-6">	
				{{ Form::open(array('route'=>'position-list', 'method'=>'GET', 'class'=>'form-inline pull-right')) }}
					<div class="input-group">
						{{ Form::text('name', '', array('class'=>'form-control')) }}
						<span class="input-group-btn">
							{{ Form::button('<i class="glyphicon glyphicon-zoom-in"></i>', array('type'=>'submit', 'class'=>'btn btn-default-full')) }}
						</span>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	
	<div class="middle-menu">
		<!--CONTENT HERE TABLE/FORM-->
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th class="action">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($positions as $position)
				<tr>
					<td>{{ $position->id }}</td>
					<td>{{ $position->name }}</td>
					<td class="right">				
						{{ Form::open(array('route'=>array('position-delete',$position->id), 'class'=>'pull-right form-delete')) }}
							{{ Form::hidden('_method', 'DELETE') }}
							<div class="btn-group">
								{{ HTML::linkicon(URL::route('position-show', $position->id), '<i class="fa fa-send-o"></i>', ['id'=>'TEST', 'class'=>'btn btn-default btn-xs']); }}
								{{ HTML::linkicon(URL::route('position-edit', $position->id), '<i class="fa fa-pencil"></i>', ['id'=>'edit', 'class'=>'btn btn-default btn-xs']); }}
								{{ Form::button('<i class="fa fa-trash"></i>', array('type'=>'submit', 'class'=>'btn btn-default btn-xs btn-delete')) }}
							</div>
						{{ Form::close() }}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>	
	<div class="lower-menu right">
		<div>
		{{ Form::button('<i class="fa fa-check"></i> Button', array('type'=>'submit', 'name'=>'publish', 'class'=>'btn btn-default-full')) }}
		</div>
	</div>
	<div class="right">
		<!-- {{ $pagination }} -->
	</div>
</div>
@stop