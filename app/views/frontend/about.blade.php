@extends('layouts.budi-layout.frontend')
@section('content')
<div class="section" id="about">
	<div class="title-section2-container center animated" data-anim="fadeInDown">
        <div class="title-section2">
            About <span>Us</span>
        </div>
        <div class="text-mute text-semibold">All About Us.</div>
    </div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 center">
				<div class="about-pic animated" data-anim="rotateIn">
					{{ HTML::image('assets/images/c7aca4c80c89eb7d8a257fab6822fa9a_PicsArt_1383219124176s.jpg') }}
				</div>
			</div>
			<div class="col-md-8">
				<div class="about-content animated" data-anim="zoomIn">
					<span class="text-main text-bold">PT. Berkah Developer Solution.</span> adalah sebuah perusahaan yang bergerak di bidang teknologi informasi. 
					Selain membuat dan mengembangkat perangkat lunak, BDev juga melayani jasa pembuatan website dan aplikasi mobile. Focus utama BDev adalah menjadi solusi penyedia sistem informasi yang handal untuk kegiatan bisnis maupun perorangan.
				</div>
				<div class="">
    				<div class="animated" data-anim="fadeInRight">
    					 <a href="#" class="btn btn-main btn-lg pull-right"><i class="fa fa-envelope"></i> Get In Touch</a>
    				</div>
    			</div>
			</div>
		</div>
	</div>
</div>
@stop