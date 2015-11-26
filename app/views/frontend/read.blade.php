@extends('layouts.budi-layout.frontend')
@section('content')
	<div class="section" id="blog">
	<div class="title-section2-container center animatedx" data-anim="fadeInDown">
    		<div class="title-section2">
                Our <span>Blog</span>
            </div>
    	<div class="text-mute text-semibold">Programming, Life & Enterprenership.</div>
    </div>
    <div class="container">
    	<div class="row">
    		<div class="col-md-8">
    			<div class="blog-lists">
	    			<div class="col-md-12">
	    				<div class="blog-item">
	    					<ul class="blog-share animatedx" data-anim="bounceInLeft">
	    						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
	    						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
	    						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
	    						<li><a href="#"><i class="fa fa-reddit"></i></a></li>
	    					</ul>
	    					<div class="blog-picture-container">
		    					<div class="blog-picture blog-picture-full animatedx" data-anim="bounceInDown">
		    						{{ HTML::image('posts/'.$post->image, $post->title, ['data-src'=>'holder.js/100%x400/auto/#e1e1e1:#ffffff/text:image']) }}
		    					</div>
	    						<div class="blog-category">
	    							<i class="fa fa-html5"></i>
	    						</div>
		    				</div>
	    					<div class="blog-detail">
	    						<div class="animatedx" data-anim="bounceInLeft">
		    						<h2 class="blog-title animatedx" data-anim="bounceInLeft">
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
		    							{{ $post->content }}
		    						</div>
			    					<div class="blog-tag">
			    						<i class="fa fa-tags"></i> <span>Tags :</span> 
			    						@foreach($post->posttags as $tag)
			    							{{ HTML::link(URL::route('tag', $tag->tag->name), $tag->tag->name, ['class'=>'tag-color']) }}
			    						@endforeach
			    					</div>
			    				</div>
	    					</div>
	    				</div>
	    				<div class="blog-author animatedx" data-anim="bounceInUp">
	    					<div class="row">
	    						<div class="col-md-2">
	    							<div class="blog-author-img">
	    								{{ HTML::image('profile/948dd322351c39ca6d44c585244afc05cdeb2302.jpg', 'profile', ['data-src'=>'holder.js/100%x150/auto/#e1e1e1:#ffffff/text:image']) }}
	    							</div>
	    						</div>
	    						<div class="col-md-10">
	    							<div class="blog-author-content">
	    								<div class="text-bold">{{ $post->user->first_name.' '.$post->user->last_name }}</div>	    								
	    							</div>
	    						</div>
	    					</div>
	    				</div>
	    				<div class="blog-related">
		    				<div class="title">
		    					<span class=""><i class="fa fa-newspaper-o"></i></span> Related Posts
		    				</div>
		    				<div class="row">
		    					@foreach($post->category->posts()->take(3)->get() as $post)
		    						<div class="col-md-4 animatedx" data-anim="bounceIn">
		    							<div class="blog-item-masonry">
		    								<div class="picture">
			    								{{ HTML::image('posts/thumb_'.$post->image, $post->title, ['data-src'=>'holder.js/100%x150/auto/#e1e1e1:#ffffff/text:image']) }}	
			    							</div>
			    							<div class="title">
			    								{{ HTML::link(URL::route('read', $post->slug), $post->title) }}
			    							</div>
		    							</div>
		    						</div>
		    					@endforeach
		    				</div>
			    		</div>
			    		<div class="comment">
			    			<div id="disqus_thread"></div>
							<script>
							/**
							* RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
							* LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
							*/
							/*
							var disqus_config = function () {
							this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
							this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
							};
							*/
							(function() { // DON'T EDIT BELOW THIS LINE
							var d = document, s = d.createElement('script');

							s.src = '//b-dev.disqus.com/embed.js';

							s.setAttribute('data-timestamp', +new Date());
							(d.head || d.body).appendChild(s);
							})();
							</script>
							<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>	
			    		</div>
	    			</div>
		    	</div>
		    </div>
			<div class="col-md-4">
				@include('layouts.budi-layout.sidebarBlog')
			</div>
		</div>
	</div>
@stop