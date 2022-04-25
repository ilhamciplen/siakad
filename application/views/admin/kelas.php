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
                     <h3 class="card-title">Data Kelas (last update <?php echo date('d M Y'); ?>)</h3>
                     </div>
                     
                     <div class="card-body">

            <section class="content">
                <div class="row">
                    <div class="col-12">
                         <div class="card">
                            <div class="card-header">
                            <a href="<?php echo base_url("admin/tambah_kelas") ?>" class="btn btn-primary">Tambah Data Baru</a>
                            </div>

                        <!-- DataTales Example -->
                                    <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Kelas</th>
                    <th>Nama Kelas</th>
                    <th>Wali Kelas</th>
                    <th>Ruangan</th>
                    <th>Gedung</th>
                    <th>Jurusan</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tbody>
                <?php $id = 1;
                foreach ($kelas as $row) : ?>
                    <tr>
                        <td><?= $id++; ?></td>
                        <td><?= $row->kode_kelas; ?></td>
                        <td><?= $row->nama_kelas; ?></td>
                        <td><?= $row->nama_guru; ?></td>
                        <td><?= $row->nama_ruangan; ?></td>
                        <td><?= $row->nama_gedung; ?></td>
                        <td><?= $row->nama_jurusan; ?></td>

                        <td>
                        <?php echo anchor('admin/detail_kelas/'.$row->kode_kelas, '<div title="Detail" class="btn btn-success btn-sm"><i class="fa fa-bars"></i></div>')?>
                            <?php echo anchor('admin/edit_kelas/'.$row->kode_kelas, '<div title="Edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')?>
                            <a title="Hapus" onclick="deleteConfirm('<?php echo site_url('admin/delete_kelas/' . $row->kode_kelas) ?>')" href="#!"  data-toggle="modal" data-target="#deletemodal" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
               
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
                                    <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

</div>
</section>
</div>
</div>
</section>

<script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>






                    