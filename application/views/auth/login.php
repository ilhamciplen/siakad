<!DOCTYPE html>
<html lang="en">

<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title;  ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/');  ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/');  ?>css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            max-width: 100%;
            width: 100%;
            height: auto;
            background-size: cover;
            background-image: url(<?php echo base_url("assets/img/gd.jpg");?>);
            background-blend-mode: darken;
        }

    </style>



</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
 
 
 <div class="container">

     <!-- Outer Row -->
     <div class="row justify-content-center">

         <div class="col-lg-7">

             <div class="card o-hidden border-0 shadow-lg my-5">
                 <div class="card-body p-0">
                     <!-- Nested Row within Card Body -->
                     <div class="row">
                         
                         <div class="col-lg">
                             <div class="p-5">
                                 <div class="card-title text-center">
                                     <img src="assets/img/smkia.png" alt="SMK ISLAM AL HIKMAH MAYONG" style="width: 150px;">
                                     <h1 class="h2 text-gray-900 mb-2" style="font-family: 'Oswald', sans-serif;">Sistem Informasi Akademik Sekolah</h1>
                                     <h2 class="h4 text-gray-900 mb-4" style="font-family: 'Oswald', sans-serif;">SMK ISLAM AL HIKMAH MAYONG</h2>
                                 </div>
                                 <?php if ($this->session->flashdata('message')) {
                                        echo '<div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                                        echo $this->session->flashdata('message');
                                        echo '</div>';
                                    }
                                    ?>
                                 <div class="text-center">
                                 </div>
                                 <form class="user" method="post" action="<?= base_url('auth');  ?>">
                                     <div class="form-group">
                                         <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email');  ?>">
                                         <?= form_error('email', '<small class="text-danger pl-3">', '</small>');  ?>
                                     </div>
                                     <div class="form-group">
                                         <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                         <?= form_error('password', '<small class="text-danger pl-3">', '</small>');  ?>
                                     </div>
                                     <button type="submit" class="btn btn-primary btn-user btn-block">
                                         Login
                                     </button>
                                 </form>
                                 <hr>

                                 <div class="text-center">
                                     <a class="btn btn-primary" href="<?= base_url() ?>">HOME</a>
                                 </div>

                                 
                               
                             </div>
                         </div>
                     </div>
                </div>
             </div>
        </div>
     </div>
 </div>
 </body>