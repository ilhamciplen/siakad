
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
<title>Analisis Kesehatan</title>
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
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>
<body id="default_theme" class="it_service service_detail">
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
                <li> <a href="<?= base_url('Home/index') ?>">Home</a></li>
                <li><a href="#">Tentang Kami</a>
                <ul>
                    <li><a href="<?= base_url('Tentangkami/sambutankepsek') ?>">Sambutan Kepala Sekolah</a></li>
                    <li><a href="<?= base_url('Tentangkami/sejarah') ?>">Sejarah</a></li>
                    <li><a href="<?= base_url('Tentangkami/visimisi') ?>">Visi & Misi</a></li>
                    <li><a href="#">Prestasi</a></li>
                  </ul>
                </li>
                <li> <a class="active" href="#">Program Keahlian</a>
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
                <li> <a href="#">Berita</a></li>
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
<!-- inner page banner -->
<div id="inner_banner" class="section inner_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="title-holder">
            <div class="title-holder-cell text-left">
              <h1 class="page-title">Analisis Kesehatan</h1>
              <ol class="breadcrumb">
                <li><a href="<?= base_url('Home/index') ?>">Home</a></li>
                <li>Program Keahlian</li>
                <li class="active">AAnalisis Kesehatan</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end inner page banner -->
<!-- section -->
<div class="section padding_layout_1 service_list">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-12 service_blog margin_bottom_50">
            <div class="full">
              <div class="service_img"> <img class="img-responsive" src="<?= base_url() ?>template/front-end/images/it_service/post-02.jpg" alt="#" /> </div>
              <div class="service_cont">
                <h3 class="service_head">Data recovery</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                  when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap 
                  into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum 
                  passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
                  <br>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                  nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                  eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <div class="bt_cont"> <a class="btn sqaure_bt" href="it_service_detail.html">View Service</a> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="margin-bottom: 30px;">
          <div class="col-md-12">
            <div class="full margin_bottom_30">
              <div class="accordion border_circle">
                <div class="bs-example">
                  <div class="panel-group" id="accordion">
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
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
        <div id="map"></div>
      </div>
      <div class="footer_blog">
        <div class="row">
          <div class="col-md-6">
            <div class="main-heading left_text">
              <h2>It Next Theme</h2>
            </div>
            <p>Tincidunt elit magnis nulla facilisis. Dolor sagittis maecenas. Sapien nunc amet ultrices, dolores sit ipsum velit purus aliquet, massa fringilla leo orci.</p>
            <ul class="social_icons">
              <li class="social-icon fb"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li class="social-icon tw"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li class="social-icon gp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
            </ul>
          </div>
          <div class="col-md-6">
            <div class="main-heading left_text">
              <h2>Additional links</h2>
            </div>
            <ul class="footer-menu">
              <li><a href="it_about.html"><i class="fa fa-angle-right"></i> About us</a></li>
              <li><a href="it_term_condition.html"><i class="fa fa-angle-right"></i> Terms and conditions</a></li>
              <li><a href="it_privacy_policy.html"><i class="fa fa-angle-right"></i> Privacy policy</a></li>
              <li><a href="it_news.html"><i class="fa fa-angle-right"></i> News</a></li>
              <li><a href="it_contact.html"><i class="fa fa-angle-right"></i> Contact us</a></li>
            </ul>
          </div>
          <div class="col-md-6">
            <div class="main-heading left_text">
              <h2>Services</h2>
            </div>
            <ul class="footer-menu">
              <li><a href="it_data_recovery.html"><i class="fa fa-angle-right"></i> Data recovery</a></li>
              <li><a href="it_computer_repair.html"><i class="fa fa-angle-right"></i> Computer repair</a></li>
              <li><a href="it_mobile_service.html"><i class="fa fa-angle-right"></i> Mobile service</a></li>
              <li><a href="it_network_solution.html"><i class="fa fa-angle-right"></i> Network solutions</a></li>
              <li><a href="it_techn_support.html"><i class="fa fa-angle-right"></i> Technical support</a></li>
            </ul>
          </div>
          <div class="col-md-6">
            <div class="main-heading left_text">
              <h2>Contact us</h2>
            </div>
            <p>123 Second Street Fifth Avenue,<br>
              Manhattan, New York<br>
              <span style="font-size:18px;"><a href="tel:+9876543210">+987 654 3210</a></span></p>
            <div class="footer_mail-section">
              <form>
                <fieldset>
                <div class="field">
                  <input placeholder="Email" type="text">
                  <button class="button_custom"><i class="fa fa-envelope" aria-hidden="true"></i></button>
                </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="cprt">
        <p>ItNext © Copyrights 2019 Design by html.design</p>
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
<script>

      // This example adds a marker to indicate the position of Bondi Beach in Sydney,
      // Australia.
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 11,
          center: {lat: 40.645037, lng: -73.880224},
		  styles: [
               {
                 elementType: 'geometry',
                 stylers: [{color: '#fefefe'}]
               },
               {
                 elementType: 'labels.icon',
                 stylers: [{visibility: 'off'}]
               },
               {
                 elementType: 'labels.text.fill',
                 stylers: [{color: '#616161'}]
               },
               {
                 elementType: 'labels.text.stroke',
                 stylers: [{color: '#f5f5f5'}]
               },
               {
                 featureType: 'administrative.land_parcel',
                 elementType: 'labels.text.fill',
                 stylers: [{color: '#bdbdbd'}]
               },
               {
                 featureType: 'poi',
                 elementType: 'geometry',
                 stylers: [{color: '#eeeeee'}]
               },
               {
                 featureType: 'poi',
                 elementType: 'labels.text.fill',
                 stylers: [{color: '#757575'}]
               },
               {
                 featureType: 'poi.park',
                 elementType: 'geometry',
                 stylers: [{color: '#e5e5e5'}]
               },
               {
                 featureType: 'poi.park',
                 elementType: 'labels.text.fill',
                 stylers: [{color: '#9e9e9e'}]
               },
               {
                 featureType: 'road',
                 elementType: 'geometry',
                 stylers: [{color: '#eee'}]
               },
               {
                 featureType: 'road.arterial',
                 elementType: 'labels.text.fill',
                 stylers: [{color: '#3d3523'}]
               },
               {
                 featureType: 'road.highway',
                 elementType: 'geometry',
                 stylers: [{color: '#eee'}]
               },
               {
                 featureType: 'road.highway',
                 elementType: 'labels.text.fill',
                 stylers: [{color: '#616161'}]
               },
               {
                 featureType: 'road.local',
                 elementType: 'labels.text.fill',
                 stylers: [{color: '#9e9e9e'}]
               },
               {
                 featureType: 'transit.line',
                 elementType: 'geometry',
                 stylers: [{color: '#e5e5e5'}]
               },
               {
                 featureType: 'transit.station',
                 elementType: 'geometry',
                 stylers: [{color: '#000'}]
               },
               {
                 featureType: 'water',
                 elementType: 'geometry',
                 stylers: [{color: '#c8d7d4'}]
               },
               {
                 featureType: 'water',
                 elementType: 'labels.text.fill',
                 stylers: [{color: '#b1a481'}]
               }
             ]
		});

        var image = 'images/it_service/location_icon_map_cont.png';
        var beachMarker = new google.maps.Marker({
          position: {lat: 40.645037, lng: -73.880224},
          map: map,
          icon: image
        });
      }
    </script>
<!-- google map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
<!-- end google map js -->
</body>
</html>
