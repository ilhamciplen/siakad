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
              <li class="breadcrumb-item active">Data Master</li>
              <li class="breadcrumb-item active">Data Kelas</li>
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
                <h3 class="card-title">Form Tambah Kelas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <!-- /.card-header -->
              <!-- form start -->
              <form id="myForm" action="<?php echo site_url('admin/update_kelas') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="row">
                  <div class="col-5">
                    <label>Kode Kelas</label>
                    <input type="text" class="form-control"  placeholder="Isi Kode Kelas" name="kode_kelas" value="<?php echo $kelas->kode_kelas ?>">
                  </div>
                  <div class="col-5">
                    <label>Wali Kelas</label>
                    <select required name="wali_kelas" id="wali_kelas" class="form-control">
                                                 <option value="">Pilih Wali Kelas</option>
                                                 <?php foreach ($wali_kelas as $d) { ?>
                                                     <option value="<?= $d->nip; ?>"><?= $d->nama_guru; ?></option>
                                                 <?php } ?>
                                             </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-5">
                    <label>Nama Kelas</label>
                    <input type="text" class="form-control"  placeholder="Isi Nama Kelas" name="nama_kelas" value="<?php echo $kelas->nama_kelas ?>">
                  </div>
                  <div class="col-5">
                    <label>Jurusan</label>
                    <select required name="jurusan_kode" id="jurusan_kode" class="form-control">
                                                 <option value="">Pilih Jurusan</option>
                                                 <?php foreach ($jurusan_kode as $a) { ?>
                                                     <option value="<?= $a->kode_jurusan; ?>"><?= $a->nama_jurusan; ?></option>
                                                 <?php } ?>
                                             </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-5">
                    <label>Ruangan</label>
                    <select required name="ruangan_kode" id="ruangan_kode" class="form-control">
                                                 <option value="">Pilih Ruangan</option>
                                                 <?php foreach ($ruangan_kode as $b) { ?>
                                                     <option value="<?= $b->kode_ruangan; ?>"><?= $b->nama_ruangan; ?></option>
                                                 <?php } ?>
                                             </select>
                  </div>
                  <div class="col-5">
                    <label>Gedung</label>
                    <select required name="gedung_kode" id="gedung_kode" class="form-control">
                                                 <option value="">Pilih Gedung</option>
                                                 <?php foreach ($gedung_kode as $c) { ?>
                                                     <option value="<?= $c->kode_gedung; ?>"><?= $c->nama_gedung; ?></option>
                                                 <?php } ?>
                                             </select>
                  </div>
                </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a type="button" class="btn btn-danger" href="<?= base_url('admin/kelas') ?>">Batal</a>
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
                  <h3 class="timeline-header"><a href="#">Petunjuk Pengisian</a> Edit Kelas</h3>

                  <div class="timeline-body">
                    1. Silahkan Masukkan Kode Kelas<br>
                    2. Pilih Wali Kelas<br>
                    3. Silahkan Masukkan Nama Kelas<br>
                    4. Pilih Jurusan<br>
                    5. Pilih Ruangan<br>
                    6. Pilih Gedung<br>
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