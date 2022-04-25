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
              <li class="breadcrumb-item active">Lihat Nilai</li>
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
                     <div class="card-body">


                    <section class="content">
                        <div class="row">
                            <div class="col-12">
                              
                                    <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Nilai Pengetahuan</th>
                                            <th>Deskripsi Nilai Pengetahuan</th>
                                            <th>Nilai Ketrampilan</th>
                                            <th>Deskripsi Nilai Ketrampilan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $id = 1;
                                            foreach ($data as $row){ 
                                              if($nisn = $row->nisn) {
                                                ?>
                                                <tr>
                                                    <td><?= $id++; ?></td>
                                                    <td><?= $row->mapel_kode; ?></td>
                                                    <td><?= $row->nilai_pengetahuan; ?></td>
                                                    <td><?= $row->deskripsi_np; ?></td>
                                                    <td><?= $row->nilai_ketrampilan; ?></td>
                                                    <td><?= $row->deskripsi_nk; ?></td>
                                                    <td>
                                                      <button title="Edit" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#update_nilai<?= $row->id ?>"><i class="fas fa-edit"></i></button>
                                                      <a title="Hapus" onclick="deleteConfirm('<?php echo site_url('guru/delete_nilai/' . $row->id) ?>')" href="#!"  data-toggle="modal" data-target="#deletemodal" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                    
                                                </tr>
                                            <?php }
                                            }
                                            ?>
                                    </tbody>
                                    </table>
                            </div>
                            </div>
                        </section>
                    </div>
                </div>

            </div>

            <!-- Modal Edit Kalender -->

            <?php foreach ($nilai as $row) { ?>

<div class="modal fade" id="update_nilai<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="myForm" action="<?php echo site_url('Guru/update_nilai/' . $row->id); ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="nisn">NISN*</label>
                        <input required type="text" class="form-control" id="nisn" name="nisn" value="<?= $row->nisn ?>" placeholder="Masukkan NISN">
                    </div>

                    <div class="form-group">
                        <label for="jadwal_kode">Mata Pelajaran*</label>
                        <!-- <input required type="text" class="form-control" id="jadwal_kode" name="jadwal_kode"  placeholder="Masukkan Mapel" value=""> -->
                        <select name="mapel_kode" id="mapel_kode" class="form-control">
                                <option value=""><?= $row->mapel_kode ?></option>
                                <?php foreach ($mapel_kode as $a) { ?>
                                <option value="<?= $a->kode_mapel; ?>"><?= $a->nama_mapel; ?></option>
                                <?php } ?>
                                </select>
                    </div>

                    <div class="form-group">
                        <label for="nilai_pengetahuan">Nilai Pengetahuan*</label>
                        <input required type="text" class="form-control" id="nilai_pengetahuan" name="nilai_pengetahuan" value="<?= $row->nilai_pengetahuan ?>" placeholder="Input Nilai Pengetahuan" value="">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi_np">Deskripsi Nilai Pengetahuan*</label>
                        <input required type="text" class="form-control" id="deskripsi_np" name="deskripsi_np" value="<?= $row->deskripsi_np ?>" placeholder="deskripsi Nilai Pengetahuan" value="">
                    </div>

                    <div class="form-group">
                        <label for="nilai_ketrampilan">Nilai Ketrampilan*</label>
                        <input required type="text" class="form-control" id="nilai_ketrampilan" name="nilai_ketrampilan" value="<?= $row->nilai_ketrampilan ?>" placeholder="Input Nilai Ketrampilan" value="">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi_nk">Deskripsi Nilai Ketrampilan*</label>
                        <input required type="text" class="form-control" id="deskripsi_nk" name="deskripsi_nk" value="<?= $row->deskripsi_nk ?>" placeholder="Input Deskrpsi Nilai Ketrampilan" value="">
                    </div>

                    <div class="form-group">
                        <label for="jenis_evaluasi">Jenis Evaluasi*</label>
                        <select required name="jenis_evaluasi" id="jenis_evaluasi" class="form-control">
                          <option value="UTS">UTS</option>
                          <option value="UAS">UAS</option>
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


            
              

              

</div></div></div></div></div></div></div></section>

<script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>