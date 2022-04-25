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
              <li class="breadcrumb-item active">Biodata Siswa</li>
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
                     <h3 class="card-title">Biodata Siswa (last update <?php echo date('d M Y'); ?>)</h3>
                     </div>
                     
                     <div class="card-body">

            <section class="content">
                        <!-- DataTales Example -->
                                    <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>NIK</th>
                    <th>Tanggal Lahir</th>
                    
                    
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php $id = 1;
                foreach ($data as $row) : ?>
                    <tr>
                        <td><?= $id++; ?></td>
                        <td><?= $row->nisn; ?></td>
                        <td><?= $row->nama_siswa; ?></td>
                        <td><?= $row->jenis_kelamin; ?></td>
                        <td><?= $row->nik; ?></td>
                        <td><?= $row->tgl_lahir; ?></td>
                    
                        <td>
                           

                            <a href="<?= base_url('siswa/detail_biodata') . '/' . $row->nisn; ?>" class="btn btn-success btn-sm">Detail</a>
                            
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