
<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('format_indo')) {
    function format_indo($date)
    {
        //date_default_timezone_set('Asia/Jakarta');
        // array hari dan bulan
        $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
        $Bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        // pemisahan tahun, bulan, hari, dan waktu
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $waktu = substr($date, 11, 5);
        $hari = date("w", strtotime($date));
        $result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;

        return $result;
    }
}
?>

<div class="content-wrapper">
         <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title;  ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('kaprodi') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Dashboard Kaprodi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<!-- Main content -->
<section class="content">
            <div class="container-fluid">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-success">
                        <h3 class="widget-user-username">Selamat Datang</h3>
                        <h5 class="widget-user-desc">Sebagai Kaprodi Administrasi Perkantoran</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="" src="<?= base_url() ?>assets/img/smkia.png" alt="User Avatar" style="border: 0px ">
                    </div>
                    <div class="card-footer">
                        <div class="">
                            <!-- /.col -->
                            <div class="Widget-user-username">
                                <div class="description-block">
                                    <h3 class="description-header">SIAKAD SMKIA</h3>
                                    <h5 class="description-header">Sistem Informasi Akademik</h5>
                                    <a class="description">SMK Islam Al Hikmah Mayong</a>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>

                <div class="col-12">

                        <div class="card card-primary">
                        <div class="card-header">
                        <h5 class="text-center"><b>Kalender Akademik</b></h5>
                        </div>

                        <div class="card-body">

                        <section class="content">
                            <div class="row">
                                <div class="col-12">

                                        <div class="card">
                                  
                                        <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nama Kegiatan</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Selesai</th>
                                                <th>Tahun Ajaran</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $idd = 1;
                                            foreach ($kalender as $row) : ?>
                                                <tr>
                                                    <td><?= $row->nama_kegiatan; ?></td>
                                                    <td><?php echo format_indo($row->tanggal_mulai) ?></td>
                                                    <td><?php echo format_indo($row->tanggal_selesai) ?></td>
                                                    <td><?= $row->keterangan; ?></td>
                                                  
                                                </tr>
                                            <?php endforeach; ?>
                                        
                                        </tbody>
                                        </table>
                                </div>
                                </div>
                            </section>
                        </div>
                        </div>

                        </div>



                    
                  
                
                
                
                    </div>

                </div>
               
                
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
     </div>

