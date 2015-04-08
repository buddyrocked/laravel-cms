@section('content')
<div class="col-md-9">
	<div class="upper-menu">
		<div class="row">
			<div class="col-md-6">
				<div class="btn-group">
					{{ HTML::link(URL::route('schedule-create'), 'New schedule', ['class'=>'btn btn-default-full btn-add']) }}
				</div>
			</div>
			<div class="col-md-6">	
				{{ Form::open(array('route'=>'schedule-list', 'method'=>'GET', 'class'=>'form-inline pull-right')) }}
					<div class="input-group">
						{{ Form::text('place', '', array('class'=>'form-control')) }}
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
					<th>Place</th>
					<th>Staff</th>
					<th>Open</th>
					<th>Close</th>
					<th class="action">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($schedules as $schedule)
				<tr>
					<td>{{ $schedule->id }}</td>
					<td>{{ $schedule->place }}</td>
					<td>{{ $schedule->staff->name }}</td>
					<td>{{ $schedule->date_start }}</td>
					<td>{{ $schedule->date_close }}</td>
					<td class="right">				
						{{ Form::open(array('route'=>array('schedule-delete',$schedule->id), 'class'=>'pull-right form-delete')) }}
							{{ Form::hidden('_method', 'DELETE') }}
							<div class="btn-group">
								{{ HTML::linkicon(URL::route('schedule-show', $schedule->id), '<i class="fa fa-send-o"></i>', ['id'=>'TEST', 'class'=>'btn btn-default btn-xs']); }}
								{{ HTML::linkicon(URL::route('schedule-edit', $schedule->id), '<i class="fa fa-pencil"></i>', ['id'=>'edit', 'class'=>'btn btn-default btn-xs']); }}
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
		{{ $pagination }}
	</div>
</div>
<div class="col-md-3">
	<div class="container-menu">
		<div class="upper-menu">
			<div class="upper-menu-title"><i class="fa fa-male"></i> Staff</div>
		</div>
		<div class="middle-menu">
			<table class="table">
	    		<tbody>
				@foreach($staffs as $item)
					<tr>
						<td class="">
							<i class="fa fa-user-md text-primary"></i> {{{ $item->name }}}
						</td>
						<td class="col-md-2 bold text-primary text-big right">
							{{{ $item->schedules->count() }}}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
	    </div>
	    <div class="lower-menu">
	    	<a class="lower-menu-link" href="{{ URL::route('staff-list') }}"><i class="fa fa-chevron-right"></i></a>
		</div>
	</div>
</div>
@stop