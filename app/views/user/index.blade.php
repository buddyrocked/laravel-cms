@extends('layouts.layout')
@section('content')
	<div class="well">
		{{ HTML::link(URL::to('user/create'), 'New User', ['class'=>'btn btn-info']) }}
	</div>
	<div>
		{{ Form::open(array('url'=>'user', 'method'=>'GET', 'class'=>'form-inline')) }}
			<div class="input-group">
				{{ Form::text('name', '', array('class'=>'form-control')) }}
				<span class="input-group-btn">
					{{ Form::submit('SEARCH', array('class'=>'btn btn-info')) }}
				</span>
			</div>
		{{ Form::close() }}
	</div>
	<div>&nbsp;</div>
	<table class="table table-bordered table-striped">
		<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>Active</th>
			<th>Action</th>
		</tr>
		@foreach($users as $user)
		<tr>
			<td>{{ $user->id }}</td>
			<td>{{ $user->first_name }}</td>
			<td>{{ $user->last_name }}</td>
			<td>{{ $user->username }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->is_active }}</td>
			<td>
				{{ HTML::link(URL::to('user/'.$user->id), '', ['class'=>'glyphicon glyphicon-home btn btn-info btn-xs']) }}
				{{ HTML::link(URL::to('user/'.$user->id.'/edit'), '', ['class'=>'glyphicon glyphicon-pencil btn btn-info btn-xs']) }}
				{{ Form::open(array('url'=>'user/'.$user->id, 'class'=>'pull-right form-delete')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('DELETE', ['class'=>'glyphicon glyphicon-home btn btn-info btn-xs btn-delete'])}}
				{{ Form::close() }}
			</td>
		</tr>
		@endforeach
	</table>
	{{ $pagination }}
@stop