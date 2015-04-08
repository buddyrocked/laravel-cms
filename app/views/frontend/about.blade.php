@extends('layouts.budi-layout.frontend')
@section('content')
<div class="section" id="about">
	<div class="title-section animated" data-anim="fadeInDown">
		<div class="text-main line">About Me</div>
    	<div class="text-mute">Little Fun, Fact About Me.</div>
    </div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 center">
				<div class="about-pic animated" data-anim="rotateIn">
					{{ HTML::image('assets/images/c7aca4c80c89eb7d8a257fab6822fa9a_PicsArt_1383219124176.jpg') }}
				</div>
			</div>
			<div class="col-md-8">
				<div class="about-content animated" data-anim="zoomIn">
					My name is <span class="text-main text-bold">Budi Hariyana.</span> I'm Freelance Web Designer & Web Developer. I was born in Sukabumi located in Indonesia, I mean the capital city. I started to develop websites in 2008 with PHP based structure. I've been a freelance Web designer and Web developer since 2013. Gradually, I began to use HTML5 and CSS3 to design websites more responsive and user friendly. So I founded The Swan Design Studio in 2012 to achieve the high ability of developing which I needed. The professional experience in design, making fresh and creative ideas and advanced web programming made us dependable team for customers. All in all I love design and it shows in my works.
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