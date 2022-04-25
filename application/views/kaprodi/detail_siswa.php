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
              <li class="breadcrumb-item active">Data Siswa</li>
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
                <h3 class="card-title">Data Siswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <label>NISN</label>
                    <input required type="text" class="form-control"  placeholder="Isi NISN" name="nisn" value="<?php echo $detail->nisn ?>"disabled>
                  </div>
                  <div class="col-6">
                    <label>Kelurahan</label>
                    <input required type="text" class="form-control"  placeholder="Isi Kelurahan" name="kelurahan" value="<?php echo $detail->kelurahan ?>"disabled>
                  </div>

                </div>
                <div class="row">
                  <div class="col-6">
                  <label>Nama Siswa</label>
                    <input required type="text" class="form-control"  placeholder="Isi Nama Siswa" name="nama_siswa" value="<?php echo $detail->nama_siswa ?>"disabled>
                  </div>
                  <div class="col-6">
                    <label>Kecamatan</label>
                    <input required type="text" class="form-control"  placeholder="Isi Kecamatan" name="kecamatan" value="<?php echo $detail->kecamatan ?>"disabled>
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>NIK</label>
                    <input required type="text" class="form-control"  placeholder="Isi NIK" name="nik" value="<?php echo $detail->nik ?>"disabled>
                  </div>
                  <div class="col-6">
                    <label>Kode Pos</label>
                    <input required type="text" class="form-control"  placeholder="Isi Kode Pos" name="kode_pos" value="<?php echo $detail->kode_pos ?>"disabled>
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Tempat Lahir</label>
                    <input required type="text" class="form-control"  placeholder="Isi Tempat Lahir" name="tempat_lahir" value="<?php echo $detail->tempat_lahir ?>"disabled>
                  </div>
                  <div class="col-6">
                    <label>Jenis Tinggal</label>
                    <input required type="text" class="form-control"  placeholder="Isi Jenis Tinggal" name="jenis_tinggal" value="<?php echo $detail->jenis_tinggal ?>"disabled>
                  </div>
                 
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Tanggal Lahir</label>
                    <input required type="text" class="form-control"  placeholder="Isi Tanggal Lahir" name="tgl_lahir" value="<?php echo format_indo($detail->tgl_lahir) ?>"disabled>
                  </div>
                  <div class="col-6">
                    <label>Transportasi</label>
                    <input required type="text" class="form-control"  placeholder="Isi Transportasi" name="transportasi" value="<?php echo $detail->transportasi ?>"disabled>
                  </div>
                 
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Jenis Kelamin</label>
                    <input required type="text" class="form-control"  placeholder="Isi Jenis Kelamin" name="jenis_kelamin" value="<?php echo $detail->jenis_kelamin ?>"disabled>
                  </div>
                  <div class="col-6">
                    <label>E-mail</label>
                    <input required type="text" class="form-control"  placeholder="Isi E-Mail" name="email" value="<?php echo $detail->email ?>"disabled>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <label>Agama</label>
                    <input required type="text" class="form-control"  placeholder="Isi Agama" name="agama" value="<?php echo $detail->agama ?>"disabled>
                  </div>
                  <div class="col-6">
                    <label>No. Telepon</label>
                    <input required type="text" class="form-control"  placeholder="Isi No. Telepon" name="no_telepon" value="<?php echo $detail->no_telepon ?>"disabled>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <label>Alamat</label>
                    <input required type="text" class="form-control"  placeholder="Isi Alamat" name="alamat" value="<?php echo $detail->alamat ?>"disabled>
                  </div>
                  <div class="col-6">
                    <label>No HP</label>
                    <input required type="text" class="form-control"  placeholder="Isi No. HP" name="no_hp" value="<?php echo $detail->no_hp ?>"disabled>
                  </div>
                 
                </div>

                <div class="row">
                  <div class="col-6">
                    <label>Dusun/Desa</label>
                    <input required type="text" class="form-control"  placeholder="Isi Dusun/Desa" name="dusun" value="<?php echo $detail->dusun ?>"disabled>
                  </div>
                  <div class="col-6">
                    <label>Kelas</label>
                    <?php 
                    $kelas = null;
                    foreach($kelas_kode as $w){
                      if($w->kode_kelas == $detail->kelas_kode){
                        $kelas = $w->nama_kelas;
                       }
                      }
                      ?>
                    <input type="text" class="form-control"  placeholder="Isi Kode Kelas" name="kelas_kode" value="<?php echo $kelas ?>"disabled>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Jurusan</label>
                    <?php 
                    $jurusan = null;
                    foreach($jurusan_kode as $w){
                      if($w->kode_jurusan == $detail->jurusan_kode){
                        $jurusan = $w->nama_jurusan;
                       }
                      }
                      ?>
                    <input type="text" class="form-control"  placeholder="Isi Kode Jurusan" name="jurusan_kode" value="<?php echo $jurusan ?>"disabled>
                  </div>
                 
                </div>

                <div class="row">
                  <div class="col-6">
                    <label>Nama Ayah</label>
                    <input required type="text" class="form-control"  placeholder="Isi Nama Ayah" name="nama_ayah" value="<?php echo $detail->nama_ayah ?>"disabled>
                  </div>
                  <div class="col-6">
                    <label>Nama Ibu</label>
                    <input required type="text" class="form-control"  placeholder="Isi Nama Ibu" name="nama_ibu" value="<?php echo $detail->nama_ibu ?>"disabled>
                  </div>

                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Pekerjaan Ayah</label>
                    <input required type="text" class="form-control"  placeholder="Isi Pekerjaan Ayah" name="pekerjaan_ayah" value="<?php echo $detail->pekerjaan_ayah ?>"disabled>
                  </div>
                  <div class="col-6">
                    <label>Pekerjaan Ibu</label>
                    <input required type="text" class="form-control"  placeholder="Isi Pekerjaan Ibu" name="pekerjaan_ibu" value="<?php echo $detail->pekerjaan_ibu ?>"disabled>
                  </div>

                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Kontak Ayah</label>
                    <input required type="text" class="form-control"  placeholder="Isi Kontak Ayah" name="kontak_ayah" value="<?php echo $detail->kontak_ayah ?>"disabled>
                  </div>
                  <div class="col-6">
                    <label>Kontak Ibu</label>
                    <input required type="text" class="form-control"  placeholder="Isi Kontak Ibu" name="kontak_ibu" value="<?php echo $detail->kontak_ibu ?>"disabled>
                  </div>

                </div>


                </div>
                <!-- /.card-body -->

               
            <!-- /.card -->

        </div></div>
      

              

</div></div></div></div></div></div></div></section>