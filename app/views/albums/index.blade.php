@section('content')
<div class="col-md-9">
	<div class="upper-menu">
		<div class="row">
			<div class="col-md-6">
				<div class="btn-group">
					{{ HTML::link(URL::route('album-create'), 'New Album', ['class'=>'btn btn-default-full btn-add']) }}
				</div>
			</div>
			<div class="col-md-6">	
				{{ Form::open(array('route'=>'album-list', 'method'=>'GET', 'class'=>'form-inline pull-right')) }}
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
				@foreach($albums as $album)
				<tr>
					<td>{{ $album->id }}</td>
					<td>{{ $album->name }}</td>
					<td>{{ $album->description }}</td>
					<td>				
					{{ Form::open(array('route'=>array('album-delete', $album->id), 'class'=>'pull-right form-delete')) }}
						{{ Form::hidden('_method', 'DELETE') }}
						<div class="btn-group">
							{{ HTML::linkicon(URL::route('album-show', $album->id), '<i class="fa fa-send-o"></i>', ['id'=>'TEST', 'class'=>'btn btn-default btn-xs']); }}
							{{ HTML::linkicon(URL::route('album-edit', $album->id), '<i class="fa fa-pencil"></i>', ['id'=>'edit', 'class'=>'btn btn-default btn-xs']); }}
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
			<div class="upper-menu-title"><i class="fa fa-image"></i> Photos</div>
		</div>
		<div class="middle-menu">
				@foreach($photos as $item)
					<div class="data-thumb">
						{{ HTML::image('albums/thumb_'.$item->file) }}
					</div>
				@endforeach
	    </div>
	    <div class="lower-menu">
	    	<a class="lower-menu-link" href="{{ URL::route('album-list') }}"><i class="fa fa-refresh"></i></a>
		</div>
	</div>
</div>
@stop