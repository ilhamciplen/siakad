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
          <div class="col-md-6">

            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
              <h5 class="text-center"><b>Informasi Kelas</b></h5>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <label>Kode Kelas</label>
                    <input type="text" class="form-control"  placeholder="Isi Kode Kelas" name="kode_kelas" value="<?php echo $detail->kode_kelas ?>">
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <label>Nama Kelas</label>
                    <input type="text" class="form-control"  placeholder="Isi Nama Kelas" name="nama_kelas" value="<?php echo $detail->nama_kelas ?>">
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <label>Wali Kelas</label>
                    <?php 
                    $guru = null;
                    foreach($wali_kelas as $w){
                      if($w->nip == $detail->wali_kelas){
                        $guru = $w->nama_guru;
                       }
                      }
                      ?>
                    <input type="text" class="form-control"  placeholder="Isi Wali Kelas" name="wali_kelas" value="<?php echo $guru;?>">
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <label>Jurusan</label>
                    <?php 
                    $jurusan = null;
                    foreach($jurusan_kode as $w){
                      if($w->kode_jurusan == $detail->jurusan_kode){
                        $jurusan = $w->nama_jurusan;
                       }
                      }
                      ?>
                    <input type="text" class="form-control"  placeholder="Isi Kode Jurusan" name="jurusan_kode" value="<?php echo $jurusan ?>">
                  </div>
                </div>
                </div>
        </div></div>


        <!-- left column -->
        <div class="col-md-6">
                 <div class="card card-primary">
                     <div class="card-header">
                     <h5 class="text-center"><b>Daftar Siswa</b></h5>
                     </div>
                     
                     <div class="card-body">

                    <section class="content">
                        <div class="row">
                            <div class="col-12">
                              
                                    <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>NISN</th>
                                            <th>Nama</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $nisn = 1;
                                        foreach ($siswa as $row) : ?>
                                            <tr>
                                                <td><?= $row->nisn++; ?></td>
                                                <td><?= $row->nama_siswa; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    
                                    </tbody>
                                    </table>
                            </div>
                            </div>
                        </section>
                    </div>
                </div>

                <a href="" class="btn btn-primary">Lihat Jadwal Pelajaran</a>

            </div>

            
              

              

</div></div></div></div></div></div></div></section>