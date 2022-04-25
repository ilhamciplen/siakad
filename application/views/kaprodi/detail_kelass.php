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
                              
                                    <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
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
                                                <td><?= $id++; ?></td>
                                                <td><?= $row->nisn; ?></td>
                                                <td><?= $row->nama_siswa; ?></td>
                                                <td>
                                                <a href="<?= base_url('kaprodi/detail_nilai_siswa') . '/' . $row->nisn; ?>" class="btn btn-success btn-sm">Lihat Nilai</a>
                                                <a data-toggle="modal" data-target="" class="btn btn-primary btn-sm"><i class="fa fa-print"></i>&nbsp;Cetak Rapor</a>
                                                
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

          
            
              

              

</div></div></div></div></div></div></div></section>

<script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>
