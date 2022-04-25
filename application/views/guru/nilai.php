<?php $this->load->view('guru/alert');?>

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
              <li class="breadcrumb-item active">Input Nilai</li>
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
                     <h5 class="text-center">Input Nilai</h5>
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
                    <th>Kelas</th>
                    <th>Wali Kelas</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tbody>
                <?php $id = 1;
                foreach ($kelas as $row): ?>
                    <tr>
                        <td><?= $id++; ?></td>
                        <td><?= $row->nama_kelas; ?></td>
                        <td><?= $row->nama_guru; ?></td>
                        <td>
                        <a href="<?= base_url('guru/lihat_siswa') . '/' . $row->kode_kelas; ?>" class="btn btn-primary btn-sm">Lihat Siswa</a>
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