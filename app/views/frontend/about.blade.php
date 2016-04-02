@extends('layouts.budi-layout.frontend')
@section('content')
<div class="section" id="about-section">
	<div id="home-pattern">
    	<div id="large-header" class="large-header">
			<canvas id="demo-canvas"></canvas>
		</div>
    </div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-8">
				<div class="about-section-content">
					
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section">
    <div class="container">
    	<div class="title-section2-container center animated" data-anim="fadeInDown">
	        <div class="title-section2">
	            Our Business <span>Process</span>
	        </div>
	        <div class="text-mute text-semibold">Our Business Process.</div>
	    </div>
        <div class="layer">
            <div class="layer-item layer-1 animated" data-anim="fadeInLeft">
                <div class="layer-content">
                    <i class="fa fa-lightbulb-o fa-lg fa-2x"></i> Tell us your idea by describing it to us and we will give the best suggestion to ensure the success of your idea into reality.
                </div>
                <div class="layer-info">
                    <div class="layer-title">Web Development</div>
                </div>
                <div class="perspective-container layer-image">
                    {{ HTML::image('assets/images/img6.png', '', ['class'=>'perspective no-shadow']) }}
                </div>
            </div>
            <div class="layer-item layer-2 animated" data-anim="fadeInRight">
                <div class="layer-info">
                    <div class="layer-title">Web Development</div>
                    <div class="layer-content">
                        <i class="fa fa-code fa-lg fa-2x"></i> Execute the idea. We turn your ideas and needs to be reality. We develope with clean & high quality code.
                    </div>
                    
                </div>
                <div class="perspective-container layer-image">
                    {{ HTML::image('assets/images/img5.png', '', ['class'=>'perspective no-shadow']) }}
                </div>
            </div>
            <div class="layer-item layer-3 animated" data-anim="fadeInDown">
                <div class="layer-info">
                    <div class="layer-title">Web Development</div>
                    <div class="layer-content">
                        <i class="fa fa-trophy fa-lg fa-2x"></i> Run your business and get profit.
                    </div>
                    
                </div>
                <div class="perspective-container layer-image">
                    {{ HTML::image('assets/images/img4.png', '', ['class'=>'perspective no-shadow']) }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section" id="about">
	<div class="title-section2-container center animated" data-anim="fadeInDown">
        <div class="title-section2">
            Our <span>Team</span>
        </div>
        <div class="text-mute text-semibold">Meet Our Team.</div>
    </div>
	<div class="container">
		<div class="row">
			@foreach($staffs as $staff)
			<div class="col-md-2">
				<div class="hexagon  animated" data-anim="fadeInDown" style="background-image: url({{ url('/') }}/profile/thumb_{{ $staff->file }})">
				  	<div class="hexTop"></div>
				  	<div class="hexBottom"></div>
				  	<div class="team-name text-center">
				  		<div>{{ $staff->name }}</div>
				  		<div class="team-position">{{ $staff->position->name }}</div>
				  		<div class="teamTop"></div>
				  		<div class="teamBottom"></div>
				  	</div>
				</div>				
			</div>
			@endforeach		
		</div>
	</div>
</div>
@stop