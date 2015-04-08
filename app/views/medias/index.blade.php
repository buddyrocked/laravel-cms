@section('content')
<div class="col-md-9">
	<div class="upper-menu">
		<div class="row">
			<div class="col-md-6">
				<div class="btn-group">
					{{ HTML::link(URL::route('media-create'), 'New media', ['class'=>'btn btn-default-full btn-add']) }}
				</div>
			</div>
			<div class="col-md-6">	
				{{ Form::open(array('route'=>'media-list', 'method'=>'GET', 'class'=>'form-inline pull-right')) }}
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
					<th>name</th>
					<th>description</th>
					<th class="action">action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($medias as $media)
				<tr>
					<td>{{ $media->id }}</td>
					<td>{{ $media->name }}</td>
					<td>{{ $media->description }}</td>
					<td>				
					{{ Form::open(array('route'=>array('media-delete', $media->id), 'class'=>'pull-right form-delete')) }}
						{{ Form::hidden('_method', 'DELETE') }}
						<div class="btn-group">
							{{ HTML::linkicon(URL::route('media-show', $media->id), '<i class="fa fa-send-o"></i>', ['id'=>'TEST', 'class'=>'btn btn-default btn-xs']); }}
							{{ HTML::linkicon(URL::route('media-edit', $media->id), '<i class="fa fa-pencil"></i>', ['id'=>'edit', 'class'=>'btn btn-default btn-xs']); }}
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
			<div class="upper-menu-title"><i class="fa fa-cloud-download"></i> Top Downloaded</div>
		</div>
		<div class="middle-menu">
			<table class="table">
	    		<tbody>
				@foreach($mediaItems as $item)
					<tr>
						<td>
							{{{ $item->description }}}
						</td>
						<td class="col-md-2 bold text-primary text-big right">
							{{{ $item->download }}}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
	    </div>
	    <div class="lower-menu">
	    	<a class="lower-menu-link" href="{{ URL::route('comment-list') }}"><i class="fa fa-refresh"></i></a>
		</div>
	</div>
</div>
@stop