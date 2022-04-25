<?php $this->load->view('admin/alert');?>

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
              <li class="breadcrumb-item active">Data Jadwal</li>
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
                        <h3 class="card-title">Form Tambah Data Jadwal</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="myForm" action="<?php echo site_url('admin/save_jadwal') ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                        
                        <div class="row">
                        <div class="col-5">
                            <label>Mata Pelajaran</label>
                            <select required name="mapel_kode" id="mapel_kode" class="form-control">
                                                        <option value="">Pilih Jadwal</option>
                                                        <?php foreach ($mapel_kode as $a) { ?>
                                                            <option value="<?= $a->kode_mapel; ?>"><?= $a->nama_mapel; ?></option>
                                                        <?php } ?>
                                                    </select>
                        </div>
                        
                        <div class="col-5">
                            <label>Jam</label>
                                <input required type="text" class="form-control"  placeholder="Isi Jam" name="jam" value="">
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-5">
                            <label>Kelas</label>
                            <select required name="kelas_kode" id="kelas_kode" class="form-control">
                                                        <option value="">Pilih Kelas</option>
                                                        <?php foreach ($kelas_kode as $b) { ?>
                                                            <option value="<?= $b->kode_kelas; ?>"><?= $b->nama_kelas; ?></option>
                                                        <?php } ?>
                                                    </select>
                        </div>

                        <div class="col-5">
                            <label>Hari</label>
                            <select required name="hari" id="hari" class="form-control">
                                        <option value="">-- HARI --</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                        </select>
                        </div>


                        </div>

                        <div class="row">
                        <div class="col-5">
                        <label>Guru Pengampu</label>
                            <select required name="guru_pengampu" id="guru_pengampu" class="form-control">
                                                        <option value="">Pilih Guru</option>
                                                        <?php foreach ($guru_pengampu as $c) { ?>
                                                            <option value="<?= $c->nip; ?>"><?= $c->nama_guru; ?></option>
                                                        <?php } ?>
                                                    </select>
                           
                        </div>

                        <div class="col-5">
                        <label>Jurusan</label>
                            <select required name="jurusan_kode" id="jurusan_kode" class="form-control">
                                                        <option value="">Pilih Jurusan</option>
                                                        <?php foreach ($jurusan_kode as $c) { ?>
                                                            <option value="<?= $c->kode_jurusan; ?>"><?= $c->nama_jurusan; ?></option>
                                                        <?php } ?>
                                                    </select>
                           
                        </div>


                        </div>

                        <div class="row">
                        <div class="col-5">
                        <label>Semester</label>
                            <select required name="semester" id="semester" class="form-control">
                                                        <option value="">Pilih Semester</option>
                                                        <?php foreach ($semester as $c) { ?>
                                                            <option value="<?= $c->kode_semester; ?>"><?= $c->nama_semester; ?></option>
                                                        <?php } ?>
                                                    </select>
                           
                        </div>

                        <div class="col-5">
                        <label>Tahun Ajaran</label>
                            <select required name="tahun_ajaran" id="tahun_ajaran" class="form-control">
                                                        <option value="">Pilih Tahun Ajaran</option>
                                                        <?php foreach ($tahun_ajaran as $c) { ?>
                                                            <option value="<?= $c->tahun; ?>"><?= $c->keterangan; ?></option>
                                                        <?php } ?>
                                                    </select>
                           
                        </div>

                        </div>



                        
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <a type="button" class="btn btn-danger" href="<?= base_url('admin/jadwal') ?>">Batal</a>
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
                        <h3 class="timeline-header"><a href="#">Petunjuk Pengisian</a> Tambah Jadwal Pelajaran</h3>

                        <div class="timeline-body">
                            1. Silahkan Isi Data yang ada<br>
                            2. Format penulisan jam (09.00-10.00)<br>
                            
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
                </div>

                 <!-- Main row -->
         <div class="row">
             <div class="col-12">
                 <div class="card card-info">
                     <div class="card-header">
                     <h3 class="card-title">Data Jadwal Pelajaran (last update <?php echo date('d M Y'); ?>)</h3>
                     </div>
                     
                     <div class="card-body">

            <section class="content">
                <div class="row">
                    <div class="col-12">
                         <div class="card">
                            <div class="card-header">
                            
                            </div>

                        <!-- DataTales Example -->
                                    <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Mapel</th>
                    <th>Kelas</th>
                    <th>Guru Pengampu</th>
                    <th>Semester</th>
                    <th>Tahun Ajaran</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tbody>
                <?php $kode_jadwal = 1;
                foreach ($jadwal as $row) : ?>
                    <tr>
                        <td><?= $kode_jadwal++; ?></td>
                        <td><?= $row->hari; ?></td>
                        <td><?= $row->jam; ?></td>
                        <td><?= $row->nama_mapel; ?></td>
                        <td><?= $row->nama_kelas; ?></td>
                        <td><?= $row->nama_guru; ?></td>
                        <td><?= $row->nama_semester; ?></td>
                        <td><?= $row->keterangan; ?></td>
                        <td>
                        <button title="Edit" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#update_jadwal<?= $row->kode_jadwal ?>"><i class="fas fa-edit"></i></button>  
                        <a title="Hapus" onclick="deleteConfirm('<?php echo site_url('admin/delete_jadwal/' . $row->kode_jadwal) ?>')" href="#!"  data-toggle="modal" data-target="#deletemodal" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
               
            </tbody>
      </table>
      </div>
      </div>
    </div>
  </div>

  
  
  <?php foreach ($jadwal as $row) { ?>

<div class="modal fade" id="update_jadwal<?= $row->kode_jadwal ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="myForm" action="<?php echo site_url('Admin/update_jadwal/' . $row->kode_jadwal); ?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                    <label for="mapel_kode">Mata Pelajaran*</label>
                    <select required name="mapel_kode" id="mapel_kode" class="form-control">
                                                        <option value=""><?= $row->mapel_kode ?></option>
                                                        <?php foreach ($mapel_kode as $a) { ?>
                                                            <option value="<?= $a->kode_mapel; ?>"><?= $a->nama_mapel; ?></option>
                                                        <?php } ?>
                                                    </select>
                    </div>

                    <div class="form-group">
                        <label for="kelas_kode">Kelas*</label>
                        <select required name="kelas_kode" id="kelas_kode" class="form-control">
                                                        <option value=""><?= $row->kelas_kode ?></option>
                                                        <?php foreach ($kelas_kode as $a) { ?>
                                                            <option value="<?= $a->kode_kelas; ?>"><?= $a->nama_kelas; ?></option>
                                                        <?php } ?>
                                                    </select>
                    </div>

                    <div class="form-group">
                        <label for="guru_pengampu">Guru Pengampu*</label>
                        <select required name="guru_pengampu" id="guru_pengampu" class="form-control">
                                                        <option value=""><?= $row->guru_pengampu ?></option>
                                                        <?php foreach ($guru_pengampu as $a) { ?>
                                                            <option value="<?= $a->nip; ?>"><?= $a->nama_guru; ?></option>
                                                        <?php } ?>
                                                    </select>
                    </div>

                    

                    <div class="form-group">
                        <label for="jam">Jam*</label>
                        <input required type="text" class="form-control" id="jam" name="jam" value="<?= $row->jam ?>" placeholder="Nama Usaha">
                    </div>

                    <div class="form-group">
                        <label for="hari">Hari*</label>
                        <select required name="hari" id="hari" class="form-control">
                        <option value=""><?= $row->hari ?></option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                        </select>
                    </div>

                    <div class="form-group">
                    <label for="jurusan_kode">Jurusan*</label>
                        <select required name="jurusan_kode" id="jurusan_kode" class="form-control">
                                                        <option value=""><?= $row->jurusan_kode ?></option>
                                                        <?php foreach ($jurusan_kode as $a) { ?>
                                                            <option value="<?= $a->kode_jurusan; ?>"><?= $a->nama_jurusan; ?></option>
                                                        <?php } ?>
                                                    </select>
                    </div>

                    <div class="form-group">
                    <label for="semester">Semester*</label>
                        <select required name="semester" id="semester" class="form-control">
                                                        <option value=""><?= $row->semester ?></option>
                                                        <?php foreach ($semester as $a) { ?>
                                                            <option value="<?= $a->kode_semester; ?>"><?= $a->nama_semester; ?></option>
                                                        <?php } ?>
                                                    </select>
                    </div>

                    <div class="form-group">
                    <label for="tahun_ajaran">Tahun Ajaran*</label>
                        <select required name="tahun_ajaran" id="tahun_ajaran" class="form-control">
                                                        <option value=""><?= $row->tahun_ajaran ?></option>
                                                        <?php foreach ($tahun_ajaran as $a) { ?>
                                                            <option value="<?= $a->tahun; ?>"><?= $a->keterangan; ?></option>
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

</div>
</section>
</div>
                    

              

</div></div></div></div></div></div></div></section>

<script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>
