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
              <li class="breadcrumb-item active">Tambah Biodata</li>
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
                <h3 class="card-title">Biodata</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <!-- /.card-header -->
              <!-- form start -->
              <form id="myForm" action="<?php echo site_url('admin/save_siswa') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <label>NISN</label>
                    <input  type="text" class="form-control"  placeholder="Isi NISN" name="nisn" value="">
                  </div>
                  <div class="col-6">
                    <label>Kelurahan</label>
                    <input type="text" class="form-control"  placeholder="Isi Kelurahan" name="kelurahan" value="">
                  </div>

                </div>
                <div class="row">
                  <div class="col-6">
                  <label>Nama Siswa</label>
                    <input type="text" class="form-control"  placeholder="Isi Nama Siswa" name="nama_siswa" value="">
                  </div>
                  <div class="col-6">
                    <label>Kecamatan</label>
                    <input type="text" class="form-control"  placeholder="Isi Kecamatan" name="kecamatan" value="">
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>NIK</label>
                    <input type="text" class="form-control"  placeholder="Isi NIK" name="nik" value="">
                  </div>
                  <div class="col-6">
                    <label>Kode Pos</label>
                    <input type="text" class="form-control"  placeholder="Isi Kode Pos" name="kode_pos" value="">
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control"  placeholder="Isi Tempat Lahir" name="tempat_lahir" value="">
                  </div>
                  <div class="col-6">
                    <label>Jenis Tinggal</label>
                    <input type="text" class="form-control"  placeholder="Isi Jenis Tinggal" name="jenis_tinggal" value="">
                  </div>
                 
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control"  placeholder="Isi Tanggal Lahir" name="tgl_lahir" value="">
                  </div>
                  <div class="col-6">
                    <label>Transportasi</label>
                    <input  type="text" class="form-control"  placeholder="Isi Transportasi" name="transportasi" value="">
                  </div>
                 
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Jenis Kelamin</label>
                    <select  name="jenis_kelamin" class="form-control">
                    <option value="">-- Jenis Kelamin --</option>
                      <option value="laki-laki">Laki-Laki</option>
                     <option value="perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label>E-mail</label>
                    <input type="text" class="form-control"  placeholder="Isi E-Mail" name="email" value="">
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <label>Agama</label>
                    <select required name="agama" class="form-control">
                        <option value="">--Agama--</option>
                      <option value="islam">Islam</option>
                     <option value="kristen">Kristen</option>
                     <option value="hindu">Hindu</option>
                     <option value="budha">Budha</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label>No. Telepon</label>
                    <input type="text" class="form-control"  placeholder="Isi No. Telepon" name="no_telepon" value="">
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <label>Alamat</label>
                    <input type="text" class="form-control"  placeholder="Isi Alamat" name="alamat" value="">
                  </div>
                  <div class="col-6">
                    <label>No HP</label>
                    <input type="text" class="form-control"  placeholder="Isi No. HP" name="no_hp" value="">
                  </div>
                 
                </div>

                <div class="row">
                  <div class="col-6">
                    <label>Dusun/Desa</label>
                    <input type="text" class="form-control"  placeholder="Isi Dusun/Desa" name="dusun" value="">
                  </div>
                  <div class="col-6">
                    <label>Kelas</label>
                    <select name="kelas_kode" id="kelas_kode" class="form-control">
                                                 <option value="">Pilih Kelas</option>
                                                 <?php foreach ($kelas_kode as $e) { ?>
                                                     <option value="<?= $e->kode_kelas; ?>"><?= $e->nama_kelas; ?></option>
                                                 <?php } ?>
                                             </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Jurusan</label>
                    <select name="jurusan_kode" id="jurusan_kode" class="form-control">
                                                 <option value="">Pilih Jurusan</option>
                                                 <?php foreach ($jurusan_kode as $f) { ?>
                                                     <option value="<?= $f->kode_jurusan; ?>"><?= $f->nama_jurusan; ?></option>
                                                 <?php } ?>
                                             </select>
                  </div>
                 
                </div>

                <div class="row">
                  <div class="col-6">
                    <label>Nama Ayah</label>
                    <input required type="text" class="form-control"  placeholder="Isi Nama Ayah" name="nama_ayah" value="">
                  </div>
                  <div class="col-6">
                    <label>Nama Ibu</label>
                    <input required type="text" class="form-control"  placeholder="Isi Nama Ibu" name="nama_ibu" value="">
                  </div>

                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Pekerjaan Ayah</label>
                    <input required type="text" class="form-control"  placeholder="Isi Pekerjaan Ayah" name="pekerjaan_ayah" value="">
                  </div>
                  <div class="col-6">
                    <label>Pekerjaan Ibu</label>
                    <input required type="text" class="form-control"  placeholder="Isi Pekerjaan Ibu" name="pekerjaan_ibu" value="">
                  </div>

                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Kontak Ayah</label>
                    <input required type="text" class="form-control"  placeholder="Isi Kontak Ayah" name="kontak_ayah" value="">
                  </div>
                  <div class="col-6">
                    <label>Kontak Ibu</label>
                    <input required type="text" class="form-control"  placeholder="Isi Kontak Ibu" name="kontak_ibu" value="">
                  </div>

                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a type="button" class="btn btn-danger" href="<?= base_url('admin') ?>">Batal</a>
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
                  <h3 class="timeline-header"><a href="#">Petunjuk Pengisian</a> Data Siswa</h3>

                  <div class="timeline-body">
                    1. Silahkan isi data yang ada<br>
                    2. Alamat diisi secara lengkap<br>
                    3. Jika belum jelas bisa menghubungi Contact Person yang ada<br>
                  

                    
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