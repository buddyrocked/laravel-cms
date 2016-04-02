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
	                        Welcome to B-DEV
	                    </div>
			        	<div class="text-white text-semibold">Bdev Solution</div>
			        </div>
					<div class="content animated" data-anim="bounceInRight">
						We are ...
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section" id="about">
	<div class="title-section2-container center animated" data-anim="fadeInDown">
        <div class="title-section2">
            Our Team
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