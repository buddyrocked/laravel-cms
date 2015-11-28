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
					<div class="title-section2-container animated" data-anim="fadeInDown">
		        		<div class="title-section2 inverse">
	                        Welcome to <span>B-DEV</span>
	                    </div>
			        	<div class="text-white text-semibold">PT. Berkah Developer Solution</div>
			        </div>
					<div class="content animated" data-anim="bounceInRight">
						PT. Berkah Developer Solution adalah sebuah perusahaan yang bergerak di bidang teknologi informasi. PT. Berkah Developer Solution memiliki core bisnis utama yaitu Pengembangan perangkat lunak dan website, Perbaikan hardware, Sewa Hosting, Desain grafis, Pelatihan komputer.
					</div>
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
        <div class="row">
            <div class="col-md-4">
                <div class="process">
                    <div class="process-icon">
                        <i class="human-businessman52"></i>
                    </div>
                    <div class="process-title">
                        Tell Us Your Idea and Business
                    </div>
                    <div class="process-content">
                         Tell us your idea by describing it to us and we will give the best suggestion to ensure the success of your idea into reality.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="process">
                    <div class="process-icon">
                        <i class="human-male111"></i>
                    </div>
                    <div class="process-title">
                        We Help Build Your Idea
                    </div>
                    <div class="process-content">
                        After introducing our developer or team to you, then we can start the project while you can always contact them directly to consult everyday about the work.
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="process">
                    <div class="process-icon">
                        <i class="human-businessman53"></i>
                    </div>
                    <div class="process-title">
                        Run Your Business or Idea and Get Profit.
                    </div>
                    <div class="process-content">
                         Tell us your idea by describing it to us and we will give the best suggestion to ensure the success of your idea into reality.
                    </div>
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