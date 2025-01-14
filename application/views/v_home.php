
<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>SMK Islam Al Hikmah Mayong</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- site icons -->
<link rel="icon" href="<?= base_url() ?>template/front-end/images/logos/smkia.png" type="image/gif" />
<!-- bootstrap css -->
<link rel="stylesheet" href="<?= base_url() ?>template/front-end/css/bootstrap.min.css" />
<!-- Site css -->
<link rel="stylesheet" href="<?= base_url() ?>template/front-end/css/style.css" />
<!-- responsive css -->
<link rel="stylesheet" href="<?= base_url() ?>template/front-end/css/responsive.css" />
<!-- colors css -->
<link rel="stylesheet" href="<?= base_url() ?>template/front-end/css/colors1.css" />
<!-- custom css -->
<link rel="stylesheet" href="<?= base_url() ?>template/front-end/css/custom.css" />
<!-- wow Animation css -->
<link rel="stylesheet" href="<?= base_url() ?>template/front-end/css/animate.css" />
<!-- revolution slider css -->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/front-end/revolution/css/settings.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/front-end/revolution/css/layers.css" />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>template/front-end/revolution/css/navigation.css" />
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>
<body id="default_theme" class="it_service">
<!-- loader -->
<div class="bg_load"> <img class="loader_animation" src="<?= base_url() ?>template/front-end/images/loaders/smk_ia.png" alt="#" /> </div>
<!-- end loader -->
<!-- header -->
<header id="default_header" class="header_style_1">
  <!-- header top -->
  <div class="header_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="full">
                            <div class="topbar-left">
                                <ul class="list-inline">
                                    <li> <span class="topbar-label"><i class="fa  fa-home"></i></span> <span class="topbar-hightlight">Jl. Branang Singorojo, Mayong, Rw. 02, Pelemkerep, Jepara, Kabupaten Jepara, Jawa Tengah 59465</span> </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 right_section_header_top">
                        <div class="float-right">
                            <div class="social_icon">
                                <ul class="list-inline">
                                    <li><a class="fa fa-facebook" href="https://web.facebook.com/" title="Facebook" target="_blank"></a></li>
                                    <li><a class="fa fa-instagram" href="https://www.instagram.com/" title="Instagram" target="_blank"></a></li>
                                    <li><a class="fa fa-whatsapp" href="https://www.whatsapp.com/" title="Whatsapp" target="_blank"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  <!-- end header top -->
  <!-- header bottom -->
  <div class="header_bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
          <!-- logo start -->
          <div class="logo"> <a href="it_home.html"><img src="<?= base_url() ?>template/front-end/images/logos/smkia2.png" alt="logo" /></a> </div>
          <!-- logo end -->
        </div>
        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
          <!-- menu start -->
          <div class="menu_side">
            <div id="navbar_menu">
              <ul class="first-ul">
                <li> <a class="active" href="<?= base_url('Home/index') ?>">Home</a></li>
                <li><a href="#">Tentang Kami</a>
                <ul>
                    <li><a href="<?= base_url('Tentangkami/sambutankepsek') ?>">Sambutan Kepala Sekolah</a></li>
                    <li><a href="<?= base_url('Tentangkami/sejarah') ?>">Sejarah</a></li>
                    <li><a href="<?= base_url('Tentangkami/visimisi') ?>">Visi & Misi</a></li>
                    <li><a href="#">Prestasi</a></li>
                  </ul>
                </li>
                <li> <a href="#">Program Keahlian</a>
                  <ul>
                  <li><a href="<?= base_url('Jurusan/audiovideo') ?>">Teknik Audio Video</a></li>
                    <li><a href="<?= base_url('Jurusan/tkr') ?>">Teknik Kendaraan Ringan</a></li>
                    <li><a href="<?= base_url('Jurusan/akuntansi') ?>">Akuntansi</a></li>
                    <li><a href="<?= base_url('Jurusan/administrasi_perkantoran') ?>">Administrasi Perkantoran</a></li>
                    <li><a href="<?= base_url('Jurusan/busana_butik') ?>">Busana Butik</a></li>
                    <li><a href="<?= base_url('Jurusan/kecantikan_rambut') ?>">Kecantikan Rambut</a></li>
                    <li><a href="<?= base_url('Jurusan/ankes') ?>">Analis Kesehatan</a></li>
                  </ul>
                </li>
                <li> <a href="<?= base_url('Berita/index') ?>">Berita</a></li>
                <li> <a href="#">PPDB Online</a></li>
                <li> <a href="#">Uji Kompetensi</a>
                  <ul>
                    <li><a href="#">LSP</a></li>
                  </ul>
                </li>
                <li> <a href="#">Link</a>
                  <ul>
                  <li><a href="<?= base_url('Auth') ?>">Login SIAKAD</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            
          </div>
          <!-- menu end -->
        </div>
      </div>
    </div>
  </div>
  <!-- header bottom end -->
</header>
<!-- end header -->
<!-- section -->
<div id="slider" class="section main_slider">
  <div class="container-fuild">
    <div class="row">
      <div id="rev_slider_4_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
        <!-- START REVOLUTION SLIDER 5.0.7 auto mode -->
        <div id="rev_slider_4_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
          <ul>
            <li data-index="rs-1812" data-transition="zoomin" data-slotamount="7"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb=""  data-rotate="0"  data-saveperformance="off"  data-title="Computer Services" data-description="">
              <!-- MAIN IMAGE -->
              <img src="<?= base_url() ?>template/front-end/images/it_service/gd.jpg"  alt="#"  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
              <!-- LAYERS -->
              <!-- LAYER NR. BG -->
              <div class="tp-caption tp-shape tp-shapewrapper   rs-parallaxlevel-0" 
                              id="slide-270-layer-1012" 
                              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                              data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                              data-width="full"
                              data-height="full"
                              data-whitespace="nowrap"
                              data-transform_idle="o:1;"
                              data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" 
                              data-transform_out="s:300;s:300;" 
                              data-start="750" 
                              data-basealign="slide" 
                              data-responsive_offset="on" 
                              data-responsive="off"
                              style="z-index: 5;background-color:rgba(0, 0, 0, 0.25);border-color:rgba(0, 0, 0, 0.50);"> </div>
              <!-- LAYER NR. 1 -->
              <div class="tp-caption tp-shape tp-shapewrapper   tp-resizeme rs-parallaxlevel-0" 
                              id="slide-18-layer-912" 
                              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                              data-y="['middle','middle','middle','middle']" data-voffset="['15','15','15','15']" 
                              data-width="500"
                              data-height="140"
                              data-whitespace="nowrap"
                              data-transform_idle="o:1;"
                              data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power4.easeInOut;" 
                              data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                              data-mask_in="x:0px;y:0px;" 
                              data-mask_out="x:inherit;y:inherit;" 
                              data-start="2000" 
                              data-responsive_offset="on" 
                              style="z-index: 5;background-color:rgba(29, 29, 29, 0.85);border-color:rgba(0, 0, 0, 0.50);"> </div>
              <!-- LAYER NR. 2 -->
              <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" 
                              id="slide-18-layer-112" 
                              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                              data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                              data-fontsize="['70','70','70','35']"
                              data-lineheight="['70','70','70','50']"
                              data-width="none"
                              data-height="none"
                              data-whitespace="nowrap"
                              data-transform_idle="o:1;"
                              data-transform_in="y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
                              data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                              data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                              data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                              data-start="1000" 
                              data-splitin="chars" 
                              data-splitout="none" 
                              data-responsive_offset="on" 
                              data-elementdelay="0.05" 
                              style="z-index: 6; white-space: nowrap;">SMK Islam Al Hikmah Mayong</div>
              <!-- LAYER NR. 3 -->
              <div class="tp-caption NotGeneric-SubTitle   tp-resizeme rs-parallaxlevel-0" 
                              id="slide-18-layer-412" 
                              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                              data-y="['middle','middle','middle','middle']" data-voffset="['52','51','51','31']" 
                              data-width="none"
                              data-height="none"
                              data-whitespace="nowrap"
                              data-transform_idle="o:1;"
                              data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                              data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                              data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                              data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                              data-start="1500" 
                              data-splitin="none" 
                              data-splitout="none" 
                              data-responsive_offset="on" 
                              style="z-index: 7; white-space: nowrap;">Istimewa</div>
            </li>
            <li data-index="rs-181" data-transition="zoomin" data-slotamount="7"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb=""  data-rotate="0"  data-saveperformance="off"  data-title="Easy To Use & Customize" data-description="">
              <!-- MAIN IMAGE -->
              <img src="<?= base_url() ?>template/front-end/images/it_service/smk2.png"  alt=""  data-bgposition="center center" data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
              <!-- LAYERS -->
              <!-- LAYER NR. BG -->
              <div class="tp-caption tp-shape tp-shapewrapper   rs-parallaxlevel-0" 
                              id="slide-270-layer-101" 
                              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                              data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                              data-width="full"
                              data-height=""
                              data-whitespace="nowrap"
                              data-transform_idle="o:1;"
                              data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;" 
                              data-transform_out="s:300;s:300;" 
                              data-start="750" 
                              data-basealign="slide" 
                              data-responsive_offset="on" 
                              data-responsive="off"
                              style="z-index: 5;background-color:rgba(0, 0, 0, 0.25);border-color:rgba(0, 0, 0, 0.50);"> </div>
              <!-- LAYER NR. 1 -->
              <div class="tp-caption tp-shape tp-shapewrapper   tp-resizeme rs-parallaxlevel-0" 
                              id="slide-18-layer-91" 
                              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                              data-y="['middle','middle','middle','middle']" data-voffset="['15','15','15','15']" 
                              data-width="500"
                              data-height="140"
                              data-whitespace="nowrap"
                              data-transform_idle="o:1;"
                              data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power4.easeInOut;" 
                              data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                              data-mask_in="x:0px;y:0px;" 
                              data-mask_out="x:inherit;y:inherit;" 
                              data-start="2000" 
                              data-responsive_offset="on" 
                              style="z-index: 5;background-color:rgba(29, 29, 29, 0.85);border-color:rgba(0, 0, 0, 0.50);"> </div>
              <!-- LAYER NR. 2 -->
              <div class="tp-caption NotGeneric-Title   tp-resizeme rs-parallaxlevel-0" 
                              id="slide-18-layer-11" 
                              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                              data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" 
                              data-fontsize="['70','70','70','35']"
                              data-lineheight="['70','70','70','50']"
                              data-width="none"
                              data-height="none"
                              data-whitespace="nowrap"
                              data-transform_idle="o:1;"
                              data-transform_in="y:[-100%];z:0;rZ:35deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power4.easeInOut;" 
                              data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                              data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
                              data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                              data-start="1000" 
                              data-splitin="chars" 
                              data-splitout="none" 
                              data-responsive_offset="on" 
                              data-elementdelay="0.05" 
                              style="z-index: 6; white-space: nowrap;">SMK Bisa</div>
              <!-- LAYER NR. 3 -->
              <div class="tp-caption NotGeneric-SubTitle   tp-resizeme rs-parallaxlevel-0" 
                              id="slide-18-layer-41" 
                              data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                              data-y="['middle','middle','middle','middle']" data-voffset="['52','51','51','31']" 
                              data-width="none"
                              data-height="none"
                              data-whitespace="nowrap"
                              data-transform_idle="o:1;"
                              data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                              data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" 
                              data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;" 
                              data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 
                              data-start="1500" 
                              data-splitin="none" 
                              data-splitout="none" 
                              data-responsive_offset="on" 
                              style="z-index: 7; white-space: nowrap;">SMK Bisa</div>
            </li>
          </ul>
          <div class="tp-static-layers"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end section -->
<!-- section -->
<div class="section padding_layout_1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="main_heading text_align_center">
            <h2>PELAYANAN KAMI</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="full text_align_center margin_bottom_30">
          <div class="center">
            <div class="icon"> <img src="<?= base_url() ?>template/front-end/images/it_service/i3.png" alt="#" /> </div>
          </div>
          <h4 class="theme_color">Ruang Praktek Siswa Teknik</h4>
          <p align="justify"><font face="Arial" color="black" size="3">Jurusan Teknik SMK Islam Al hikmah Mayong yaitu TAV dan TKR. RPS digunakan untuk praktik pembelajaran sehari – hari</font></p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="full text_align_center margin_bottom_30">
          <div class="center">
            <div class="icon"> <img src="<?= base_url() ?>template/front-end/images/it_service/i1.png" alt="#" /> </div>
          </div>
          <h4 class="theme_color">Ruang Praktik Akuntansi dan OTKP</h4>
          <p align="justify"><font face="Arial" color="black" size="3">Jurusan Akuntansi dan OTKP memiliki Ruang Praktik Siswa (RPS) yang sudah sangat lengap. Ada 40 unit komputer yang digunakan untuk praktik siswa dan siswa mempunyai kesempatan untuk memegang komputer masing – masing, jadi bisa praktik secara maksimal di RPS ini.</font></p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="full text_align_center margin_bottom_30">
          <div class="center">
            <div class="icon"> <img src="<?= base_url() ?>template/front-end/images/it_service/laborat2.png" alt="#" /> </div>
          </div>
          <h4 class="theme_color">Laboratorium Kesehatan</h4>
          <p align="justify"><font face="Arial" color="black" size="3">Jurusan Analis Kesehatan SMK Islam Al hikmah Mayong memiliki RPS yang sangat lengkap alat-alat praktiknya, sehingga pembelajaran akan lebih maksimal.</font></p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="full text_align_center margin_bottom_30 margin_0">
          <div class="center">
            <div class="icon"> <img src= "<?= base_url() ?>template/front-end/images/it_service/jahit.png" alt="#" /> </div>
          </div>
          <h4 class="theme_color">Ruang Praktik Busana Butik</h4>
          <p align="justify"><font face="Arial" color="black" size="3">Jurusan Busana Butik SMK Islam Al hikmah Mayong memiliki RPS yang sangat lengkap alat-alat praktiknya, sehingga pembelajaran akan lebih maksimal.</font></p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="full text_align_center margin_bottom_30 margin_0">
          <div class="center">
            <div class="icon"> <img src= "<?= base_url() ?>template/front-end/images/it_service/sisir.png" alt="#" /> </div>
          </div>
          <h4 class="theme_color">Ruang Praktik Kecantikan Rambut</h4>
          <p align="justify"><font face="Arial" color="black" size="3">Jurusan Kecantikan Rambut  SMK Islam Al hikmah Mayong memiliki RPS yang sangat lengkap alat-alat praktiknya, sehingga pembelajaran akan lebih maksimal.</font></p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="full text_align_center margin_bottom_30 margin_0">
          <div class="center">
            <div class="icon"> <img src= "<?= base_url() ?>template/front-end/images/it_service/i4.png" alt="#" /> </div>
          </div>
          <h4 class="theme_color">Laboratorium Komputer</h4>
          <p align="justify"><font face="Arial" color="black" size="3">SMK Islam Al Hikmah Mayong sudah memiliki Laboratorium Komputer yang mana sudah ada +- 40 unit komputer, sehingga memungkinkan masing-masing siwa dapat memegang komputer satu-satu. Laboratorium komputer ini digunakan untuk praktik siswa dan persiapan UNBK.</font></p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
        <div class="full text_align_center margin_bottom_30 margin_0">
          <div class="center">
            <div class="icon"> <img src= "<?= base_url() ?>template/front-end/images/it_service/i2.png" alt="#" /> </div>
          </div>
          <h4 class="theme_color">Bursa Kerja Khusus</h4>
          <p align="justify"><font face="Arial" color="black" size="3">SMK Islam Al Hikmah Mayong telah mempunyai Bursa Kerja Khusus (BKK) untuk para lulusan / alumninya. Alumni / lulusan dari SMK islam Al Hikmah Mayong akan disalurkan secara langsung lewat BKK SMK Islam Al Ahikmah Mayong.</font></p>
        </div>
      </div>
    </div>
    
  </div>
</div>
<!-- end section -->

<!-- Modal -->
<div class="modal fade" id="search_bar" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2 col-xs-10 col-xs-offset-1">
            <div class="navbar-search">
              <form action="#" method="get" id="search-global-form" class="search-global">
                <input type="text" placeholder="Type to search" autocomplete="off" name="s" id="search" value="" class="search-global__input">
                <button class="search-global__btn"><i class="fa fa-search"></i></button>
                <div class="search-global__note">Begin typing your search above and press return to search.</div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Model search bar -->
<!-- footer -->
<footer class="footer_style_2">
  <div class="container-fuild">
    <div class="row">
      <div class="map_section">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.194576305181!2d110.76040904829311!3d-6.746107095099388!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70dc4d092ba169%3A0xdf7902f11adb88c9!2sSMK%20Islam%20Al%20Hikmah%201%20Mayong!5e0!3m2!1sid!2sid!4v1649059678331!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="footer_blog">
        <div class="row">
          <div class="col-md-6">
            <div class="main-heading left_text">
              <h2>Tentang Kami</h2>
            </div>
            <!-- <p>Sistem Informasi Akademik SMK Islam Al Hikmah Mayong, merupakan upaya kami dalam rangka mendukung terwujudnya layanan akademik yang akuntable dan transparan.</p> -->
            <p align="justify"><font face="Arial" color="white" size="2">Sistem Informasi Akademik SMK Islam Al Hikmah Mayong, merupakan upaya kami dalam rangka mendukung terwujudnya layanan akademik yang akuntable dan transparan.</font></p>
            
          </div>

          <div class="col-md-6">
            <div class="main-heading left_text">
              <h2>Kontak</h2>
            </div>
            <!-- <p>Sistem Informasi Akademik SMK Islam Al Hikmah Mayong, merupakan upaya kami dalam rangka mendukung terwujudnya layanan akademik yang akuntable dan transparan.</p> -->
            <p align="justify"><font face="Arial" color="white" size="2">Alamat &nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;Desa Singorojo RT. 05 RW. 03, Singorojo, Kec. Mayong, Kab. Jepara Prov. Jawa Tengah</font></p><br>
            <p align="justify"><font face="Arial" color="white" size="2">Phone &nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;(0291) 000000</font></p>
          </div>
        </div>
      </div>
      <div class="cprt">
        
        <p align="center"><font face="Arial" color="white" size="2">SMKIA © Copyrights <?= date('Y'); ?> Design by Kuli Web Harian</font></p>
      </div>
    </div>
  </div>
</footer>
<!-- end footer -->
<!-- js section -->
<script src="<?= base_url() ?>template/front-end/js/jquery.min.js"></script>
<script src="<?= base_url() ?>template/front-end/js/bootstrap.min.js"></script>
<!-- menu js -->
<script src="<?= base_url() ?>template/front-end/js/menumaker.js"></script>
<!-- wow animation -->
<script src="<?= base_url() ?>template/front-end/js/wow.js"></script>
<!-- custom js -->
<script src="<?= base_url() ?>template/front-end/js/custom.js"></script>

<!-- revolution js files -->
<script src="<?= base_url() ?>template/front-end/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="<?= base_url() ?>template/front-end/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?= base_url() ?>template/front-end/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="<?= base_url() ?>template/front-end/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="<?= base_url() ?>template/front-end/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="<?= base_url() ?>template/front-end/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="<?= base_url() ?>template/front-end/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="<?= base_url() ?>template/front-end/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="<?= base_url() ?>template/front-end/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="<?= base_url() ?>template/front-end/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="<?= base_url() ?>template/front-end/revolution/js/extensions/revolution.extension.video.min.js"></script>
<!-- map js -->

<!-- google map js -->
<!-- end google map js -->
</body>
</html>
