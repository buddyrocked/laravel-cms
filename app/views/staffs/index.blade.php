@section('content')
<div class="col-md-8">
	<div class="upper-menu">
		<div class="row">
			<div class="col-md-6">
				<div class="btn-group">
					{{ HTML::link(URL::route('staff-create'), 'New staff', ['class'=>'btn btn-default-full btn-add']) }}
				</div>
			</div>
			<div class="col-md-6">	
				{{ Form::open(array('route'=>'staff-list', 'method'=>'GET', 'class'=>'form-inline pull-right')) }}
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
					<th></th>
					<th>Name</th>
					<th class="action">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($staffs as $staff)
				<tr>
					<td>
						<div class="data-thumb">
							{{ HTML::image('profile/thumb_'.$staff->file) }}
						</div>
					</td>
					<td>
						<div class="text-primary bold">{{ $staff->name }}</div>
						<div>{{ $staff->position->name }}</div>

					</td>
					<td class="right">				
						{{ Form::open(array('route'=>array('staff-delete',$staff->id), 'class'=>'pull-right form-delete')) }}
							{{ Form::hidden('_method', 'DELETE') }}
							<div class="btn-group">
								{{ HTML::linkicon(URL::route('staff-show', $staff->id), '<i class="fa fa-send-o"></i>', ['id'=>'TEST', 'class'=>'btn btn-default btn-xs']); }}
								{{ HTML::linkicon(URL::route('staff-edit', $staff->id), '<i class="fa fa-pencil"></i>', ['id'=>'edit', 'class'=>'btn btn-default btn-xs']); }}
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
<div class="col-md-4">
	<div class="container-menu">
		<div class="upper-menu">
			<div class="upper-menu-title"><i class="fa fa-stethoscope"></i> Latest Schedules</div>
		</div>
		<div class="middle-menu">
			<table class="table">
	    		<tbody>
				@foreach($schedules as $item)
					<tr>
						<td>
							<div class=" text-primary bold text-upper">
								<i class="fa fa-hospital-o"></i>  &nbsp;{{{ $item->place }}}
							</div>
							<div>&nbsp;</div>
							<span class="text-small">
								<i class="fa fa-calendar text-primary bold "></i> &nbsp; {{{ date("d M Y", strtotime($item->date_start)) }}}
							</span>
							<span class="text-small pull-right">
								<i class="fa fa-clock-o text-primary bold "></i> &nbsp; {{{ date("H:i:s", strtotime($item->date_start)) }}}
							</span>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
	    </div>
	    <div class="lower-menu">
	    	<a class="lower-menu-link" href="{{ URL::route('schedule-list') }}"><i class="fa fa-chevron-right"></i></a>
		</div>
	</div>
</div>
@stop