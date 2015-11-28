<?php $start = microtime(true); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="BUDI HARIYANA CMS">
        <meta name="author" content="BUDI HARIYANA">
        <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

        <title>{{ (!empty($title)) ? $title : 'haha' }}</title>

        <!-- Bootstrap core CSS -->
        {{ HTML::style('assets/css/normalize.css') }}
        {{ HTML::style('assets/vendor/bootstrap/dist/css/bootstrap.css') }}
        {{ HTML::style('assets/css/font-awesome.min.css') }}
        {{ HTML::style('assets/vendor/sweetalert/lib/sweet-alert.css') }}
        {{ HTML::style('assets/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.css') }}
        {{ HTML::style('packages/mrjuliuss/syntara/assets/css/toggle-switch.css') }}
        {{ HTML::style('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}
        {{ HTML::style('assets/vendor/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css') }}
        {{ HTML::style('assets/vendor/nprogress/nprogress.css') }}
        {{ HTML::style('assets/vendor/morris/morris.css') }}
        {{ HTML::style('assets/vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}
        {{ HTML::style('assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}
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
            var baseUrl = "{{ Config::get('app.url') }}";
            var countPostByCategory = "{{ URL::route('posts-category') }}";
        </script>
        {{ HTML::script('assets/vendor/requirejs/require.js', array('data-main'=>Config::get('app.url').'/assets/app')); }}
        {{ HTML::script('assets/vendor/jquery/dist/jquery.js'); }}
        {{ HTML::script('assets/vendor/bootstrap/dist/js/bootstrap.js'); }}
        @include('layouts.budi-layout.script')        
        
    </head>

    <body>
        <div class="row-offcanvas">
            <div class="row-offcanvas-left" id="sidebar" role="navigation">
                <div class="profile">
                    <div class="profile-photo">
                        {{ HTML::image('profile/948dd322351c39ca6d44c585244afc05cdeb2302.jpg') }}
                        <div class="profile-control">
                            <div class="btn-group">
                                <a href="#" class=""><i class="fa fa-power-off"></i></a>
                                <a href="#" class=""><i class="fa fa-male"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--<div class="profile-name">{{ Sentry::getUser()->username }}</div>-->
                </div>
                <ul class="list-group">                    
                    @include('layouts.budi-layout.menu-item')
                </ul>
            </div>
            <div class="content">
                <div class="navbar navbar-custom" role="navigation">
                    <a href="#" class="btn-switch-menu" data-toggle="offcanvas">
                        <span class="icons-bar"></span>
                        <span class="icons-bar"></span>
                        <span class="icons-bar"></span>
                    </a>
                    <a class="navbar-brand" href="#"></a>    
                    <a href="#" class="navbar-btn-o pull-right open-notif" id="">
                        <!--<span class="notif">13</span>-->
                        <i class="fa fa-envelope-o"></i>
                    </a>     
                </div>
                <div class="notif-container">
                    <div class="notif-head">
                        <i class="fa fa-envelope-o"></i>  13 new messages
                    </div>
                    @include('layouts.budi-layout.comment')
                </div>

                <div id="shortcut">
                    <div id="shortcut-container">
                        
                    </div>
                </div>
                {{ Breadcrumbs::create($breadcrumb) }}                
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissable" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <i class="fa fa-volume-up fa-lg"></i> {{ Session::get('message') }}
                    </div>
                @endif   
                <div class="content-container">                   
                    @yield('content')              
                </div>  
            </div>              
        </div>

        <footer class="center col-md-12 col-xs-18">
            <p>&copy; {{ Config::get('app.siteName') }} 2013</p>
            <div>
                <?php
                    $end = microtime(true);
                    $creationtime = ($end - $start);
                    printf("Page created in %.6f seconds.", $creationtime);
                ?>
            </div>
        </footer>

    
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form">
                            <div class="form-group">
                                <label for="exampleInputEmail1">ID</label>
                                <input type="email" class="form-control col-sm-2" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Birthdate</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Gender</label>
                                <select class="form-control">
                                    <option>Pilih</option>
                                    <option>Female</option>
                                    <option>Male</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->



        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        
        <!--{{ HTML::script('assets/vendor/bootstrap/dist/js/bootstrap.js'); }}
        {{ HTML::script('assets/vendor/sweetalert/lib/sweet-alert.js'); }}      
        {{ HTML::script('assets/vendor/jqueryui/jquery-ui.js'); }}  
        {{ HTML::script('assets/vendor/jquery.tagsinput/jquery.tagsinput.js'); }}
        {{ HTML::script('assets/vendor/tinymce/tinymce.min.js'); }}
        {{ HTML::script('assets/js/masonry.pkgd.min.js') }}
        {{ HTML::script('assets/js/app.js'); }}
        {{ HTML::script('assets/js/budi-layout.js'); }}
        @include('layouts.budi-layout.script')-->
    </body>
</html>
