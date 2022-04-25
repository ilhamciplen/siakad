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
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="<?= base_url('admin/data_master') ?>">Data Master</a></li>
              <li class="breadcrumb-item active">Data Guru</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Detail Data Guru</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <label>NIP</label>
                    <input required type="text" class="form-control"  placeholder="Isi Kode NIP" name="nip" value="<?php echo $detail->nip ?>"disabled>
                  </div>
                  <div class="col-6">
                    <label>No. HP</label>
                    <input required type="text" class="form-control"  placeholder="Isi Nomor HP" name="no_hp" value="<?php echo $detail->no_hp ?>"disabled>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Nama Guru</label>
                    <input required type="text" class="form-control"  placeholder="Isi Nama Guru" name="nama_guru" value="<?php echo $detail->nama_guru ?>"disabled>
                  </div>
                  <div class="col-6">
                    <label>Email</label>
                    <input required type="text" class="form-control"  placeholder="Isi Email" name="email" value="<?php echo $detail->email ?>" disabled>
                  </div>
                </div>
                <div class="row">
                <div class="col-6">
                    <label>Tempat Lahir</label>
                    <input required type="text" class="form-control"  placeholder="Isi Tempat Lahir" name="tempat_lahir" value="<?php echo $detail->tempat_lahir ?>" disabled>
                  </div>
                  <div class="col-6">
                    <label>Pendidikan Terakhir</label>
                    <input required type="text" class="form-control"  placeholder="Isi Pendidikan Terakhir" name="pendidikan_terakhir" value="<?php echo $detail->pendidikan_terakhir ?>" disabled>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Tanggal Lahir</label>
                    <input required type="text" class="form-control"  placeholder="Isi tgl_lahir" name="tgl_lahir" value="<?php echo format_indo($detail->tgl_lahir) ?>" disabled>
                  </div>
                  <div class="col-6">
                    <label>Status Nikah</label>
                    <input required type="text" class="form-control"  placeholder="Isi Status Nikah" name="status_pernikahan" value="<?php echo $detail->status_pernikahan ?>" disabled>
                  </div>
                </div>
                <div class="row">
                <div class="col-6">
                    <label>NIK</label>
                    <input required type="text" class="form-control"  placeholder="Isi NIK" name="nik" value="<?php echo $detail->nik ?>" disabled>
                  </div>
                  <div class="col-6">
                    <label>Status Keaktifan</label>
                    <input required type="text" class="form-control"  placeholder="Isi Status Keaktifan" name="status_keaktifan" value="<?php echo $detail->status_keaktifan ?>" disabled>
                  </div>
                </div>
               
                
                <div class="row">
                <div class="col-6">
                    <label>Agama</label>
                    <input required type="text" class="form-control"  placeholder="Isi Agama" name="agama" value="<?php echo $detail->agama ?>" disabled>
                  </div>

                </div>

                <div class="row">
                <div class="col-6">
                    <label>Alamat</label>
                    <input required type="text" class="form-control"  placeholder="Isi Alamat" name="alamat" value="<?php echo $detail->alamat ?>" disabled>
                  </div>
               
                </div>
                <!-- /.card-body -->
            
           
            <!-- /.card -->

        </div></div>

        
</div></div></div></div></div></div></div></section>