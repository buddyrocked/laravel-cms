@extends('layouts.layout')
@section('content')
	<div class="well">
		{{ HTML::link(URL::to('posts'), 'List Post', ['class'=>'btn btn-info']); }}
	</div>
	<div>
		{{ Form::open(array('url'=>'posts/create', 'method'=>'post')) }}
			<div class="form-group">
				{{ Form::label('title', 'Title', ['class'=>'']) }}
				{{ Form::text('title', '', ['class'=>'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('content', 'Content', ['class'=>'']) }}
				{{ Form::textarea('content', '', ['class'=>'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::submit('SAVE', ['class'=>'btn btn-info']) }}
			</div>
		{{ Form::close() }}
	</div>
@stop