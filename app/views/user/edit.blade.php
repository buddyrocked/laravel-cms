@extends('layouts.layout')
@section('content')
	<div class="well">
		{{ HTML::link(URL::to('user'), 'List User', ['class'=>'btn btn-info']); }}
	</div>
	{{ HTML::ul($errors->all()) }}
	<div>
		{{ Form::model($user, array('route'=>array('user.update', $user->id), 'method'=>'PUT')) }}
			<div class="form-group">
				{{ Form::label('first_name', 'First Name', ['class'=>'']) }}
				{{ Form::text('first_name', null, ['class'=>'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('last_name', 'Last Name', ['class'=>'']) }}
				{{ Form::text('last_name', null, ['class'=>'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('email', 'Email', ['class'=>'']) }}
				{{ Form::text('email', null, ['class'=>'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('password', 'Password', ['class'=>'']) }}
				{{ Form::password('password', ['class'=>'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('activated', 'Active', ['class'=>'']) }}
				{{ Form::select('activated', array(''=>'Pilih', '0'=>'Tidak', '1'=>'Aktif'), null, ['class'=>'form-control'] ) }}
			</div>
			<div class="form-group">
				{{ Form::submit('UPDATE', ['class'=>'btn btn-info']) }}
			</div>
		{{ Form::close() }}
	</div>
@stop