<div class="blog-sidebar">
	<div class="blog-sidebar-box">
		<div class="title">
			<span class=""><i class="fa fa-search"></i></span> Find Posts
		</div>
		<div class="search-container">
			{{ Form::open(array('route'=>'blog', 'method'=>'GET', 'class'=>'form-inline')) }}
				<div class="input-group col-md-12">
					{{ Form::text('title', Input::get('title'), array('class'=>'form-control')) }}
					<span class="input-group-btn">
						{{ Form::button('<i class="glyphicon glyphicon-zoom-in"></i>', array('type'=>'submit', 'class'=>'btn btn-main')) }}
					</span>
				</div>
			{{ Form::close() }}
		</div>
	</div>
	<div class="blog-sidebar-box">
		<div class="title">
			<span class=""><i class="fa fa-heart-o"></i></span> Popular Posts
		</div>
		<ul class="blog-sidebar-post">
			@foreach($sidebar['popular_posts'] as $post)
			<li>
				<div class="row">
					<div class="col-md-2 col-xs-2">
						<div class="blog-sidebar-img">
							{{ HTML::image('posts/thumb_'.$post->image, $post->title, ['data-src'=>'holder.js/60x60/#0dd0c0:#ffffff/text:image']) }}
						</div>
					</div>
					<div class="col-md-10 col-xs-10">
						<div class="blog-sidebar-text">
							{{ HTML::link(URL::route('read', $post->slug), $post->title) }}
						</div>
					</div>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
	<div class="blog-sidebar-box">
		<div class="title">
			<span class=""><i class="fa fa-bars"></i></span> Category
		</div>
		<ul class="blog-sidebar-category">
			@foreach($sidebar['categories'] as $category)
			<li>
				<div class="row">
					<div class="col-md-12">
						<div class="blog-sidebar-text text-semibold">
							<a href="{{ Url::route('blog', array('category'=>$category->name)) }}">{{ $category->name.' <span>( '.$category->posts->count().' )</span> ' }}</a>
						</div>
					</div>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
	<div class="blog-sidebar-box">
		<div class="title">
			<span class=""><i class="fa fa-twitch"></i></span> Recent Comments
		</div>
		<ul>
			@foreach($sidebar['comments'] as $comment)
			<li>
				<div class="row">
					<div class="col-md-2 col-xs-2">
						<div class="blog-sidebar-img"></div>
					</div>
					<div class="col-md-10 col-xs-10">
						<div class="blog-sidebar-text">{{ $comment->content }}</div>
					</div>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
</div>