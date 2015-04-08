
@section('content')
	<div class="upper-menu">
		{{ HTML::link(URL::route('menu-create'), 'New Menu', ['class'=>'btn btn-default-full btn-add']); }}
		{{ Form::open(array('route'=>'menu-list', 'method'=>'GET', 'class'=>'form-inline pull-right')) }}
			<div class="input-group">
				{{ Form::text('title', Input::get('title'), array('class'=>'form-control')) }}
				<span class="input-group-btn">
					{{ Form::button('<i class="glyphicon glyphicon-zoom-in"></i>', array('type'=>'submit', 'class'=>'btn btn-default-full')) }}
				</span>
			</div>
		{{ Form::close() }}
	</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th>Title</th>
			<th class="hidden-xs">Route</th>
			<th class="hidden-xs">Parent</th>
			<th>Icon</th>
			<th class="action">Action</th>
		</tr>
		@foreach($menus as $menu)
		<tr>
			<td>
				{{{ $menu->title }}}
			</td>
			<td class="hidden-xs">
				{{{ $menu->url }}}
			</td>
			<td class="hidden-xs">
				@if($menu->parent)
					{{{ $menu->parent->title }}}
				@endif
			</td>
			<td>
				{{{ $menu->icon }}}
			</td>
			<td>				
				{{ Form::open(array('route'=>array('menu-delete',$menu->id), 'class'=>'pull-right form-delete')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					<div class="btn-group actions">
						{{ HTML::linkicon(URL::route('menu-show', $menu->id), '<i class="fa fa-send-o"></i>', ['id'=>'TEST', 'class'=>'btn btn-default btn-xs']); }}
						{{ HTML::linkicon(URL::route('menu-edit', $menu->id), '<i class="fa fa-pencil"></i>', ['id'=>'edit', 'class'=>'btn btn-default btn-xs']); }}
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