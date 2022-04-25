
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
              <li class="breadcrumb-item"><a href="<?= base_url('siswa') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Jadwal</li>
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
                    <th>Kode Kelas</th>
                    <th>Nama Kelas</th>
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
                        <td>

                        <a href="<?= base_url('siswa/detail_jadwal') . '/' . $row->kode_kelas; ?>" class="btn btn-primary btn-sm">Lihat Jadwal</a>
                            
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






                    