@section('content')
<div class="col-md-9">
	<div class="upper-menu">
		<div class="row">
			<div class="col-md-6">
				<div class="btn-group">
					{{ HTML::link(URL::route('$RESOURCE$-create'), 'New $RESOURCE$', ['class'=>'btn btn-default-full btn-add']) }}
				</div>
			</div>
			<div class="col-md-6">	
				{{ Form::open(array('route'=>'$RESOURCE$-list', 'method'=>'GET', 'class'=>'form-inline pull-right')) }}
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
				@foreach($$COLLECTON$ as $$RESOURCE$)
				<tr>
					<td>{{ $$RESOURCE$->id }}</td>
					<td>{{ $$RESOURCE$->name }}</td>
					<td class="right">				
						{{ Form::open(array('route'=>array('$RESOURCE$-delete',$$RESOURCE$->id), 'class'=>'pull-right form-delete')) }}
							{{ Form::hidden('_method', 'DELETE') }}
							<div class="btn-group">
								{{ HTML::linkicon(URL::route('$RESOURCE$-show', $$RESOURCE$->id), '<i class="fa fa-send-o"></i>', ['id'=>'TEST', 'class'=>'btn btn-default btn-xs']); }}
								{{ HTML::linkicon(URL::route('$RESOURCE$-edit', $$RESOURCE$->id), '<i class="fa fa-pencil"></i>', ['id'=>'edit', 'class'=>'btn btn-default btn-xs']); }}
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
@stop

@section('content')
	{{ HTML::ul($errors->all()) }}
	<div class="upper-menu">
		{{ HTML::link(URL::route('$RESOURCE$-list'), 'LIST $RESOURCE$', array('class'=>'btn btn-default-full btn-back')) }}
	</div>
	{{ Form::open(array('route'=>'$RESOURCE$-store', 'method'=>'POST', 'class'=>'form-add')) }}
		{{ Form::token() }}
		<div class="form-group">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name',Input::old('name'), ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::submit('SAVE', ['class'=>'btn btn-default']) }}
		</div>
	{{ Form::close() }}
@stop