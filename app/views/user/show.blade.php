@extends('layouts.layout')
@section('content')
	{{ $user->name }}
	<table class="table table-bordered table-striped">
		<tr>
			<th>Title</th>
			<th>Content</th>
			<th>User</th>
		</tr>
		@foreach($user->posts as $post)
		<tr>
			<td>
				{{ $post->title }}
			</td>
			<td>
				{{ $post->content }}
			</td>
			<td>
				{{ $post->user->name }}
			</td>
		</tr>
		@endforeach
	</table>
@stop