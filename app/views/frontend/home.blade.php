@extends('layouts.budi-layout.frontend')
@section('content')
	<!-- LANDING PAGE -->

        <div id="home" class="section">
            <div id="home-pattern">
            	<div id="large-header" class="large-header">
					<canvas id="demo-canvas"></canvas>
				</div>
            </div>
            <div class="home-inner">
                <div class="">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="home-motto">
                                <div data-svg="headline" class="hides">
                                    <span class="text-width">Bdev</span>
                                    <h2 class="rw-sentence">
                                        <span>We Are</span>
                                        <div class="rw-words rw-words-1">
                                            <span>Software Solutions</span>
                                            <span>Hardware Solutions</span>
                                            <span>Hosting Provider</span>
                                            <span>Graphic Designer</span>
                                            <span>Computer Trainer</span>
                                            <span>Hosting Provider</span>
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
        					<div class="text-main text-bigger">Siapakah kami?</div> 
        					<div class="text-mute">Kami adalah developer perangkat lunak yang memberikan jasa pembuatan dan pengembangan perangkat lunak sebagai solusi untuk mengembangkan usaha anda.</div>
        				</div>
        			</div>
        			<div class="col-md-4">
        				<div id="mini-photo" class="animated text-center" data-anim="fadeInRight">
        					
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="section" id="home-about">
        	<div class="container">
        		<div class="row">
        			<div class="col-md-8">
        				<div class="home-about-image animated" data-anim="bounceInUp">
        					<!--{{ HTML::image('assets/images/img1.png', '', ['id'=>'gm1', 'class'=>'zoom', 'data-big'=>'assets/images/img1.png']) }} -->
        				</div>
        			</div>
        			<div class="col-md-4">
        				<div class="home-about-content">
        					<div class="title-section2-container animated" data-anim="fadeInDown">
				        		<div class="title-section2 inverse">
			                        Siapakah <span>kami</span>
			                    </div>
					        	<div class="text-white text-semibold">We Design, Develop & Integrations.</div>
					        </div>
        					<div class="content animated" data-anim="bounceInRight">
        						Kami adalah developer perangkat lunak yang memberikan jasa pembuatan dan pengembangan perangkat lunak sebagai solusi untuk mengembangkan usaha anda.
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
                        Apa yang kami kerjakan <span>We Do</span>
                    </div>
		        	<div class="text-mute text-semibold">We Design, Develop & Integrations.</div>
		        </div>
		        <div class="container">
		        	<div class="row">
		        		<div class="col-md-4">
		        			<div class="home-service-item row animated" data-anim="fadeInLeft">
		        				<div class="home-service-item-icon col-md-2 col-xs-2">
		        					<i class="fa fa-cube"></i>
		        				</div>
		        				<div class="home-service-item-content col-md-10 col-xs-10">
		        					<div class="home-service-img">
		        						{{ HTML::image('assets/images/bdev.jpg', '', ['id'=>'', 'class'=>'']) }}
		        					</div>
		        					<div class="home-service-item-title">
		        						Website Developer
		        					</div>
			        				<div class="home-service-item-text">
		        						Kami menyediakan layanan pembuatan website untuk membantu mengembang usaha anda.
		        					</div>
		        				</div>
		        			</div>
		        			<div class="home-service-item row animated" data-anim="fadeInLeft">
		        				<div class="home-service-item-icon col-md-2 col-xs-2">
		        					<i class="fa fa-server"></i>
		        				</div>
		        				<div class="home-service-item-content col-md-10 col-xs-10">
		        					<div class="home-service-img">
		        						{{ HTML::image('assets/images/bsupport.jpg', '', ['id'=>'', 'class'=>'']) }}
		        					</div>
		        					<div class="home-service-item-title">
		        						Mobil Apps Developer
		        					</div>
			        				<div class="home-service-item-text">
		        						Kami menyediakan layanan pengembangan perangkat lunak berbasis mobile (smartphone, tablet) agar kegiatan usaha anda lebih dinamis.
		        					</div>
		        				</div>
		        			</div>
		        		</div>
		        		<div class="col-md-4">
		        			<div class="home-service-item row animated" data-anim="fadeInDown">
		        				<div class="home-service-item-icon col-md-2 col-xs-2">
		        					<i class="fa fa-cloud"></i>
		        				</div>
		        				<div class="home-service-item-content col-md-10 col-xs-10">		        					
		        					<div class="home-service-img">
		        						{{ HTML::image('assets/images/bcloud.jpg', '', ['id'=>'', 'class'=>'']) }}
		        					</div>
		        					<div class="home-service-item-title">
		        						BCloud
		        					</div>
			        				<div class="home-service-item-text">
		        						Hosting Provider
		        					</div>
		        				</div>
		        			</div>
		        		</div>
		        		<div class="col-md-4">
		        			<div class="home-service-item row animated" data-anim="fadeInRight">
		        				<div class="home-service-item-icon col-md-2 col-xs-2">
		        					<i class="fa fa-camera"></i>
		        				</div>
		        				<div class="home-service-item-content col-md-10 col-xs-10">
		        					<div class="home-service-img">
		        						{{ HTML::image('assets/images/bdsim.jpg', '', ['id'=>'', 'class'=>'']) }}
		        					</div>
		        					<div class="home-service-item-title">
		        						BDism
		        					</div>
			        				<div class="home-service-item-text">
		        						Graphic Design
		        					</div>
		        				</div>
		        			</div>
		        			<div class="home-service-item row animated" data-anim="fadeInRight">
		        				<div class="home-service-item-icon col-md-2 col-xs-2">
		        					<i class="fa fa-desktop"></i>
		        				</div>
		        				<div class="home-service-item-content col-md-10 col-xs-10">
		        					<div class="home-service-img">
		        						{{ HTML::image('assets/images/bdemy.jpg', '', ['id'=>'', 'class'=>'']) }}
		        					</div>
		        					<div class="home-service-item-title">
		        						BDemy
		        					</div>
			        				<div class="home-service-item-text">
		        						Computer & Software Training
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
                        Our <span>Clients</span>
                    </div>
	        	<div class="text-mute text-semibold">Our Partners & Clients.</div>
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
	        		{{ HTML::image('images/bkom.jpg', '', ['class'=>'grayscale']) }}
	        	</li>
	        	<li>
	        		{{ HTML::image('images/client5.png', '', ['class'=>'grayscale']) }}
	        	</li>
	        </ul>
	    </div>
	</div>
@stop