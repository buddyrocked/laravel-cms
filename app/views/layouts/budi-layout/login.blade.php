<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>{{ (!empty($title)) ? $title : 'Login Page' }}</title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style('assets/css/normalize.css') }}
    {{ HTML::style('assets/vendor/bootstrap/dist/css/bootstrap.css'); }}
    {{ HTML::style('assets/css/font-awesome.min.css') }}
    {{ HTML::style('assets/vendor/sweetalert/lib/sweet-alert.css'); }}

    <!-- Custom styles for this template -->
    {{ HTML::style('assets/css/style.css') }}

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script>
        var url_tag = "{{ URL::route('tag_autocomplete') }}";
        var path = "{{ public_path() }}";
        var baseUrl = 'http://budihariyana.com';
    </script>
    </head>

    <body id="login-body">
        <div class="navbar" role="navigation">
            <a href="#" class="btn-switch-menu">
                <span class="icons-bar"></span>
                <span class="icons-bar"></span>
                <span class="icons-bar"></span>
            </a>   
            
        </div>
        <div class="container">                      
            @yield('content')
        </div>
        {{ HTML::script('assets/vendor/requirejs/require.js', array('data-main'=>'http://budihariyana.com/assets/app')); }}
        {{ HTML::script('assets/vendor/jquery/dist/jquery.js'); }}
        {{ HTML::script('assets/vendor/bootstrap/dist/js/bootstrap.js'); }}
    </body>
</html>
