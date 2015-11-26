@extends('layouts.budi-layout.frontend')
@section('content')
<div class="section">
	<div id="home-portfolio">
		<div class="title-section2-container center animated" data-anim="fadeInDown">
	        <div class="title-section2">
	            Our <span>Contact</span>
	        </div>
	        <div class="text-mute text-semibold">Our Contact.</div>
	    </div>
		<div class="container">
			<div class="row">
    			<div class="col-md-12 center">
    				<div id="map-section">
    					
					</div>
    			</div>
    		</div>
		</div>
		
	</div>
</div>
<div class="section">
<div class="container">
	<div class="row">
        <div class="col-md-6">
            <div class="title-section2-container animated" data-anim="fadeInDown">
                 <div class="title-section2">
		            Our <span>Office</span>
		        </div>
		        <div class="text-mute text-semibold">Our Contact.</div>
            </div>
            <div id="">
                <div class="">
                    Jln. Kh. Soleh Iskandar Km. 8 No. 10 <br />
                    Kota Bogor Jawa Barat
                </div>
                <div class="">
                    {{ Config::get('cms.phone') }} <br />
                </div>
                <div class="">
                    {{ Config::get('cms.email') }} <br />
                </div>
                <div class="">
                    &nbsp;
                </div>
                <div class="">
                    {{ HTML::image('images/logo-text.png') }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="title-section2-container animated" data-anim="fadeInDown">
                 <div class="title-section2">
		            Email <span>Us</span>
		        </div>
		        <div class="text-mute text-semibold">Feel free to talk with us.</div>
            </div>
            {{ Form::open(array('route'=>'email-us', 'method'=>'POST', 'class'=>'form', 'id'=>'form-contact2')) }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">name</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" name="name" class="form-control" required="required" id="name" placeholder="name">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">email</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                <input type="text" name="email" class="form-control" required="required" id="email" placeholder="email">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">email</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-heart"></i></div>
                                <input type="text" name="subject" class="form-control" required="required" id="subject" placeholder="subject">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email">name</label>
                            <textarea name="content" class="form-control" required="required" id="content" placeholder="message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-main pull-right" value="send" />
                        </div>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

</div>
@stop