@extends('layouts.budi-layout.frontend')
@section('content')
<div class="section">
	<div id="host-service">
    	<div class="title-section2-container center animated" data-anim="fadeInDown">
            <div class="title-section2">
                What <span>We Do</span>
            </div>
            <div class="text-mute text-semibold">We Design, Develop & Integrations.</div>
        </div>
        <div class="container">
        	<div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="home-service-item row animated" data-anim="fadeInLeft">
                                <div class="home-service-item-icon col-md-3 col-xs-3">
                                    <i class="fa fa-cube fa-2x"></i>
                                </div>
                                <div class="home-service-item-content col-md-9 col-xs-9">
                                    <div class="home-service-img">
                                        {{ HTML::image('assets/images/bdev.jpg', '', ['id'=>'', 'class'=>'']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 animated" data-anim="fadeInRight">                            
                            <div class="home-service-item-title text-bigger">
                                Bdev
                            </div>
                            <div class="home-service-item-text">
                                Bdev adalah unit usaha PT. Berkah Developer Solution yang bergerak di bidang pembuatan dan pengembangan perangkat lunak. Selain membuat dan mengembangkat perangkat lunak, BDev juga melayani jasa pembuatan website dan aplikasi mobile. Focus utama BDev adalah menjadi solusi penyedia sistem informasi yang handal untuk kegiatan bisnis maupun perorangan.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="home-service-item row animated" data-anim="fadeInLeft">
                                <div class="home-service-item-icon col-md-3 col-xs-3">
                                    <i class="fa fa-server fa-2x"></i>
                                </div>
                                <div class="home-service-item-content col-md-9 col-xs-9">
                                    <div class="home-service-img">
                                        {{ HTML::image('assets/images/bsupport.jpg', '', ['id'=>'', 'class'=>'']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 animated" data-anim="fadeInRight">                            
                            <div class="home-service-item-title text-bigger">
                                Bsupport
                            </div>
                            <div class="home-service-item-text">
                                BSupport adalah Unit usaha PT Berkah Developer Solution yang menyediakan jasa pengadaan, perbaikan dan perawatan untuk perangkat keras dan perangakat lunak. Bsupport melayani perbaikan dan perawatan untuk Komputer, Laptop, Printer, Scanner, dan jaringan untuk keperluan personal maupun perusahaan.
                            </div>
                        </div>
                    </div>
                </div>
        		<div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="home-service-item row animated" data-anim="fadeInLeft">
                                <div class="home-service-item-icon col-md-3 col-xs-3">
                                    <i class="fa fa-cloud fa-2x"></i>
                                </div>
                                <div class="home-service-item-content col-md-9 col-xs-9">
                                    <div class="home-service-img">
                                        {{ HTML::image('assets/images/bcloud.jpg', '', ['id'=>'', 'class'=>'']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 animated" data-anim="fadeInRight">                            
                            <div class="home-service-item-title text-bigger">
                                Bcloud
                            </div>
                            <div class="home-service-item-text">
                                Bcloud adalah unit usaha PT. Berkah Developer Solution yang bergerak di bidang penyedia layanan hosting, domain dan Virtual Private Server(VPS). Bcloud menyediakan paket hosting yang sesuai dengan kebutuhan pengguna, mulai dari pengguna perorangan, UMKM, maupun perusahaan menengah keatas. BCloud menyediakan Virtual Private Server(VPS) untuk kegiatan bisnis maupun perorangan.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="home-service-item row animated" data-anim="fadeInLeft">
                                <div class="home-service-item-icon col-md-3 col-xs-3">
                                    <i class="fa fa-camera fa-2x"></i>
                                </div>
                                <div class="home-service-item-content col-md-9 col-xs-9">
                                    <div class="home-service-img">
                                        {{ HTML::image('assets/images/bdsim.jpg', '', ['id'=>'', 'class'=>'']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 animated" data-anim="fadeInRight">                            
                            <div class="home-service-item-title text-bigger">
                                Bdsim
                            </div>
                            <div class="home-service-item-text">
                                BDism adalah unit usaha PT Berkah Developer Solution yang menyediakan jasa desain untuk keperluan Banner, Poster, dan semua desain.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="home-service-item row animated" data-anim="fadeInLeft">
                                <div class="home-service-item-icon col-md-3 col-xs-3">
                                    <i class="fa fa-desktop fa-2x"></i>
                                </div>
                                <div class="home-service-item-content col-md-9 col-xs-9">
                                    <div class="home-service-img">
                                        {{ HTML::image('assets/images/bdemy.jpg', '', ['id'=>'', 'class'=>'']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 animated" data-anim="fadeInRight">                            
                            <div class="home-service-item-title text-bigger">
                                Bdemy
                            </div>
                            <div class="home-service-item-text">
                                BDemy adalah unit usaha PT Berkah Developer Solution yang memberikan pelatihan dalam bidang teknologi informasi.
                            </div>
                        </div>
                    </div>
                </div>
        	</div>
        </div>
    </div>
</div>

<div class="section">
    <div id="product">
        <div class="title-section2-container center animated" data-anim="fadeInDown">
            <div class="title-section2">
                Bdev <span>Web Hosting</span>
            </div>
            <div class="text-mute text-semibold">Hosting, Domain & VPS.</div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="host-about-content">
                        <div class="content animated" data-anim="bounceInRight">
                            <div class="row">
                                <div class="col-xs-1 text-main">
                                    <i class="fa fa-cloud fa-4x"></i>
                                </div>
                                <div class="col-xs-11">
                                    Sebagai perusahaan jasa di bidang teknolgi informasi, PT. Berkah Developer Solutions juga menyediakan jasa web hosting, domain dan email. Berikut Paket-paket web hosting yang kami tawarkan :                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="pricing-table group">
                        <div class="row">
                            <div class="col-md-4">
                                <!-- PERSONAL -->
                                <div class="block business fl">
                                    <h2 class="title">Basic</h2>
                                    <!-- CONTENT -->
                                    <div class="content">
                                        <p class="price">
                                            <span class="fa-stack fa-5x">
                                                <i class="fa fa-circle fa-stack-2x"></i>
                                                <i class="fa fa-male fa-stack-1x fa-inverse text-main"></i>
                                            </span>
                                        </p>
                                        <p class="hint">Perfect for personal</p>
                                    </div>
                                    <!-- /CONTENT -->
                                    <!-- FEATURES -->
                                    <ul class="features">
                                        <li><i class="fa fa-envelope"></i> Mail</li>
                                        <li><i class="fa fa-database"></i> Database Unlimited</li>
                                        <li><i class="fa fa-dashboard"></i> Bandwith Unlimited</li>
                                        <li><i class="fa fa-cloud"></i> 500MB Local Storage</li>
                                    </ul>
                                    <!-- /FEATURES -->
                                    <!-- PT-FOOTER -->
                                    <div class="content">
                                        <p class="hint">IDR.15.000,-/month</p>
                                        <div>or</div>
                                        <p class="hint">IDR.150.000,-/Year</p>
                                    </div>
                                    <div class="pt-footer">
                                        <div>
                                            <a href="#">Book Now</a>
                                        </div>
                                    </div>
                                    <!-- /PT-FOOTER -->
                                </div>
                                <!-- /PERSONAL -->
                            </div>
                            <div class="col-md-4">
                                <!-- PROFESSIONAL -->
                                <div class="block business fl">
                                    <h2 class="title">Medium</h2>
                                    <!-- CONTENT -->
                                    <div class="content">
                                        <p class="price">
                                            <span class="fa-stack fa-5x">
                                                <i class="fa fa-circle fa-stack-2x"></i>
                                                <i class="fa fa-heartbeat fa-stack-1x fa-inverse text-main"></i>
                                            </span>
                                        </p>
                                        <p class="hint">Suitable for startups</p>
                                    </div>
                                    <!-- /CONTENT -->
                                    <!-- FEATURES -->
                                    <ul class="features">
                                        <li><i class="fa fa-envelope"></i> Mail</li>
                                        <li><i class="fa fa-database"></i> Database Unlimited</li>
                                        <li><i class="fa fa-dashboard"></i> Bandwith Unlimited</li>
                                        <li><i class="fa fa-cloud"></i> 1.5GB Local Storage</li>
                                    </ul>
                                    <!-- /FEATURES -->
                                    <!-- PT-FOOTER -->
                                    <div class="content">
                                        <p class="hint">IDR. 25.000,-/month</p>
                                        <div>or</div>
                                        <p class="hint">IDR. 250.000,-/Year</p>
                                    </div>
                                    <div class="pt-footer">
                                        <div>
                                            <a href="#">Book Now</a>
                                        </div>
                                    </div>
                                    <!-- /PT-FOOTER -->
                                </div>
                                <!-- /PROFESSIONAL -->
                            </div>
                            <div class="col-md-4">
                                <!-- BUSINESS -->
                                <div class="block business fl">
                                    <h2 class="title">Premium</h2>
                                    <!-- CONTENT -->
                                    <div class="content">
                                        <p class="price">
                                            <span class="fa-stack fa-5x">
                                                <i class="fa fa-circle fa-stack-2x"></i>
                                                <i class="fa fa-building fa-stack-1x fa-inverse text-main"></i>
                                            </span>
                                        </p>
                                        <p class="hint">For established business</p>
                                    </div>
                                    <!-- /CONTENT -->

                                    <!-- FEATURES -->
                                    <ul class="features">
                                        <li><i class="fa fa-envelope"></i> Mail</li>
                                        <li><i class="fa fa-database"></i> Database Unlimited</li>
                                        <li><i class="fa fa-dashboard"></i> Bandwith Unlimited</li>
                                        <li><i class="fa fa-cloud"></i> 2.5GB Local Storage</li>
                                    </ul>
                                    <!-- /FEATURES -->

                                    <!-- PT-FOOTER -->

                                    <div class="content">
                                        <p class="hint">IDR. 30.000,-/month</p>
                                        <div>or</div>
                                        <p class="hint">IDR. 350.000,-/Year</p>
                                    </div>
                                    <div class="pt-footer">
                                        <div>
                                            <a href="#">Book Now</a>
                                        </div>
                                    </div>
                                    <!-- /PT-FOOTER -->
                                </div>
                                <!-- /BUSINESS -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section" id="host-about">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="host-about-content">
                    <div class="title-section2-container animated" data-anim="fadeInDown">
                        <div class="title-section2">
                             <span>Why Choose Our Web Host?</span>
                        </div>
                    </div>
                    <div class="content animated" data-anim="bounceInRight">
                        <div class="row">
                            <div class="col-xs-1 text-main">
                                <i class="fa fa-envelope fa-4x"></i>
                            </div>
                            <div class="col-xs-11">
                                Fitur webmail kami beda dari yang lain! Webmail Kelas Bisnis kami akan membuat Anda dalam ber-email lebih menyenangkan. Webmail kami mengutamakan kecepatan memuat isi pesan, kecepatan mengirim pesan dan kemudahan dalam mengatur data kontak. Tidak hanya itu, Webmail kami dilengkapi juga dengan Kalendar.
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-xs-1 text-main float-right">
                                <i class="fa fa-cloud fa-4x"></i>
                            </div>
                            <div class="col-xs-11">
                                Cloudlinux adalah sebuah teknologi isolasi yang akan mengontrol dan membatasi jumlah sumber daya (CPU, proses entri dan memori) terhadap akun hosting. Kini Anda tidak usah khawatir lagi jika ada sebuah akun hosting pelanggan lain secara tiba-tiba dibanjiri traffic yang tidak normal, yang biasanya akan membuat seluruh akun hosting yang terdapat di server yang sama tidak stabil.
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-xs-1 text-main">
                                <i class="fa fa-desktop fa-4x"></i>
                            </div>
                            <div class="col-xs-11">
                                Layanan Hosting Linux B-dev dilengkapi dengan kontrol panel cPanel yang akan memudahkan Anda dalam mengelola hosting. Mengupload file dengan menggunakan fitur File Manager, membuat akun email, menginstall script dan masih banyak lagi fitur lainnya.
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-xs-1 text-main float-right">
                                <i class="fa fa-lock fa-4x"></i>
                            </div>
                            <div class="col-xs-11">
                                Kami pastikan Anda merasa nyaman dalam jaringan Koneksi Aman B-dev! Berbagai layanan yang terkait dengan mengelola hosting Anda seperti cPanel, webmail, FTP dan komponen penting lainnya sudah dilengkapi dengan fitur SSL. Sehingga Anda tidak perlu merasa khawatir akan kebocoran data informasi yang penting dan bersifat rahasia seperti informasi login.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-ads">
                    <div class="row">
                        <div class="col-xs-2 text-center">
                            <span class="fa-stack fa-lg fa-5x">
                                <i class="fa fa-square-o fa-stack-2x"></i>
                                <i class="fa fa-phone fa-stack-1x"></i>
                            </span>
                        </div>
                        <div class="col-xs-10">
                            <div class="box-ads-title">
                                For fast response, Call Us 
                            </div>
                            <div class="box-ads-content text-dark">{{ Config::get('cms.phone') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop