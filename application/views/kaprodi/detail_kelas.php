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
              <li class="breadcrumb-item active"><a href="<?= base_url('kaprodi/kelas') ?>">Data Kelas</a></li>
              <li class="breadcrumb-item active">Data Siswa</li>
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
                              <form id="siswa">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>Nama</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $id = 1;
                                        foreach ($siswa as $row) : ?>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="checkbox_value[]" value="<?= $row->nisn; ?>">
                                                </td>
                                                <td><?= $id++; ?></td>
                                                <td><?= $row->nisn; ?></td>
                                                <td><?= $row->nama_siswa; ?></td>
                                                <td>
                                                <?php echo anchor('kaprodi/detail_siswa/'.$row->nisn, '<div title="Detail" class="btn btn-success btn-sm"><i class="fa fa-bars"></i></div>')?>
                                                <?php echo anchor('kaprodi/edit_siswa/'.$row->nisn, '<div title="Edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?>
                                                <a title="Hapus" onclick="deleteConfirm('<?php echo site_url('kaprodi/delete_siswa/' . $row->nisn) ?>')" href="#!"  data-toggle="modal" data-target="#deletemodal" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    
                                    </tbody>
                                </table>

                                    <div class="form-group form-inline">
                                    <label?>NAIK KELAS</label>
                                    <select required name="kelas_kode" id="kelas_kode" class="form-control">
                                                        <option value="">Pilih Kelas</option>
                                                        <?php foreach ($kelas_kode as $b) { ?>
                                                            <option value="<?= $b->kode_kelas; ?>"><?= $b->nama_kelas; ?></option>
                                                        <?php } ?>
                                    </select>
                                    <button class="btn btn-sm btn-success" id="btn_naikkelas">naik</button>
                                    </div>



                                </form>
                            </div>
                            </div>
                        </section>
                    </div>
                </div>

            </div>

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
