@extends('layouts.budi-layout.frontend')
@section('content')
	<!-- LANDING PAGE -->
        <div id="home" class="section">
            <div id="home-pattern"></div>
            <div class="home-inner">
                <div class="">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="home-motto">
                                <div data-svg="headline" class="hides">
                                    <span class="text-width">Budi Hariyana</span>
                                    <h2 class="rw-sentence">
                                        <span>Web</span>
                                        <div class="rw-words rw-words-1">
                                            <span>Designer</span>
                                            <span>Developer</span>
                                            <span>Designer</span>
                                            <span>Developer</span>
                                            <span>Designer</span>
                                            <span>Developer</span>
                                        </div>
                                    </h2>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            
                        </div>
                    </div>
                </div>
            </div>     
        </div>
    	<div id="home-profile">
        	<div class="container">
        		<div class="row">
        			<div class="col-md-8">
        				<div id="mini-profile" class="animated" data-anim="fadeInLeft">
        					<div class="text-main text-bigger">Hello, my name Budi Hariyana.</div> 
        					<div class="text-mute">I am web designer and Web Developer from Bandung, Indonesia.</div>
        				</div>
        			</div>
        			<div class="col-md-4">
        				<div id="mini-photo" class="animated text-center" data-anim="fadeInRight">
        					<a href="#" class="btn btn-main"><i class="fa fa-arrow-circle-down"></i> about me</a>
        					<a href="#" class="btn btn-main"><i class="fa fa-envelope"></i> contact me</a>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="section" id="home-about">
        	<div class="">
        		<div class="row">
        			<div class="col-md-8 no-padding">
        				<div class="home-about-image animatedx" data-anim="bounceInUp">
        					{{ HTML::image('assets/images/img1.png', '', ['id'=>'gm1', 'class'=>'zoomx', 'data-big'=>'assets/images/img1.png']) }}
        				</div>
        			</div>
        			<div class="col-md-4 no-padding">
        				<div class="home-about-content">
        					<div class="title-section2-container animated" data-anim="fadeInDown">
				        		<div class="title-section2 inverse">
			                        Welcome To My <span>Page</span>
			                    </div>
					        	<div class="text-white text-semibold">We Design, Develop & Integrations.</div>
					        </div>
        					<div class="content animated" data-anim="bounceInRight">
        						Donec sed odio dui. malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.
        						Donec sed odio dui. malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.
        						Donec sed odio dui. malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.
        						Donec sed odio dui. malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.
        					</div>
        					<div class="animated" data-anim="bounceInUp">
        						{{ HTML::image('assets/images/arrow3.png', '', ['id'=>'', 'class'=>'']) }}
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="section" id="home-service">
        	<div>
	        	<div class="title-section2-container center animated" data-anim="fadeInDown">
	        		<div class="title-section2">
                        What I <span>Do</span>
                    </div>
		        	<div class="text-mute text-semibold">We Design, Develop & Integrations.</div>
		        </div>
		        <div class="container">
		        	<div class="row">
		        		<div class="col-md-4">
		        			<div class="home-service-item row animated" data-anim="fadeInLeft">
		        				<div class="home-service-item-icon col-md-2 col-xs-2">
		        					<i class="fa fa-diamond"></i>
		        				</div>
		        				<div class="home-service-item-content col-md-10 col-xs-10">
		        					<div class="home-service-item-title">
		        						Content Management System
		        					</div>
			        				<div class="home-service-item-text">
		        						Donec sed odio dui. malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.
		        					</div>
		        				</div>
		        			</div>
		        			<div class="home-service-item row animated" data-anim="fadeInLeft">
		        				<div class="home-service-item-icon col-md-2 col-xs-2">
		        					<i class="fa fa-user-md"></i>
		        				</div>
		        				<div class="home-service-item-content col-md-10 col-xs-10">
		        					<div class="home-service-item-title">
		        						E-commerce
		        					</div>
			        				<div class="home-service-item-text">
		        						Donec sed odio dui. malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.
		        					</div>
		        				</div>
		        			</div>
		        		</div>
		        		<div class="col-md-4">
		        			<div class="home-service-item animated" data-anim="fadeInUp">
		        				<div class="home-service-img perspective-container">
		        					{{ HTML::image('assets/images/img1.png', '', ['class'=>'perspective']) }}
		        				</div>
		        			</div>
		        		</div>
		        		<div class="col-md-4">
		        			<div class="home-service-item row animated" data-anim="fadeInRight">
		        				<div class="home-service-item-icon col-md-2 col-xs-2">
		        					<i class="fa fa-html5"></i>
		        				</div>
		        				<div class="home-service-item-content col-md-10 col-xs-10">
		        					<div class="home-service-item-title">
		        						Information System
		        					</div>
			        				<div class="home-service-item-text">
		        						Donec sed odio dui. malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.
		        					</div>
		        				</div>
		        			</div>
		        			<div class="home-service-item row animated" data-anim="fadeInRight">
		        				<div class="home-service-item-icon col-md-2 col-xs-2">
		        					<i class="fa fa-desktop"></i>
		        				</div>
		        				<div class="home-service-item-content col-md-10 col-xs-10">
		        					<div class="home-service-item-title">
		        						Branding & Design
		        					</div>
			        				<div class="home-service-item-text">
		        						Donec sed odio dui. malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.
		        					</div>
		        				</div>
		        			</div>
		        		</div>
		        	</div>
		        </div>
		    </div>
        </div> 
    </div>
    <div class="section" id="home-partner">
        <div class="container">
	    	<div class="title-section2-container center animated" data-anim="fadeInDown">
	        		<div class="title-section2">
                        My <span>Clients</span>
                    </div>
	        	<div class="text-mute text-semibold">My Partner & Clients.</div>
	        </div>
	        <ul class="partner-list  animated" data-anim="fadeInUp">
	        	<li>
	        		{{ HTML::image('images/client1.png', '', ['class'=>'grayscale']) }}
	        	</li>
	        	<li>
	        		{{ HTML::image('images/client2.png', '', ['class'=>'grayscale']) }}
	        	</li>
	        	<li>
	        		{{ HTML::image('images/client3.png', '', ['class'=>'grayscale']) }}
	        	</li>
	        	<li>
	        		{{ HTML::image('images/client4.png', '', ['class'=>'grayscale']) }}
	        	</li>
	        	<li>
	        		{{ HTML::image('images/client5.png', '', ['class'=>'grayscale']) }}
	        	</li>
	        </ul>
	    </div>
	</div>
@stop