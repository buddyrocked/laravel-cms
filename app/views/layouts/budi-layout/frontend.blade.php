<!DOCTYPE html>
<html lang="en" class="demo-loading no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="robots" content="index, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta lang="id" name="description" content="{{ $description }}">
        <meta lang="id" name="keywords" content="{{ $keywords }}" />
        <meta name="author" content="{{ $author }}">
        <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

        <title>{{ $title }}</title>

        <!-- Bootstrap core CSS -->
        {{ HTML::style('assets/css/normalize.css') }}
        {{ HTML::style('assets/vendor/bootstrap/dist/css/bootstrap.css') }}
        {{ HTML::style('assets/css/font-awesome.min.css') }}
        {{ HTML::style('assets/css/human.css'); }}
        {{ HTML::style('assets/vendor/animate.css/animate.css'); }}
        {{ HTML::style('assets/css/front.css') }}
        {{ HTML::script('assets/vendor/jquery/dist/jquery.js'); }}

       
        <!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Ruluko|Sirin+Stencil">-->
        
        
        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <!-- Custom styles for this template -->
    </head>
    <body>
        <div id="trigger"></div>
        <div class="navbar-wrapper">
            <div class="header">
                <div id="navbar-info">
                    <div class="container">
                        <div class="row">
                            <div class="navbar-info-item">
                                <span class="navbar-info-icon"><i class="fa fa-phone"></i></span> <span class="text-muted"> {{ Config::get('cms.phone') }}</span> 
                            </div>
                            <div class="navbar-info-item">
                                <span class="navbar-info-icon"><i class="fa fa-envelope"></i></span> <span class="text-muted"> {{ Config::get('cms.email') }}</span> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar" role="navigation" id="navigations">
                    <div class="container">
                        <a class="navbar-brand center" href="#">                       
                            {{ HTML::image('images/blogo.png') }}
                        </a>
                        <ul class="nav navbar-nav cl-effect-5 pull-right" id="navigation2">
                            <li class="visible-xs" id="nav-control">
                                <a href="#" class="text-right">
                                    <span data-hover="">
                                        <i class="fa fa-bars"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="@if (Route::currentRouteName() == 'home') current @endif">
                                <a href="{{ URL::route('home') }}" class="hover-effect">
                                    <span data-hover="Home">Beranda</span>
                                </a>
                            </li>
                            <li class="@if (Route::currentRouteName() == 'service') current @endif">
                                <a href="{{ URL::route('service') }}" class="hover-effect">
                                    <span data-hover="Product & Services">Produk & Layanan</span>
                                </a>
                            </li>
                            <li class="@if (Route::currentRouteName() == 'about') current @endif">
                                <a href="{{ URL::route('about') }}" id="link-services" class="hover-effect">
                                    <span data-hover="About Us">Tentang Kami</span>
                                </a>
                            </li>
                            <li  class="@if (Route::currentRouteName() == 'portfolio') current @endif">
                                <a href="{{ URL::route('portfolio') }}" class="hover-effect">
                                    <span data-hover="Portfolio">Portfolio</span>
                                </a>
                            </li>
                            <li class="@if (Route::currentRouteName() == 'blog' || Route::currentRouteName() == 'read') current @endif">
                                <a href="{{ URL::route('blog') }}" class="hover-effect">
                                    <span data-hover="Blog">Blog</span>
                                </a>
                            </li>
                            <li class="@if (Route::currentRouteName() == 'contact') current @endif">
                                <a href="{{ URL::route('contact') }}" class="hover-effect">
                                    <span data-hover="Contact Us">Hubungi Kami</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-content">
            @yield('content')
        </div>    
        <div id="home-affiliate">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div id="cloud-container">
                            <div id="cloud" class="animated" data-anim="fadeInTop"></div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div id="mini-profile" class="animated text-bigger" data-anim="fadeInLeft">
                            <span class="text-main">Be Wonderfull, </span> <span class="text-mute">Success will come by it self.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div id="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="footer-title">
                                Alamat Kantor <span></span>
                            </div>
                            <div id="footer-address">
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
									<div>
										BDev adalah merk dagang dari PT. Berkah Developer Solution
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer-title">
                                Other <span>Links</span>
                            </div>
                            <div class="footer-link">
                                <a href="{{ URL::route('home') }}">Help</a>
                            </div>
                            <div class="footer-link">
                                <a href="{{ URL::route('home') }}">Frequently Asked Questions</a>
                            </div>
                            <div class="footer-link">
                                <a href="{{ URL::route('home') }}">Login to CPanel</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-title">
                                Contact <span>Us</span>
                            </div>
                            {{ Form::open(array('route'=>'email-us', 'method'=>'POST', 'class'=>'form', 'id'=>'form-contact')) }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Nama</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                                <input type="text" name="name" class="form-control" required="required" id="name" placeholder="Nama">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                                <input type="text" name="email" class="form-control" required="required" id="email" placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Judul</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-heart"></i></div>
                                                <input type="text" name="subject" class="form-control" required="required" id="subject" placeholder="Judul">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="email">Pesan</label>
                                            <textarea name="content" class="form-control" required="required" id="content" placeholder="Pesan"></textarea>
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
            <div id="footer-bottom">
                <div class="container">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
        </footer>
        <a href="#" class="totop btn btn-main">
            <i class="fa fa-chevron-up"></i>
        </a>
        <a href="#" class="tobotom btn btn-main">
            <i class="fa fa-chevron-down"></i>
        </a>
        <ul id="nav-section"></ul>
    
    
    
    
    {{ HTML::script('assets/vendor/bootstrap/dist/js/bootstrap.js'); }}
    {{ HTML::script('assets/vendor/jquery.parallax/jquery.parallax.js'); }}
    {{ HTML::script('assets/vendor/jquery.scrollTo/jquery.scrollTo.js'); }}
    {{ HTML::script('assets/js/jquery.nav.js'); }}
    {{ HTML::script('assets/js/classie.js'); }}
    {{ HTML::script('assets/js/jquery.mlens-1.3.min.js'); }}
    {{ HTML::script('assets/vendor/holderjs/holder.js'); }}
    {{ HTML::script('assets/js/TweenLite.min.js'); }}
    {{ HTML::script('assets/js/EasePack.min.js'); }}
    {{ HTML::script('assets/js/rAF.js'); }}
    {{ HTML::script('assets/js/demo-1.js'); }}
    
    
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgA9x1eyjMKLAln_0LTAkMPcIJFC0M9os">
        </script>
    <script>

        var s, 
        APP = {
            settings: {
                homeElement:$('#home'),
                mapElement: $('#map'),
                sectionElement: $('.section'),
                containerSectionElement: $('#nav-section'),
                gmap:{
                    element: $('#map-section'),
                    latitude: -6.555209,
                    longitude:  106.777140
                },
                toTopNav:$('.totop'),
                toBottomNav:$('.tobotom'),
            },

            init:function(){
                s = this.settings;                
                this.generateElement();
                this.bindUIActions();
                this.generateMap();

                google.maps.event.addDomListener(window, "load", this.generateMap);
            },

            generateElement:function(){
                s.sectionElement.each(function(i, e){
                    s.containerSectionElement.append('<li><a href="#' + $(this).attr('id') + '">&nbsp;</a></li>');
                });

                //this.generateMap();

                s.homeElement.parallax("20%", 0.1);

                if(s.homeElement.length == 0 ){
                    jQuery('#navigations').addClass('color-full');
                    jQuery('#navbar-info').addClass('active');
                    s.toBottomNav.hide();
                }else{
                    var scrollBody = jQuery(window).scrollTop();
                    if (scrollBody > s.homeElement.offset().top + 200) {
                        jQuery('#navigations').addClass('color-full');
                        jQuery('#navbar-info').addClass('active');
                        s.toBottomNav.hide();
                        s.toTopNav.show();
                    }else{
                        s.toTopNav.hide();
                        s.toBottomNav.show();
                    }
                }

                $('.animated').each(function(){
                    anim = $(this).attr('data-anim');
                    var scrollTop = jQuery('#trigger').offset().top;                
                    if (scrollTop > $(this).offset().top) {                    
                        animatex='up';
                        $(this).removeClass('fadeOut');
                        $(this).addClass(anim);
                    }else{
                        animatex='down';
                        $(this).removeClass(anim);
                        $(this).addClass('fadeOut');
                    }
                });

                $(".zoom").each(function()
                {               
                    $(this).mlens(
                    {
                        "imgSrc": $(this).attr("data-big"),
                        "lensSize": 200,
                        "lensShape": "circle"
                    });
                });


            },

            generateMap:function(){
                var latlng = new google.maps.LatLng(s.gmap.latitude, s.gmap.longitude);
                var settings = {
                    zoom: 15,
                    center: latlng,
                    mapTypeControl: true,
                    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                    navigationControl: true,
                    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                var map = new google.maps.Map(document.getElementById('map-section'), settings);

                var companyMarker = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    title:"PT. Berkah Developer Solutions \n Jln. Kh. Soleh Iskandar Km. 8 No. 10 Kota Bogor Jawa Barat"
                });

                var contentString = '<div class="hexagon-logo" id=""><div class="hexagon-icon"><span class="fa-stack fa-lg font-map"><i class="fa fa-circle fa-stack-2x black"></i><i class="fa fa-rocket fa-stack-1x fa-inverse"></i></span></div></div><div class="center bold">Jln. Kh. Soleh Iskandar Km. 8 No.10 Kota Bogor Jawa Barat</div>';
                 
                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                google.maps.event.addListener(companyMarker, 'click', function() {
                  infowindow.open(map,companyMarker);
                });


            },

            pasteImage:function(){
                document.onpaste = function (event) {
                    // use event.originalEvent.clipboard for newer chrome versions
                    var clipboardData = event.clipboardData  ||  event.originalEvent.clipboardData;
                    var items = clipboardData.items;
                    console.log(JSON.stringify(items)); // will give you the mime types
                    // find pasted image among pasted items
                    var blob;
                    for (var i = 0; i < items.length; i++) {
                        if (items[i].type.indexOf("image") === 0) {
                            blob = items[i].getAsFile();
                        }
                    }
                    // load image if there is a pasted image
                    if (blob !== null) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            console.log(event.target.result); // data url!
                        $(document.activeElement).html('<img src="'+event.target.result+'" />');
                    }
                    reader.readAsDataURL(blob);
                    }
                }
            },

            bindUIActions: function(){
                s.containerSectionElement.onePageNav();


                s.toTopNav.click(function(e){
                    $('html, body').animate({ scrollTop: 0 }, "slow");
                    e.preventDefault();
                });

                s.toBottomNav.click(function(e){
                    $('html, body').animate({ scrollTop: 600 }, "slow");
                    e.preventDefault();
                });

                jQuery(window).bind('scroll', function (){ 

                    if(jQuery('#home').length > 0 ){
                        var scrollBody = jQuery(window).scrollTop();
                        if (scrollBody > jQuery('#home').offset().top + 200) {
                            jQuery('#navigations').addClass('color-full');
                            jQuery('#navbar-info').addClass('active');
                            $('.tobotom').hide();
                            $('.totop').show();
                        } else {
                            jQuery('#navigations').removeClass('color-full');
                            jQuery('#navbar-info').removeClass('active');
                            $('.totop').hide();
                            $('.tobotom').show();
                        }
                    }

                    $('.animated').each(function(){
                        anim = $(this).attr('data-anim');
                        var scrollTop = jQuery('#trigger').offset().top;                
                        if (scrollTop > $(this).offset().top) {                    
                            animatex='up';
                            $(this).removeClass('fadeOut');
                            $(this).addClass(anim);
                        }else{
                            animatex='down';
                            $(this).removeClass(anim);
                            $(this).addClass('fadeOut');
                        }
                    });
                });
            },
        };

        $(document).ready(function() {

            APP.init();            
            
        });

        

        

        


        
    </script>

    </body>
</html>
