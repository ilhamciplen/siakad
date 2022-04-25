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
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Form Edit Guru</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <!-- /.card-header -->
              <!-- form start -->
              <form id="myForm" action="<?php echo site_url('admin/update_guru') ?>" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <label>NIP</label>
                    <input required type="text" class="form-control"  placeholder="Isi NIP" name="nip" value="<?php echo $guru->nip ?>">
                  </div>
                  <div class="col-6">
                    <label>NIK</label>
                    <input required type="text" class="form-control"  placeholder="Isi NIK" name="nik" value="<?php echo $guru->nik ?>">
                  </div>

                </div>
                <div class="row">
                  <div class="col-6">
                  <label>Nama Guru</label>
                    <input required type="text" class="form-control"  placeholder="Isi Nama Guru" name="nama_guru" value="<?php echo $guru->nama_guru ?>">
                  </div>
                  <div class="col-6">
                  <label>Agama</label>
                    <select required name="agama" class="form-control">
                        <option value="<?php echo $guru->agama ?>"><?php echo $guru->agama ?></option>
                      <option value="islam">Islam</option>
                     <option value="kristen">Kristen</option>
                     <option value="hindu">Hindu</option>
                     <option value="budha">Budha</option>
                    </select>
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-6">
                  <label>Jenis Kelamin</label>
                    <select required name="jenis_kelamin" class="form-control">
                        <option value="<?php echo $guru->jenis_kelamin ?>"><?php echo $guru->jenis_kelamin ?></option>
                      <option value="laki-laki">Laki-Laki</option>
                     <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label>Alamat</label>
                    <input required type="text" class="form-control"  placeholder="Isi Alamat" name="alamat" value="<?php echo $guru->alamat ?>">
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Tempat Lahir</label>
                    <input required type="text" class="form-control"  placeholder="Isi Tempat Lahir" name="tempat_lahir" value="<?php echo $guru->tempat_lahir ?>">
                  </div>
                  <div class="col-6">
                    <label>No HP</label>
                    <input required type="text" class="form-control"  placeholder="Isi Jenis No.HP" name="no_hp" value="<?php echo $guru->no_hp ?>">
                  </div>
                 
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Tanggal Lahir</label>
                    <input required type="date" class="form-control"  placeholder="Isi Tanggal Lahir" name="tgl_lahir" value="<?php echo $guru->tgl_lahir ?>">
                  </div>
                  <div class="col-6">
                    <label>Email</label>
                    <input required type="text" class="form-control"  placeholder="Isi Email" name="email" value="<?php echo $guru->email ?>">
                  </div>
                 
                </div>
                <div class="row">
                  <div class="col-6">
                  <label>Status Pernikahan</label>
                  <select required name="status_pernikahan" class="form-control">
                    <option value="<?php echo $guru->status_pernikahan ?>"><?php echo $guru->status_pernikahan ?></option>
                      <option value="nikah">Nikah</option>
                     <option value="lajang">Lajang</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label>Pendidikan Terakhir</label>
                    <input required type="text" class="form-control"  placeholder="Isi Pendidikan Terakhir" name="pendidikan_terakhir" value="<?php echo $guru->pendidikan_terakhir ?>">
                  </div>

                </div>

                <div class="row">
                  <div class="col-6">
                  <label>Status Keaktifan</label>
                    <select required name="status_keaktifan" class="form-control">
                        <option value="<?php echo $guru->status_keaktifan ?>"><?php echo $guru->status_keaktifan ?></option>
                      <option value="aktif">Aktif</option>
                     <option value="tidak aktif">Tidak Aktif</option>
                    </select>
                  </div>
                 
                </div>

             
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a type="button" class="btn btn-danger" href="<?= base_url('admin/guru') ?>">Batal</a>
                    <input class="btn btn-primary" type="submit" name="btn" value="Update" />
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
                  <h3 class="timeline-header"><a href="#">Petunjuk Pengisian</a> Edit Guru</h3>

                  <div class="timeline-body">
                    1. Silahkan Masukkan NIP<br>
                    2. Silahkan Masukkan Nama Guru<br>
                    3. Silahkan Masukkan Jenis Kelamin<br>
                    4. Silahkan Masukkan Tempat Lahir<br>
                    5. Silahkan Masukkan Tanggal Lahir<br>
                    6. Silahkan Masukkan NIK<br>
                    7. Silahkan Masukkan Agama<br>
                    8. Silahkan Masukkan Alamat<br>
                    9. Pilih status keaktifan<br>
                    10. Pilih status pernikahan<br>

                    
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