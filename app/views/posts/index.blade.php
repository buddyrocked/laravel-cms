@section('content')
<div class="col-md-9">
	<div class="upper-menu">
		<div class="row">
			<div class="col-md-6">
				<div class="btn-group">
					{{ HTML::link(URL::route('posts-create'), 'New Post', ['class'=>'btn btn-default-full btn-add']) }}
					@if(Session::get('facebook_token') == null)
						{{ HTML::linkicon(URL::route('facebookLogin'), '<i class="fa fa-facebook"></i> Facebook Login', ['class'=>'btn btn-default-full']) }}
					@endif
				</div>
			</div>
			<div class="col-md-6">	
				{{ Form::open(array('route'=>'posts-list', 'method'=>'GET', 'class'=>'form-inline pull-right')) }}
					<div class="input-group">
						{{ Form::text('title', Input::get('title'), array('class'=>'form-control')) }}
						<span class="input-group-btn">
							{{ Form::button('<i class="glyphicon glyphicon-zoom-in"></i>', array('type'=>'submit', 'class'=>'btn btn-default-full')) }}
						</span>
					</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
	{{ Form::open(array('route'=>array('posts-publish'), 'method'=>'PUT', 'class'=>'form-confirm form-delete')) }}
	<div class="middle-menu">
		<table class="table">
			<thead>
				<tr>
					<th class="col-xs-1"></th>
					<th>Title</th>
					<th class="hidden-xs">User</th>
					<th>Status</th>
					<th class="action">Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($posts as $post)
				<tr>
					<td class="">
						@if($post->status == 0)
							{{ Form::checkbox('posts['.$post->id.'][check]', null) }}
							{{ Form::hidden('posts['.$post->id.'][id]', $post->id) }}
						@else
							<i class="fa fa-check-circle"></i>
						@endif
					</td>
					<td>
						{{{ substr($post->title, 0, 50) }}} ...
					</td>
					<td class="hidden-xs">
						{{{ $post->user->first_name }}}
					</td>
					<td class="@if($post->status == 1) td-info @else td-danger @endif">
						@if($post->status == 1)
							<i class="fa fa-check-circle"></i> published
						@else
							<i class="fa fa-question-circle"></i> draft
						@endif
					</td>
					<td class="right">				
						{{ Form::open(array('route'=>array('posts-delete',$post->id), 'class'=>'pull-right form-delete')) }}
							{{ Form::hidden('_method', 'DELETE') }}
							<div class="btn-group">
								{{ HTML::linkicon(URL::route('posts-show', $post->id), '<i class="fa fa-send-o"></i>', ['id'=>'TEST', 'class'=>'btn btn-default btn-xs']); }}
								{{ HTML::linkicon(URL::route('posts-edit', $post->id), '<i class="fa fa-pencil"></i>', ['id'=>'edit', 'class'=>'btn btn-default btn-xs']); }}
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
		{{ Form::button('<i class="fa fa-check"></i> Publish Post', array('type'=>'submit', 'name'=>'publish', 'class'=>'btn btn-default-full')) }}
		</div>
	</div>
	{{ Form::close() }}
	<div class="right">
		{{ $pagination }}
	</div>
</div>
<div class="col-md-3">
	<div class="container-menu">
		<div class="upper-menu">
			<div class="upper-menu-title"><i class="fa fa-bar-chart-o"></i> Graphic</div>
		</div>
		<div class="middle-menu">
			<div id="myfirstchart" style="height: 200px;" data-attr="20"></div>
			<div  class="scrolling-y">
				<table class="table">
		    		<tbody>
					@foreach($categories as $category)
						<tr>
							<td>
								{{{ $category->name }}}
							</td>
							<td class="col-md-2 bold text-primary text-big right">
								{{{ $category->posts->count() }}}
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
	    </div>
	    <div class="lower-menu">
	    	<a class="lower-menu-link" href="{{ URL::route('comment-list') }}"><i class="fa fa-refresh"></i></a>
		</div>
	</div>
	<div class="container-menu">
		<div class="upper-menu">		
			<div class="upper-menu-title"><i class="fa fa-twitch"></i> New Comments</div>
		</div>
		<div class="middle-menu scrolling-y">
			<table class="table">
				@foreach($new_comments as $comment)
				<tr>
					<td>
						<span class="bold">{{{ $comment->name }}}</span> <span class="text-gray">commented on</span>
						<span class=""><a href="#">{{{ substr($comment->post->title, 0, 60) }}} ... </a></span>
						<div class="text-small text-gray"><i class="fa fa-clock-o"></i> {{ date("d F Y",strtotime($comment->created_at)) }} at {{ date("g:ha",strtotime($comment->created_at)) }}</div>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		<div class="lower-menu">
			<a class="lower-menu-link" href="{{ URL::route('comment-list') }}"><i class="fa fa-chevron-right"></i></a>
		</div>
	</div>
</div>
@stop