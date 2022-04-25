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
              <li class="breadcrumb-item active">Data Gedung</li>
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
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Form Edit Gedung</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <!-- /.card-header -->
              <!-- form start -->
              <form id="myForm" action="<?php echo site_url('admin/update_gedung') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <?= form_open_multipart('admin/edit_gedung'); ?>
                <div class="row">
                  <div class="col-5">
                    <label>Kode Gedung</label>
                    <input type="text" class="form-control"  placeholder="Isi Kode Gedung" name="kode_gedung" value="<?php echo $gedung->kode_gedung ?>">
                  </div>
                  <div class="col-5">
                    <label>Nama Gedung</label>
                    <input type="text" class="form-control"  placeholder="Isi Nama Gedung" name="nama_gedung" value="<?php echo $gedung->nama_gedung ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-5">
                    <label>Jumlah Lantai</label>
                    <input type="text" class="form-control"  placeholder="Isi Jumlah Lantai" name="jumlah_lantai" value="<?php echo $gedung->jumlah_lantai ?>">
                  </div>
                  <div class="col-5">
                    <label>Panjang</label>
                    <input type="text" class="form-control"  placeholder="Isi Panjang Gedung" name="panjang" value="<?php echo $gedung->panjang ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-5">
                    <label>Tinggi</label>
                    <input type="text" class="form-control"  placeholder="Isi Tinggi Gedung" name="tinggi" value="<?php echo $gedung->tinggi ?>">
                  </div>
                  <div class="col-5">
                    <label>Lebar</label>
                    <input type="text" class="form-control"  placeholder="Isi Lebar Gedung" name="lebar" value="<?php echo $gedung->lebar ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-5">
                    <label>Keterangan</label>
                    <input type="text" class="form-control"  placeholder="Isi Keterangan" name="keterangan" value="<?php echo $gedung->keterangan ?>">
                  </div>
                  <div class="col-5">
                    <label>Status</label>
                    <select name="status" class="form-control">
                      <option value="aktif">Aktif</option>
                     <option value="tidak aktif">Tidak Aktif</option>
                    </select>
                  </div>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a type="button" class="btn btn-danger" href="<?= base_url('admin/gedung') ?>">Batal</a>
                    <input class="btn btn-primary" type="submit" name="btn" value="Simpan" />
                </div>
              </form>
           
            <!-- /.card -->

        </div></div>

        <div class="col-md-4">
            <!-- general form elements disabled -->
            <!-- timeline item -->
              <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-red">Harap Dibaca</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-bell bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> <?php echo date('l, d M Y'); ?></span>
                  <h3 class="timeline-header"><a href="#">Petunjuk Pengisian</a> Edit Gedung</h3>

                  <div class="timeline-body">
                    1. Silahkan masukkan data yang ada<br>
                    2. Kode Gedung jangan diubah karena UNIQUE<br>
                    

                    
                  </div>
                  
                </div>
              </div>

                <div>
                <i class="fas fa-user bg-green"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-comments"></i><a href="https://api.whatsapp.com/send?phone=+62 "> Hanya Whatsapp</a></span>
                  <h3 class="timeline-header no-border">Edi Susanto, S.Pd &nbsp;&nbsp;<br><a href="https://api.whatsapp.com/send?phone=+62 ">0899-9999-9999</a></h3>
                </div>
               </div>
              </div>
          </div>
              

              

</div></div></div></div></div></div></div></section>