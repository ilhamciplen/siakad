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

<?php $this->load->view('admin/alert');?>


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
              <li class="breadcrumb-item active">Dashboard Admin</li>
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
                        <h5 class="widget-user-desc">Sebagai Admin SIAKAD SMK IA</h5>
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
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-4">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3><?php foreach ($role as $d) { ?>
                                        <?php echo  $d->count; ?>
                                    <?php } ?> Data</h3>
                                <p>Jumlah Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-archive"></i>
                            </div>
                            <a href="<?php echo base_url("admin/data_user") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php foreach ($nip as $d) { ?>
                                        <?php echo  $d->count; ?>
                                    <?php } ?> Data</h3>
                                <p>Jumlah Guru</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-archive"></i>
                            </div>
                            <a href="<?php echo base_url("admin/guru") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php foreach ($nisn as $d) { ?>
                                        <?php echo  $d->count; ?>
                                    <?php } ?> Data</h3>
                                <p>Jumlah Siswa</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-archive"></i>
                            </div>
                            <a href="<?php echo base_url("admin/siswa") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
 
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>Berita</h3>
                                
                            </div>
                            <div class="icon">
                                <i class="ion ion-archive"></i>
                            </div>
                            <a href="<?php echo base_url("admin/berita") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>

                    </div>


                    <div class="col-8">

                    <div class="card card-primary">
                     <div class="card-header">
                     <h5 class="text-center"><b>Kalender Akademik</b></h5>
                     </div>
                     
                     <div class="card-body">

                    <section class="content">
                        <div class="row">
                            <div class="col-12">

                                    <div class="card">
                                    <div class="card-header">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambahbaru"><i class="fas fa-plus fa-fw"></i>Tambah Data Baru</button>
                                    </div>
                              
                                    <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama Kegiatan</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Tahun Ajaran</th>
                                            <th>Action</th>
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
                                                <td>
                                                <button title="Edit" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#update_kalender<?= $row->id ?>"><i class="fas fa-edit"></i></button>
                                                <a title="Hapus" onclick="deleteConfirm('<?php echo site_url('admin/delete_kalender/' . $row->id) ?>')" href="#!"  data-toggle="modal" data-target="#deletemodal" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
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

            <!-- Modal add -->
            <div class="modal fade" id="tambahbaru" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Baru</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                                 <div class="modal-body">
                                     <form id="myForm" action="<?php echo site_url('Admin/save_kalender') ?>" method="post" enctype="multipart/form-data">

                                         <div class="form-group">
                                             <label for="nama_kegiatan">Nama Kegiatan*</label>
                                             <input required type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Masukkan Nama Kegiatan">
                                         </div>

                                         <div class="form-group">
                                             <label for="tanggal_mulai">Tanggal Mulai*</label>
                                             <input required type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="dd-mm-yyyy" value="">
                                         </div>

                                         <div class="form-group">
                                             <label for="tanggal_selesai">Tanggal Selesai*</label>
                                             <input required type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" placeholder="dd-mm-yyyy" value="">
                                         </div>

                                         <div class="form-group">
                                             <label for="tahun_ajaran">Tahun Ajaran*</label>
                                             <select required name="tahun_ajaran" id="tahun_ajaran" class="form-control">
                                                 <option value="">Tahun Ajaran</option>
                                                 <?php foreach ($tahun_ajaran as $a) { ?>
                                                     <option value="<?= $a->tahun; ?>"><?= $a->keterangan; ?></option>
                                                 <?php } ?>
                                             </select>

                                             
                                         </div>

                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                     <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                                 </div>
                                 </form>
                             </div>
                         </div>
                     </div>

                     <!-- Modal Delete info lomba -->

                     <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    
  

                     <!-- Modal Edit Kalender -->

                     <?php foreach ($kalender as $row) { ?>

                        <div class="modal fade" id="update_kalender<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <form id="myForm" action="<?php echo site_url('Admin/update_kalender/' . $row->id); ?>" method="post" enctype="multipart/form-data">

                                         <div class="form-group">
                                             <label for="nama_kegiatan">Nama Kegiatan*</label>
                                             <input required type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="<?= $row->nama_kegiatan ?>" placeholder="Masukkan Nama Kegiatan">
                                         </div>

                                         <div class="form-group">
                                             <label for="tanggal_mulai">Tanggal Mulai*</label>
                                             <input required type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="<?= $row->tanggal_mulai ?>" placeholder="dd-mm-yyyy" value="">
                                         </div>

                                         <div class="form-group">
                                             <label for="tanggal_selesai">Tanggal Selesai*</label>
                                             <input required type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="<?= $row->tanggal_selesai ?>" placeholder="dd-mm-yyyy" value="">
                                         </div>

                                         <div class="form-group">
                                             <label for="tahun_ajaran">Tahun Ajaran*</label>
                                             <select required name="tahun_ajaran" id="tahun_ajaran" class="form-control">
                                                 <option value="">Tahun Ajaran</option>
                                                 <?php foreach ($tahun_ajaran as $a) { ?>
                                                     <option value="<?= $a->tahun; ?>"><?= $a->keterangan; ?></option>
                                                 <?php } ?>
                                             </select>

                                             
                                         </div>

                                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                
                
                
                
                
                
                
                    </div>

                </div>
               
                
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
     </div>

     <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>