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
              <li class="breadcrumb-item active">Data Jurusan</li>
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
                <h3 class="card-title">Form Edit Jurusan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <!-- /.card-header -->
              <!-- form start -->
              <form id="myForm" action="<?php echo site_url('admin/update_jurusan') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="row">
                  <div class="col-5">
                    <label>Kode Jurusan</label>
                    <input type="text" class="form-control"  placeholder="Isi Kode Jurusan" name="kode_jurusan" value="<?php echo $jurusan->kode_jurusan ?>">
                  </div>
                  <div class="col-5">
                    <label>Nama Jurusan</label>
                    <input type="text" class="form-control"  placeholder="Isi Nama Jurusan" name="nama_jurusan" value="<?php echo $jurusan->nama_jurusan ?>">
                  </div>
                </div>
               
               
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a type="button" class="btn btn-danger" href="<?= base_url('admin/jurusan') ?>">Batal</a>
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
                  <h3 class="timeline-header"><a href="#">Petunjuk Pengisian</a> Edit Jurusan</h3>

                  <div class="timeline-body">
                    1. Silahkan masukkan data yang ada<br>
                    2. Kode jurusan tidak bisa diubah karena bersifat UNIQUE<br>

                    
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