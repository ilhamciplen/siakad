<!-- section -->
<style>
    .geeks {
        width: 300px;
        height: 300px;
        overflow: hidden;
        margin: 0 auto;
    }

    .geeks img {
        width: 100%;
        transition: 0.5s all ease-in-out;
    }

    .geeks:hover img {
        transform: scale(1.5);
    }
</style>
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
                  <li><a href="<?= base_url('Auth') ?>">Login</a></li>
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

<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_left">
                        <h2>Berita</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="full blog_colum">
                    <h3 class="text-center mb-5" style="font-size: 40px; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif"><?php echo $detail->judul ?></h3>
                    <center>
                        <p><img src="<?php echo base_url('upload/berita/' . $detail->foto); ?>" class="img img-responsive float-center"></p>
                        <p class="text-dark"><?php echo $detail->isi ?></p>
                    </center>
                </div>
            </div>
        </div>
        <div>
           
        </div>
    </div>




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

<!-- google map js -->
<!-- end google map js -->
</body>
</html>
