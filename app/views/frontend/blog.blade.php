@extends('layouts.budi-layout.frontend')
@section('content')
<div class="section" id="blog">
	<div class="title-section animated" data-anim="fadeInDown">
		<div class="text-main line">My Blog</div>
    	<div class="text-mute">All about programming & life.</div>
    </div>
    <div class="container">
    	<div class="row">
    		<div class="col-md-8">
    			<div class="blog-lists">
		    		@foreach($posts as $post)
		    			<div class="col-md-12">
		    				<div class="blog-item">
		    					<ul class="blog-share animated" data-anim="bounceInLeft">
		    						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
		    						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
		    						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
		    						<li><a href="#"><i class="fa fa-reddit"></i></a></li>
		    					</ul>
		    					<div class="blog-picture-container">
			    					<div class="blog-picture animated" data-anim="bounceInDown">
			    						{{ HTML::image('posts/'.$post->image, $post->title, ['data-src'=>'holder.js/100%x400/#0dd0c0:#ffffff/text:image']) }}
			    					</div>
		    						<div class="blog-category">
		    							<i class="fa fa-html5"></i>
		    						</div>
			    				</div>
		    					<div class="blog-detail">
		    						<div class="animated" data-anim="bounceInLeft">
			    						<h2 class="blog-title animated" data-anim="bounceInLeft">
			    							{{ HTML::link(URL::route('read', $post->slug), $post->title) }}
			    						</h2>
			    						<div class="blog-detail-item">
			    							<i class="fa fa-user"></i> {{ $post->user->username }}
			    						</div>
			    						<div class="blog-detail-item">
			    							<i class="fa fa-calendar"></i> {{ date("d F Y",strtotime($post->created_at)) }}
			    						</div>
			    						<div class="blog-detail-item">
			    							<i class="fa fa-twitch"></i> {{ $post->comments->count() }} comments
			    						</div>
			    						<div class="blog-content">
			    							{{ $post->headline }}
			    						</div>
				    					<div class="blog-tag">
				    						<i class="fa fa-tags"></i> <span>Tags :</span> 
				    						@foreach($post->posttags as $tag)
				    							{{ HTML::link(URL::route('blog'),$tag->tag->name) }}
				    						@endforeach
				    					</div>
				    				</div>
		    						<div class="blog-link">		    							
		    							{{ HTML::link(URL::route('read', $post->slug), 'read more', ['class'=>'pull-right animated', 'data-anim'=>'bounceInRight']) }}
		    						</div>
		    					</div>
		    				</div>
		    			</div>
		    		@endforeach
		    	</div>
		    	<div class="row">
		    		<div class="col-md-12">
			    		{{ $pagination }}
			    	</div>
		    	</div>
    		</div>
    		<div class="col-md-4">
    			@include('layouts.budi-layout.sidebarBlog')
    		</div>
    	</div>
    </div>
</div>
@stop