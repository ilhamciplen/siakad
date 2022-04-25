<?php $this->load->view('kaprodi/alert');?>

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
              <li class="breadcrumb-item"><a href="<?= base_url('kaprodi') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Kelas</li>
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
             <div class="col-12">
                 <div class="card card-info">
                     <div class="card-header">
                     <h5 class="text-center">Data Kelas</h5>
                     </div>
                     
                     <div class="card-body">

            <section class="content">
                <div class="row">
                    <div class="col-12">
                         <div class="card">

                        <!-- DataTales Example -->
                                    <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kelas</th>
                    <th>Nama Kelas</th>
                    <th>Wali Kelas</th>
                    <th>Jurusan</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tbody>
                <?php $id = 1;
                foreach ($kelas as $row){
                    if ($id_prodi == $row->jurusan_kode){
                        ?>
                    <tr>
                        <td><?= $id++; ?></td>
                        <td><?= $row->kode_kelas; ?></td>
                        <td><?= $row->nama_kelas; ?></td>
                        <td><?= $row->nama_guru; ?></td>
                        <td><?= $row->nama_jurusan; ?></td>

                        <td>
                        <a href="<?= base_url('kaprodi/detail_kelas') . '/' . $row->kode_kelas; ?>" class="btn btn-success btn-sm">Lihat Siswa</a>
                        </td>
                    </tr>
                <?php }
              } ?>
               
            </tbody>
      </table>
      </div>
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
                                    <a id="btn-delete" class="btn btn-danger" href="<?php echo site_url('Admin/delete_kelas/' . $row->kode_kelas) ?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>







    </div>
</section>
</div>
</div>
</section>