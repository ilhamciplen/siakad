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
              <li class="breadcrumb-item"><a href="<?= base_url('guru') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Biodata Guru</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<!-- Main content -->
<section class="content">
     <div class="container-fluid">
         <!-- Main row -->
         <div class="row">

         <!-- left column -->
         <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Biodata</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <!-- /.card-header -->
               <!-- form start -->
               <form id="myForm" action="<?php echo site_url('guru/save_biodata') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <label>NIP</label>
                    <input required type="text" class="form-control"  placeholder="Isi NIP" name="nip" value="<?= $this->session->userdata('nip_nisn') ?>"disabled>
                  </div>
                  <div class="col-6">
                    <label>NIK</label>
                    <input required type="text" class="form-control"  placeholder="Isi NIK" name="nik" value="">
                  </div>

                </div>
                <div class="row">
                  <div class="col-6">
                  <label>Nama Guru</label>
                    <input required type="text" class="form-control"  placeholder="Isi Nama Guru" name="nama_guru" value="<?= $this->session->userdata('name') ?>"disabled>
                  </div>
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
                  
                </div>
                <div class="row">
                  <div class="col-6">
                  <label>Jenis Kelamin</label>
                    <select required name="jenis_kelamin" class="form-control">
                        <option value="">--Jenis Kelamin--</option>
                      <option value="laki-laki">Laki-Laki</option>
                     <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <label>Alamat</label>
                    <input required type="text" class="form-control"  placeholder="Isi Alamat" name="alamat" value="">
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Tempat Lahir</label>
                    <input required type="text" class="form-control"  placeholder="Isi Tempat Lahir" name="tempat_lahir" value="">
                  </div>
                  <div class="col-6">
                    <label>No HP</label>
                    <input required type="text" class="form-control"  placeholder="Isi Jenis No.HP" name="no_hp" value="">
                  </div>
                 
                </div>
                <div class="row">
                  <div class="col-6">
                    <label>Tanggal Lahir</label>
                    <input required type="date" class="form-control"  placeholder="Isi Tanggal Lahir" name="tgl_lahir" value="">
                  </div>
                  <div class="col-6">
                    <label>Email</label>
                    <input required type="text" class="form-control"  placeholder="Isi Email" name="email" value="<?= $this->session->userdata('email') ?>"disabled>
                  </div>
                 
                </div>
                <div class="row">
                  <div class="col-6">
                  <label>Status Pernikahan</label>
                  <select required name="status_pernikahan" class="form-control">
                    <option value="">Status Nikah</option>
                      <option value="nikah">Nikah</option>
                     <option value="lajang">Lajang</option>
                    </select>
                  </div>

                  <div class="col-6">
                    <label>Pendidikan Terakhir</label>
                    <input required type="text" class="form-control"  placeholder="Isi Pendidikan Terakhir" name="pendidikan_terakhir" value="">
                  </div>

                </div>

             
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a type="button" class="btn btn-danger" href="<?= base_url('guru') ?>">Batal</a>
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
                  <h3 class="timeline-header"><a href="#">Petunjuk Pengisian</a> Biodata</h3>

                  <div class="timeline-body">
                    1. Silahkan isi data yang ada<br>
                    2. NIP, Nama, Email sudah terisi otomatis<br>
                    3. Alamat diisi secara lengkap<br>
                    4. Jika sudah diisi, cek pada bagian tabel dibawah<br>
                    5. Jika belum jelas bisa menghubungi Contact Person yang ada<br>
                  

                    
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





             <div class="col-12">
                 <div class="card card-info">
                     <div class="card-header">
                     <h3 class="card-title">Biodata Guru (last update <?php echo date('d M Y'); ?>)</h3>
                     </div>
                     
                     <div class="card-body">

            <section class="content">
                        <!-- DataTales Example -->
                                    <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama Guru</th>
                    <th>Jenis Kelamin</th>
                    <th>Status Aktif</th>
                    
                    
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php $nip = 1;
                foreach ($data as $row) : ?>
                    <tr>

                        <td><?= $row->nip; ?></td>
                        <td><?= $row->nama_guru; ?></td>
                        <td><?= $row->jenis_kelamin; ?></td>
                        <td><?= $row->status_keaktifan; ?></td>
                    
                        <td>
                           

                            <a href="<?= base_url('guru/detail_biodata') . '/' . $row->nip; ?>" class="btn btn-success btn-sm">Detail</a>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
      </table>
      </div>
      </div>
    </div>
  </div>

</div>
</section>
</div>
</div>
</section>