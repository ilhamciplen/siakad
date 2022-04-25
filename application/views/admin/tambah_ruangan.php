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
              <li class="breadcrumb-item active">Data Ruangan</li>
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
                <h3 class="card-title">Form Tambah Ruangan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <!-- /.card-header -->
              <!-- form start -->
              <form id="myForm" action="<?php echo site_url('admin/save_ruangan') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="row">
                  <div class="col-5">
                    <label>Kode Ruangan</label>
                    <input type="text" class="form-control"  placeholder="Isi Kode Ruangan" name="kode_ruangan" value="">
                  </div>
                  <div class="col-5">
                    <label>Kode Gedung</label>
                    <select required name="gedung_kode" id="gedung_kode" class="form-control">
                                                 <option value="">Pilih Gedung</option>
                                                 <?php foreach ($gedung_kode as $a) { ?>
                                                     <option value="<?= $a->kode_gedung; ?>"><?= $a->nama_gedung; ?></option>
                                                 <?php } ?>
                                             </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-5">
                    <label>Nama Ruangan</label>
                    <input type="text" class="form-control"  placeholder="Isi Nama Ruangan" name="nama_ruangan" value="">
                  </div>
                  <div class="col-5">
                    <label>Kapasitas</label>
                    <input type="text" class="form-control"  placeholder="Isi Kapasitas Ruangan" name="kapasitas" value="">
                  </div>
                </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a type="button" class="btn btn-danger" href="<?= base_url('admin/ruangan') ?>">Batal</a>
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
                  <h3 class="timeline-header"><a href="#">Petunjuk Pengisian</a> Tambah Ruangan</h3>

                  <div class="timeline-body">
                    1. Silahkan Masukkan Kode Ruangan<br>
                    2. Pilih Kode Gedung<br>
                    3. Silahkan Masukkan Nama Ruangan<br>
                    4. Silahkan Masukkan Kapasitas<br>
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