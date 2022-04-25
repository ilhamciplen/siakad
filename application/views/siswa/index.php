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
              <li class="breadcrumb-item"><a href="<?= base_url('siswa') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Dashboard Siswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    

    <div class="row">
          <!-- left column -->
          <div class="col-md-8">


            <!-- general form elements disabled -->
            <!-- timeline item -->
              <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              
              <div class="time-label">
                <span class="bg-red" >Selamat Datang di Sistem Informasi Akademik SMK Islam Al Hikmah Mayong</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-info bg-yellow"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-calendar"></i> <?php echo date('l, d M Y'); ?></span>
                  <h3 class="timeline-header"><a href="#">Informasi</a> Akun</h3>

                  <div class="timeline-body">
                    Anda Login Sebagai : <h3><b><font color="red">Siswa</font></b></h3>
                  </div>
                  
                </div>
              </div>


              <div>
                <i class="fas fa-search bg-blue"></i>
                <div class="timeline-item">
                  
                  <h3 class="timeline-header"><a href="#">Petunjuk </a>Penggunaan</h3>

                  <div class="timeline-body">
                  	<ol type="1">
                    <li>Klik menu sebelah kiri untuk melengkapi data pendaftaran</li>
                    <li>Jika Anda menggunakan <i>Smartphone</i>, dan menu tidak muncul, maka Anda bisa klik <a><i class="fas fa-bars"></i></a> yang ada dibagian atas halaman ini</li>
                    <li>Jika ada kendala dengan aplikasi, silahkan hubungi admin di bawah ini</li>
                </ol>
                  </div>
                  
                </div>
              </div>

              <div>
                <i class="fas fa-user bg-green"></i>
                
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-comments"></i><a href="https://api.whatsapp.com/send?phone=+62 "> Hanya Whatsapp</a></span>
                  <h3 class="timeline-header no-border">Edi Susanto, S.Pd &nbsp; &nbsp;<a href="https://api.whatsapp.com/send?phone=+62 ">0899-999-9999 </a></h3>
                </div>
              </div>

              <div>
                <i class="fas fa-calendar bg-blue"></i>
                
                <div class="timeline-item">
                  
                  <h3 class="timeline-header"><a href="#">Kalender </a>Akademik</h3>

                  <div class="timeline-body">
                  <div class="card-header">
                     <h5 class="text-center"><b>Kalender Akademik</b></h5>
                     </div>
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
              </div>

              


              </div>
          </div>

          <div class="col-md-4">
          
          <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-yellow">Informasi Profile <?php echo date('d M Y'); ?></span>
              </div>

              <!-- Profile Image -->
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Akun</h3>
              </div>
              <div class="card-body box-profile">
                <div class="text-center">
                <img src="<?= base_url('upload/user/') . $user['image']; ?>" class="profile-user-img img-fluid img-circle" style="overflow:visible;height:120px;width:120px">
                </div>

                <h3 class="profile-username text-center"><?= $user['name']; ?></h3>

                <p class="text-muted text-center"><?= $user['email']; ?></p>

                

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Member Since</b> <a class="float-right"><?= date('d F Y', $user['date_created']);  ?></a>
                  </li>
                </ul>

                <a href="<?php echo base_url("siswa/edit") ?>" class="btn btn-primary btn-block"><b>Edit Akun?</b></a>
                <a href="<?php echo base_url("siswa/changepassword") ?>" class="btn btn-primary btn-block"><b>Ubah Password?</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
             <!-- timeline item -->
             <div>
                <i class="fas fa-user bg-red"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-calendar"></i> <?php echo date('l, d M Y'); ?></span>
                  <h3 class="timeline-header"><a href="<?= site_url('Siswa/biodata') ?>">Biodata</a>(cek disini)</h3>

                  <div class="timeline-body">
                     <h10><font color="red">Lengkapi Biodata Terlebih Dahulu !!</font></h10><br>
                     <a href="<?php echo base_url("siswa/tambah_biodata") ?>">-- Klik Disini --</a>
                  </div>
                  
                </div>
              </div>
           





</div>
</div>
</div>
</div>