@extends('layouts.layout')
@section('content')
	<div class="well">
		{{ HTML::link(URL::to('user'), 'List User', ['class'=>'btn btn-info']); }}
	</div>
	{{ HTML::ul($errors->all()) }}
	{{ Form::open(array('url'=>'user')) }}
		<div class="form-group">
			{{ Form::label('first_name', 'First Name', ['class'=>'']) }}
			{{ Form::text('first_name', Input::old('first_name'), ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('last_name', 'Last Name', ['class'=>'']) }}
			{{ Form::text('last_name', Input::old('last_name'), ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('email', 'Email', ['class'=>'']) }}
			{{ Form::text('email', Input::old('email'), ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('password', 'Password', ['class'=>'']) }}
			{{ Form::password('password', ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::label('activated', 'Active', ['class'=>'']) }}
			{{ Form::select('activated', array(''=>'Pilih', '0'=>'Tidak', '1'=>'Aktif'), Input::old('activated'), ['class'=>'form-control']) }}
		</div>
		<div class="form-group">
			{{ Form::submit('SAVE', ['class'=>'btn btn-info']) }}
		</div>
	{{ Form::close() }}
@stop