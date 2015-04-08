<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <link rel="icon" href="../../favicon.ico">

    	<title>LARAVEL BUDI</title>
		{{ HTML::style('assets/vendor/bootstrap/dist/css/bootstrap.css'); }}
		{{ HTML::style('assets/vendor/sweetalert/lib/sweet-alert.css'); }}
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	    <style type="text/css">
	    	.content {
	    		margin-top: 150px;
	    	}

	    	.input-file {
	    		
	    	}

	    	.input-file:before {
	    		
	    	}

	    	
	    </style>
	</head>
	<body>
	    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	      	<div class="container">
	        	<div class="navbar-header">
		          	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
		          	</button>
		          	<a class="navbar-brand" href="#">{{ Route::currentRouteName() }}</a>
		        </div>
	        	<div class="collapse navbar-collapse">
		          	<ul class="nav navbar-nav">
			            <li class="active">{{ HTML::link(URL::to('user'), 'USER') }}</li>
			            <li>{{ HTML::link(URL::to('posts'), 'POST') }}</li>
		          	</ul>
		          	<ul class="nav navbar-nav pull-right">
		          		@if(Sentry::check())
			            <li>{{ HTML::link(URL::to('logout'), 'LOGOUT') }}</li>
			            <li class="pull-right"><a>LOGIN AS  {{{ strtoupper(Sentry::getUser()->email) }}}</a><li>
			            @endif
		          	</ul>
	        	</div><!--/.nav-collapse -->
	      	</div>
	    </div>
	    <div class="content">
		    <div class="container">
				<h1>LARAVEL LAYOUT</h1>
				@if(Session::has('message'))
					<div class="alert alert-success alert-dismissable" role="alert">
						<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						{{ Session::get('message') }}
					</div>
				@endif
				
				@yield('content')
			</div>
		</div>
		{{ HTML::script('assets/vendor/jquery/dist/jquery.js'); }}
		{{ HTML::script('assets/vendor/bootstrap/dist/js/bootstrap.js'); }}
		{{ HTML::script('assets/vendor/sweetalert/lib/sweet-alert.js'); }}
		{{ HTML::script('assets/js/app.js'); }}
	</body>
</html>