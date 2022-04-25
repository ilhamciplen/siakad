<div class="content-wrapper">
         <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title;  ?></h1>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha512-iQQV+nXtBlmS3XiDrtmL+9/Z+ibux+YuowJjI4rcpO7NYgTzfTOiFNm09kWtfZzEB9fQ6TwOVc8lFVWooFuD/w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('guru') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Jadwal Mengajar</li>
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
                     <h5 class="text-center">Jadwal Mengajar Anda</h5>
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
                    <th>Jadwal Pelajaran</th>
                    <th>Kelas</th>
                    <th>Guru</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Ruangan</th>
                    <th>Semester</th>

                </tr>
            </thead>

            <tbody>
                <?php $id = 1;
                foreach ($kbm as $row) {
                    if ($nip == $row->guru_pengampu){
                        ?>
                    <tr>
                        <td><?= $id++; ?></td>
                        <td><?= $row->nama_mapel; ?></td>
                        <td><?= $row->nama_kelas; ?></td>
                        <td><?= $row->nama_guru; ?></td>
                        <td><?= $row->hari; ?></td>
                        <td><?= $row->jam; ?></td>
                        <td><?= $row->ruangan_kode; ?></td>
                        <td><?= $row->nama_semester; ?></td>
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
