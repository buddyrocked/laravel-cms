@extends('layouts.budi-layout.frontend')
@section('content')
<div class="section">
	<div id="home-service">
    	<div class="title-section animated" data-anim="fadeInDown">
    		<div class="text-main line">What I Do</div>
        	<div class="text-mute">We Design, Develop & Integrations.</div>
        </div>
        <div class="container">
        	<div class="row">
        		<div class="col-md-3">
        			<div class="service-item row animated" data-anim="fadeInLeft">
        				<div class="service-item-icon text-10x col-md-12">
        					<i class="fa fa-html5"></i>
        				</div>
        				<div class="service-item-content col-md-12">
        					<div>
	        					<div class="service-item-title">
	        						CMS WEBSITE
	        					</div>
	        				</div>
	        				<div>
        						Donec sed odio dui. malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.
        					</div>
        				</div>
        			</div>
        		</div>
        		<div class="col-md-3">
        			<div class="service-item row animated" data-anim="fadeInUp">
        				<div class="service-item-icon text-10x col-md-12">
        					<i class="fa fa-diamond"></i>
        				</div>
        				<div class="service-item-content col-md-12">
        					<div class="service-item-title">
        						INFORMARTION SYSTEM
        					</div>
	        				<div>
        						Donec sed odio dui. malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.
        					</div>
        				</div>
        			</div>
        		</div>
        		<div class="col-md-3">
        			<div class="service-item row animated" data-anim="fadeInUp">
        				<div class="service-item-icon text-10x col-md-12">
        					<i class="fa fa-google"></i>
        				</div>
        				<div class="service-item-content col-md-12">
        					<div>
	        					<div class="service-item-title">
	        						E-COMMERCE
	        					</div>
	        				</div>
	        				<div>
        						Donec sed odio dui. malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.
        					</div>
        				</div>
        			</div>
        		</div>
                <div class="col-md-3">
                    <div class="service-item row animated" data-anim="fadeInRight">
                        <div class="service-item-icon text-10x col-md-12">
                            <i class="fa fa-cubes"></i>
                        </div>
                        <div class="service-item-content col-md-12">
                            <div>
                                <div class="service-item-title">
                                    BRANDING & DESIGN
                                </div>
                            </div>
                            <div>
                                Donec sed odio dui. malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus.
                            </div>
                        </div>
                    </div>
                </div>
        	</div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="layer">
            <div class="layer-item layer-1 animated" data-anim="fadeInLeft">
                <div class="layer-content">
                    Donec sed odio dui. malesuada magna mollis euismod
                    Donec sed odio dui. malesuada magna mollis euismod
                </div>
                <div class="layer-info">
                    <div class="layer-title">Web Development</div>
                    
                    
                </div>
                <div class="perspective-container layer-image">
                    {{ HTML::image('assets/images/img5.png', '', ['class'=>'perspective no-shadow']) }}
                </div>
            </div>
            <div class="layer-item layer-2 animated" data-anim="fadeInRight">
                <div class="layer-info">
                    <div class="layer-title">Web Development</div>
                    <div class="layer-content">
                        Donec sed odio dui. malesuada magna mollis euismod
                    </div>
                    
                </div>
                <div class="perspective-container layer-image">
                    {{ HTML::image('assets/images/img2.png', '', ['class'=>'perspective no-shadow']) }}
                </div>
            </div>
            <div class="layer-item layer-3 animated" data-anim="fadeInDown">
                <div class="layer-info">
                    <div class="layer-title">Web Development</div>
                    <div class="layer-content">
                        Donec sed odio dui. malesuada magna mollis euismod
                    </div>
                    
                </div>
                <div class="perspective-container layer-image">
                    {{ HTML::image('assets/images/img4.png', '', ['class'=>'perspective no-shadow']) }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div id="product">
        <div class="title-section animated" data-anim="fadeInDown">
            <div class="text-main line">My Product</div>
            <div class="text-mute">We Design, Develop & Integrations.</div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </div>
</div>
@stop