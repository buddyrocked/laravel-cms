@section('content')
	<div class="upper-menu">
		{{ HTML::link(URL::route('setting-create'), 'New setting', ['class'=>'btn btn-default-full btn-add']) }}
		{{ Form::open(array('url'=>'setting', 'method'=>'GET', 'class'=>'form-inline pull-right')) }}
			<div class="input-group">
				{{ Form::text('name', '', array('class'=>'form-control')) }}
				<span class="input-group-btn">
					{{ Form::button('<i class="glyphicon glyphicon-zoom-in"></i>', array('type'=>'submit', 'class'=>'btn btn-info-full')) }}
				</span>
			</div>
		{{ Form::close() }}
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th>ID</th>
			<th>Key</th>
			<th>Value</th>
			<th class="action">Action</th>
		</tr>
		@foreach($settings as $setting)
		<tr>
			<td>{{ $setting->id }}</td>
			<td>{{ $setting->key }}</td>
			<td>{{ $setting->value }}</td>
			<td>				
				{{ Form::open(array('route'=>array('setting-update', $setting->id), 'class'=>'pull-right form-delete')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					<div class="btn-group actions">
						{{ HTML::link(URL::route('setting-show',$setting->id), '', ['class'=>'glyphicon glyphicon-zoom-in btn btn-default btn-xs']) }}
						{{ HTML::link(URL::route('setting-edit',$setting->id), '', ['class'=>'glyphicon glyphicon-pencil btn btn-blue btn-xs']) }}
						{{ Form::button('<i class="glyphicon glyphicon-remove"></i>', array('type'=>'submit', 'class'=>'btn btn-red btn-xs btn-delete')) }}
					</div>
				{{ Form::close() }}
			</td>
		</tr>
		@endforeach
	</table>
	{{ $pagination }}
@stop