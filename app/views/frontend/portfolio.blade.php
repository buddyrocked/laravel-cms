@extends('layouts.budi-layout.frontend')
@section('content')
<div class="section">
	<div id="home-portfolio">
		<div class="title-section2-container center animated" data-anim="fadeInDown">
	        <div class="title-section2">
	            Our <span>Portfolio</span>
	        </div>
	        <div class="text-mute text-semibold">Our recent works and project.</div>
	    </div>
		<div class="container">
			<div class="row">
    			<div class="col-md-12 center">
    				<div class="grid">
						<figure class="effect-zoe animated" data-anim="zoomIn">
							<img src="assets/images/2.jpg" alt="img25"/>
							<figcaption>
								<h2>BKOM <span>Bandung</span></h2>
								<p class="icon-links">
									<a href="#"><i class="fa fa-desktop"></i></a>
								</p>
								<p class="description">Website BKOM Bandung is a Portal news and information center of BKOM Bandung. built with Yii Framework.</p>
							</figcaption>			
						</figure>
						<figure class="effect-zoe animated" data-anim="zoomIn">
							<img src="assets/images/8.jpg" alt="img25"/>
							<figcaption>
								<h2>Creative <span>Zoe</span></h2>
								<p class="icon-links">
									<a href="#"><i class="fa fa-desktop"></i></a>
								</p>
								<p class="description">Zoe never had the patience of her sisters. She deliberately punched the bear in his face.</p>
							</figcaption>			
						</figure>
						<figure class="effect-zoe animated" data-anim="zoomIn">
							<img src="assets/images/3.png" alt="img25"/>
							<figcaption>
								<h2>PT. <span>ARKINDO</span></h2>
								<p class="icon-links">
									<a href="#"><i class="fa fa-desktop"></i></a>
								</p>
								<p class="description">Automation Document Tender & Prequalification processing.</p>
							</figcaption>			
						</figure>
						<figure class="effect-zoe animated" data-anim="zoomIn">
							<img src="assets/images/4.jpg" alt="img25"/>
							<figcaption>
								<h2>Poltekkes <span>Bandung</span></h2>
								<p class="icon-links">
									<a href="#"><i class="fa fa-desktop"></i></a>
								</p>
								<p class="description">Attendance Application For Employee of Poltekkes Bandung.</p>
							</figcaption>			
						</figure>
						<figure class="effect-zoe animated" data-anim="zoomIn">
							<img src="assets/images/5.jpg" alt="img25"/>
							<figcaption>
								<h2>KPPN <span>Sukabumi</span></h2>
								<p class="icon-links">
									<a href="#"><i class="fa fa-desktop"></i></a>
								</p>
								<p class="description">Web Portal, news & information center about KPPN Sukabumi.</p>
							</figcaption>			
						</figure>
						<figure class="effect-zoe animated" data-anim="zoomIn">
							<img src="assets/images/6.jpg" alt="img25"/>
							<figcaption>
								<h2>Creative <span>Zoe</span></h2>
								<p class="icon-links">
									<a href="#"><i class="fa fa-desktop"></i></a>
								</p>
								<p class="description">Zoe never had the patience of her sisters. She deliberately punched the bear in his face.</p>
							</figcaption>			
						</figure>
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