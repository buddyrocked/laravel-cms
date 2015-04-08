<?php $start = microtime(true); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

        <title>{{ (!empty($title)) ? $title : 'haha' }}</title>

        <!-- Bootstrap core CSS -->
        {{ HTML::style('assets/css/normalize.css') }}
        {{ HTML::style('assets/vendor/bootstrap/dist/css/bootstrap.css'); }}
        {{ HTML::style('assets/css/font-awesome.min.css') }}
        {{ HTML::style('assets/vendor/sweetalert/lib/sweet-alert.css'); }}
        {{ HTML::style('assets/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.css'); }}

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
        {{ HTML::script('assets/vendor/requirejs/require.js', array('data-main'=>'http://budihariyana.com/assets/app')); }}
        {{ HTML::script('assets/vendor/jquery/dist/jquery.js'); }}
        {{ HTML::script('assets/vendor/bootstrap/dist/js/bootstrap.js'); }}
        @include('layouts.budi-layout.script')
        
        
    </head>

    <body>
        <div class="navbar navbar-custom" role="navigation">
            <a href="#" class="btn-switch-menu" data-toggle="offcanvas">
                <span class="icons-bar"></span>
                <span class="icons-bar"></span>
                <span class="icons-bar"></span>
            </a>
            <a class="navbar-brand" href="#">{{ Config::get('app.siteName') }}</a>
            
        </div>

        <div class="">
            <div class="row row-offcanvas row-offcanvas-left">
                <div class="sidebar-offcanvas" role="navigation">
                    <ul class="list-group">
                        <li>
                            <a href="#" class="list-group-item">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle green fa-stack-2x"></i>
                                    <i class="fa fa-male fa-stack-1x fa-inverse"></i>
                                </span>
                                <div>Profile</div>
                            </a>
                            <ul class="sub-group">
                                <div><i class="fa fa-male"></i> {{{ Sentry::getUser()->first_name }}}</div>
                                <div class="profile">
                                    <div class="profile-photo">
                                        {{ HTML::image('assets/images/c7aca4c80c89eb7d8a257fab6822fa9a_PicsArt_1383219124176.jpg') }}
                                        <div class="profile-control">
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-default"><i class="fa fa-power-off"></i></a>
                                                <a href="#" class="btn btn-default"><i class="fa fa-male"></i></a>
                                            </div>
                                        </div>
                                        <div class="profile-stat">
                                            <div class="profile-stat-item">
                                                <a href="#"><i class="fa fa-newspaper-o"></i> 87</a>
                                                <div>Articles</div>
                                            </div>
                                            <div class="profile-stat-item">
                                                <a href="#"><i class="fa fa-twitch"></i> 7</a>
                                                <div>Messages</div>
                                            </div>
                                            <div class="profile-stat-item">
                                                <a href="#"><i class="fa fa-volume-up"></i> 187</a>
                                                <div>Comments</div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="list-group-item">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle green fa-stack-2x"></i>
                                    <i class="fa fa-bar-chart fa-stack-1x fa-inverse"></i>
                                </span>
                                <div>Dashboard</div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="list-group-item active">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle green fa-stack-2x"></i>
                                    <i class="fa fa-newspaper-o fa-stack-1x fa-inverse"></i>
                                </span>
                                <div>CMS</div>
                            </a>
                            <ul class="sub-group">
                                <div><i class="fa fa-newspaper-o"></i> CMS</div>
                                <li><a href="{{ URL::route('category-list') }}"><i class="fa fa-th"></i> Category</a></li>
                                <li><a href="{{ URL::route('posts-list') }}"><i class="fa fa-th"></i> Post</a></li>
                                <li><a href="{{ URL::route('tag-list') }}"><i class="fa fa-th"></i> Tag</a></li>
                                <li><a href="{{ URL::route('album-list') }}"><i class="fa fa-th"></i> Album Gallery</a></li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="list-group-item">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle green fa-stack-2x"></i>
                                    <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                                </span>
                                <div>E-commerce</div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="list-group-item">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle green fa-stack-2x"></i>
                                    <i class="fa fa-rocket fa-stack-1x fa-inverse"></i>
                                </span>
                                <div>Setting</div>
                            </a>
                            <ul class="sub-group">
                                <div><i class="fa fa-th-large"></i> Setting</div>
                                <li><a href="{{ URL::route('listUsers') }}"><i class="fa fa-th"></i> {{ trans('syntara::navigation.users') }}</a></li>
                                <li><a href="{{ URL::route('listGroups') }}"><i class="fa fa-th"></i> {{ trans('syntara::navigation.groups') }}</a></li>
                                <li><a href="{{ URL::route('listPermissions') }}"><i class="fa fa-th"></i> {{ trans('syntara::navigation.permissions') }}</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ URL::to('logout') }}" class="list-group-item external-link">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle green fa-stack-2x"></i>
                                    <i class="fa fa-power-off fa-stack-1x fa-inverse"></i>
                                </span>
                                <div>Logout</div>
                            </a>
                        </li>
                    </ul>
                </div><!--/span-->

                <div class="col-xs-18 col-sm-12 content">
                    <div id="shortcut">
                        <div id="shortcut-container">
                            <div class="col-md-4">
                                <span class="chart" id="chart1" data-percent="1086">
                                    <span class="percent">186</span>
                                </span>
                            </div>
                            <div class="col-md-4">
                                <div class="chart" id="chart2" data-percent="73">
                                    <span class="percent">86</span>
                                </div>  
                            </div>
                            <div class="col-md-4">
                                <div class="chart" id="chart3" data-percent="73">
                                    <span class="percent">86</span>
                                </div>
                            </div>
                        </div>
                        <div id="shortcut-control">
                            <a href="#" class="" id="open-shortcut"><i class="fa fa-chevron-down"></i></a>   
                        </div>
                    </div>

                    <!--<ol class="breadcrumb">
                        <li><a href="#">Data</a></li>
                        <li><a href="#">Reference</a></li>
                        <li class="active">User</li>
                    </ol>-->

                    {{ Breadcrumbs::create($breadcrumb) }}
                    
                    @if(Session::has('message'))
                        <div class="alert alert-success alert-dismissable" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="box">
                        <div class="box-head">
                            <h2 class="upper"><i class="fa fa-home"></i><span class="break"></span><strong>{{ (!empty($title)) ? $title : 'Dashboard' }}</strong></h2>
                            
                        </div>
                        
                        <div class="box-body">      
                            @yield('content')
                       </div>
                    </div>

                </div><!--/span-->                
            </div><!--/row-->

            <hr>

            <footer class="center">
                <p>&copy; {{ Config::get('app.siteName') }} 2013</p>
                <div>
                    <?php
                        $end = microtime(true);
$creationtime = ($end - $start);
printf("Page created in %.6f seconds.", $creationtime);
                    ?>
                </div>
            </footer>

        </div><!--/.container-->
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
        
        
    </body>
</html>
