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
	    			<div class="col-md-12">
	    				<div class="blog-item">
	    					<ul class="blog-share animated" data-anim="bounceInLeft">
	    						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
	    						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
	    						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
	    						<li><a href="#"><i class="fa fa-reddit"></i></a></li>
	    					</ul>
	    					<div class="blog-picture-container">
		    					<div class="blog-picture blog-picture-full animated" data-anim="bounceInDown">
		    						{{ HTML::image('posts/'.$post->image, $post->title, ['data-src'=>'holder.js/100%x400/auto/#0dd0c0:#ffffff/text:image']) }}
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
	    				<div class="blog-author animated" data-anim="bounceInUp">
	    					<div class="row">
	    						<div class="col-md-2">
	    							<div class="blog-author-img">
	    								{{ HTML::image('profile/948dd322351c39ca6d44c585244afc05cdeb2302.jpg') }}
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
		    						<div class="col-md-4 animated" data-anim="bounceIn">
		    							<div class="blog-item-masonry">
		    								<div class="picture">
			    								{{ HTML::image('posts/thumb_'.$post->image, $post->title, ['data-src'=>'holder.js/100%x150/auto/#0dd0c0:#ffffff/text:image']) }}	
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
			    			<div class="comment-list">
			    				<div class="title"><i class="fa fa-twitch"></i> Comments</div>
			    				<div class="comment-item">
			    					<div class="row">
		                                <div class="col-md-2 col-xs-3 center">
		                                	<div class="comment-avatar">
		                                		{{ HTML::image('profile/948dd322351c39ca6d44c585244afc05cdeb2302.jpg') }}
		                                	</div>
		                                	budi hariyana
		                                </div>
		                                <div class="col-md-10 col-xs-9">
		                                	<div class="comment-content">
		                                		comments
		                                	</div>
		                                	<div class="comment-data">
	                                			<div class="comment-data-item">
	                                				<div>
	                                					<i class="fa fa-calendar"></i> 
	                                				</div>
	                                				<span>25 November 2015</span>
	                                				<div>
	                                					<i class="fa fa-clock-o"></i> 
	                                				</div>
	                                				<span>01:00 pm</span>
	                                				<a href="#" class="btn btn-main btn-xs pull-right"><i class="fa fa-envelope"></i> </a>
	                                			</div>
		                                	</div>
		                                </div>
		                            </div>
			    				</div>
			    				<div class="comment-item">
			    					<div class="row">
		                                <div class="col-md-2 col-xs-3 center">
		                                	<div class="comment-avatar">
		                                		{{ HTML::image('profile/948dd322351c39ca6d44c585244afc05cdeb2302.jpg') }}
		                                	</div>
		                                	budi hariyana
		                                </div>
		                                <div class="col-md-10 col-xs-9">
		                                	<div class="comment-content">
		                                		comments
		                                	</div>
		                                	<div class="comment-data">
	                                			<div class="comment-data-item">
	                                				<div>
	                                					<i class="fa fa-calendar"></i> 
	                                				</div>
	                                				<span>25 November 2015</span>
	                                				<div>
	                                					<i class="fa fa-clock-o"></i> 
	                                				</div>
	                                				<span>01:00 pm</span>
	                                				<a href="#" class="btn btn-main btn-xs pull-right"><i class="fa fa-envelope"></i> </a>
	                                			</div>
		                                	</div>
		                                </div>
		                            </div>
			    				</div>
			    				<div class="comment-item">
			    					<div class="row">
		                                <div class="col-md-2 col-xs-3 center">
		                                	<div class="comment-avatar">
		                                		{{ HTML::image('profile/948dd322351c39ca6d44c585244afc05cdeb2302.jpg') }}
		                                	</div>
		                                	budi hariyana
		                                </div>
		                                <div class="col-md-10 col-xs-9">
		                                	<div class="comment-content">
		                                		comments
		                                	</div>
		                                	<div class="comment-data">
	                                			<div class="comment-data-item">
	                                				<div>
	                                					<i class="fa fa-calendar"></i> 
	                                				</div>
	                                				<span>25 November 2015</span>
	                                				<div>
	                                					<i class="fa fa-clock-o"></i> 
	                                				</div>
	                                				<span>01:00 pm</span>
	                                				<a href="#" class="btn btn-main btn-xs pull-right"><i class="fa fa-envelope"></i> </a>
	                                			</div>
		                                	</div>
		                                </div>
		                            </div>
			    				</div>
			    			</div>
			    			<div class="comment-form">
			    				<form id="form-comment" class="form">
		                            <div class="row">
		                                <div class="col-md-6">
		                                    <div class="form-group">
		                                        <label for="email">name</label>
		                                        <div class="input-group">
		                                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
		                                            <input type="text" class="form-control" id="name" placeholder="name">
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-6">
		                                    <div class="form-group">
		                                        <label for="email">email</label>
		                                        <div class="input-group">
		                                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
		                                            <input type="text" class="form-control" id="email" placeholder="email">
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-12">
		                                    <div class="form-group">
		                                        <label for="email">email</label>
		                                        <div class="input-group">
		                                            <div class="input-group-addon"><i class="fa fa-desktop"></i></div>
		                                            <input type="text" class="form-control" id="email" placeholder="website">
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="col-md-12">
		                                    <div class="form-group">
		                                        <label for="email">name</label>
		                                        <textarea name="message" class="form-control" id="email" placeholder="message"></textarea>
		                                    </div>
		                                    <div class="form-group">
		                                        <input type="submit" class="btn btn-main pull-right" value="send" />
		                                    </div>
		                                </div>
		                            </div>
		                        </form>
			    			</div>
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