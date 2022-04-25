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
              <li class="breadcrumb-item"><a href="<?= base_url('Siswa') ?>">Dashboard</a></li>
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
                            <div class="form-group form-inline">
                                    <select required name="semester" id="semester" class="form-control">
                                                        <option value="">Pilih Semester</option>
                                                        <?php foreach ($semester as $c) { ?>
                                                            <option value="<?= $c->kode_semester; ?>"><?= $c->nama_semester; ?></option>
                                                        <?php } ?>
                                    </select>&nbsp;&nbsp;



                                    <select required name="jenis_evaluasi" id="jenis_evaluasi" class="form-control">
                                                <option value="">Jenis Evaluasi</option>
                                                <option value="UTS">UTS</option>
                                                <option value="UAS">UAS</option>
                                    </select>&nbsp;

                                    <button class="btn btn-sm btn-success" id="btn_naikkelas">Lihat</button>

                                    </div>
                                    <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Nilai Pengetahuan</th>
                                            <th>Deskripsi Nilai Pengetahuan</th>
                                            <th>Nilai Ketrampilan</th>
                                            <th>Deskripsi Nilai Ketrampilan</th>
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

            
              

              

</div></div></div></div></div></div></div></section>

<script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>