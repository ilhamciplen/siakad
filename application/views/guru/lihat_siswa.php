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
              <li class="breadcrumb-item"><a href="<?= base_url('guru/nilai') ?>">Input Nilai</a></li>
              <li class="breadcrumb-item active">Lihat Siswa</li>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $nisn = 1;
                                        foreach ($siswa as $row) : ?>
                                            <tr>
                                                <td><?= $row->nisn; ?></td>
                                                <td><?= $row->nama_siswa; ?></td>
                                                <td>
                                                <?php echo anchor('guru/detail_nilai_siswa/'.$row->nisn, '<div title="Detail Nilai" class="btn btn-success btn-sm"><i class="fa fa-bars"></i></div>')?>
                                                <button title="Input Nilai" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahbaru"><i class="fas fa-edit"></i></button>
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
                                     <form id="myForm" action="<?php echo site_url('guru/save_nilai') ?>" method="post" enctype="multipart/form-data">

                                         <div class="form-group">
                                             <label for="nisn">NISN*</label>
                                             <input required type="text" class="form-control" id="nisn" name="nisn" value="<?= $row->nisn ?>" placeholder="Masukkan NISN">
                                         </div>

                                         <div class="form-group">
                                             <label for="mapel_kode">Mata Pelajaran*</label>
                                             <!-- <input required type="text" class="form-control" id="jadwal_kode" name="jadwal_kode"  placeholder="Masukkan Mapel" value=""> -->
                                             <select required name="mapel_kode" id="mapel_kode" class="form-control">
                                                        <option value="">Pilih Mata Pelajaran</option>
                                                        <?php foreach ($mapel_kode as $a) { ?>
                                                            <option value="<?= $a->kode_mapel; ?>"><?= $a->nama_mapel; ?></option>
                                                        <?php } ?>
                                                    </select>
                                         </div>

                                         <div class="form-group">
                                             <label for="nilai_pengetahuan">Nilai Pengetahuan*</label>
                                             <input required type="text" class="form-control" id="nilai_pengetahuan" name="nilai_pengetahuan" placeholder="Input Nilai Pengetahuan" value="">
                                         </div>

                                         <div class="form-group">
                                             <label for="deskripsi_np">Deskripsi Nilai Pengetahuan*</label>
                                             <input required type="text" class="form-control" id="deskripsi_np" name="deskripsi_np" placeholder="deskripsi Nilai Pengetahuan" value="">
                                         </div>

                                         <div class="form-group">
                                             <label for="nilai_ketrampilan">Nilai Ketrampilan*</label>
                                             <input required type="text" class="form-control" id="nilai_ketrampilan" name="nilai_ketrampilan" placeholder="Input Nilai Ketrampilan" value="">
                                         </div>

                                         <div class="form-group">
                                             <label for="deskripsi_nk">Deskripsi Nilai Ketrampilan*</label>
                                             <input required type="text" class="form-control" id="deskripsi_nk" name="deskripsi_nk" placeholder="Input Deskrpsi Nilai Ketrampilan" value="">
                                         </div>

                                         <div class="form-group">
                                             <label for="jenis_evaluasi">Jenis Evaluasi*</label>
                                             <select required name="jenis_evaluasi" id="jenis_evaluasi" class="form-control">
                                                <option value="UTS">UTS</option>
                                                <option value="UAS">UAS</option>
                                             </select>

                                             
                                         </div>

                                         <div class="form-group">
                                             <label for="semester">Semester*</label>
                                             <select required name="semester" id="semester" class="form-control">
                                                        <option value="">Pilih Semester</option>
                                                        <?php foreach ($semester as $c) { ?>
                                                            <option value="<?= $c->kode_semester; ?>"><?= $c->nama_semester; ?></option>
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


            
              

              

</div></div></div></div></div></div></div></section>