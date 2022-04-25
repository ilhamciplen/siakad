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
              <li class="breadcrumb-item active"><a href="<?= base_url('admin/jadwal') ?>">Jadwal</a></li>
              <li class="breadcrumb-item active">Detail Jadwal</li>
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
          <div class="col-6">
                 <div class="card card-warning">
                     <div class="card-header">
                     <h3 class="card-title">Senin</h3>
                     </div>
                     
                     <div class="card-body">

                    <section class="content">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body p-0">
                                    <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Waktu</th>
                                            <th>Pelajaran</th>
                                            <th>Guru</th>
                                           

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $kode_jadwal = 1;
                                        foreach ($jadwal as $row){
                                            if($kode_kelast == $row->kelas_kode && $row->hari == 'Senin'){
                                             ?>
                                         
                                            <tr>
                                                <td><?= $row->jam; ?></td>
                                                <td><?= $row->nama_mapel; ?></td>
                                                <td><?= $row->nama_guru; ?></td>
                                                
                                            </tr>
                                            
                                        <?php }
                                    } ?>
                                    
                                    </tbody>
                            </table>
                            </div>
                            </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>


            <!-- left column -->
            <div class="col-6">
                            <div class="card card-warning">
                                <div class="card-header">
                                <h3 class="card-title">Selasa</h3>
                                </div>
                                
                                <div class="card-body">

                                <section class="content">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card-body p-0">
                                                <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Waktu</th>
                                                        <th>Pelajaran</th>
                                                        <th>Guru</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php $kode_jadwal = 1;
                                                    foreach ($jadwal as $row){
                                                        if($kode_kelast == $row->kelas_kode && $row->hari == 'Selasa'){
                                                        ?>
                                                        <tr>
                                                            <td><?= $row->jam; ?></td>
                                                            <td><?= $row->nama_mapel; ?></td>
                                                            <td><?= $row->nama_guru; ?></td>
                                                            
                                                        </tr>
                                                    
                                                        <?php }
                                                } ?>
                                                
                                                </tbody>
                                        </table>
                                        </div>
                                        </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>

                        <!-- left column -->
                        <div class="col-6">
                            <div class="card card-warning">
                                <div class="card-header">
                                <h3 class="card-title">Rabu</h3>
                                </div>
                                
                                <div class="card-body">

                                <section class="content">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card-body p-0">
                                                <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Waktu</th>
                                                        <th>Pelajaran</th>
                                                        <th>Guru</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php $kode_jadwal = 1;
                                                    foreach ($jadwal as $row){
                                                        if($kode_kelast == $row->kelas_kode && $row->hari == 'Rabu'){
                                                        ?>
                                                        <tr>
                                                            <td><?= $row->jam; ?></td>
                                                            <td><?= $row->nama_mapel; ?></td>
                                                            <td><?= $row->nama_guru; ?></td>
                                                            
                                                        </tr>
                                                    
                                                        <?php }
                                                } ?>
                                                
                                                </tbody>
                                        </table>
                                        </div>
                                        </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>

                        <!-- left column -->
                        <div class="col-6">
                            <div class="card card-warning">
                                <div class="card-header">
                                <h3 class="card-title">Kamis</h3>
                                </div>
                                
                                <div class="card-body">

                                <section class="content">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card-body p-0">
                                                <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Waktu</th>
                                                        <th>Pelajaran</th>
                                                        <th>Guru</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php $kode_jadwal = 1;
                                                    foreach ($jadwal as $row){
                                                        if($kode_kelast == $row->kelas_kode && $row->hari == 'Kamis'){
                                                        ?>
                                                        <tr>
                                                            <td><?= $row->jam; ?></td>
                                                            <td><?= $row->nama_mapel; ?></td>
                                                            <td><?= $row->nama_guru; ?></td>
                                                        </tr>
                                                    
                                                        <?php }
                                                } ?>
                                                
                                                </tbody>
                                        </table>
                                        </div>
                                        </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>

                       <!-- left column -->
                       <div class="col-6">
                            <div class="card card-warning">
                                <div class="card-header">
                                <h3 class="card-title">Jumat</h3>
                                </div>
                                
                                <div class="card-body">

                                <section class="content">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card-body p-0">
                                                <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Waktu</th>
                                                        <th>Pelajaran</th>
                                                        <th>Guru</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php $kode_jadwal = 1;
                                                    foreach ($jadwal as $row){
                                                        if($kode_kelast == $row->kelas_kode && $row->hari == 'Jumat'){
                                                        ?>
                                                        <tr>
                                                            <td><?= $row->jam; ?></td>
                                                            <td><?= $row->nama_mapel; ?></td>
                                                            <td><?= $row->nama_guru; ?></td>
                                                            
                                                        </tr>
                                                    
                                                        <?php }
                                                } ?>
                                                
                                                </tbody>
                                        </table>
                                        </div>
                                        </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>

                       <!-- left column -->
                       <div class="col-6">
                            <div class="card card-warning">
                                <div class="card-header">
                                <h3 class="card-title">Sabtu</h3>
                                </div>
                                
                                <div class="card-body">

                                <section class="content">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card-body p-0">
                                                <table class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Waktu</th>
                                                        <th>Pelajaran</th>
                                                        <th>Guru</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php $kode_jadwal = 1;
                                                    foreach ($jadwal as $row){
                                                        if($kode_kelast == $row->kelas_kode && $row->hari == 'Sabtu'){
                                                        ?>
                                                        <tr>
                                                            <td><?= $row->jam; ?></td>
                                                            <td><?= $row->nama_mapel; ?></td>
                                                            <td><?= $row->nama_guru; ?></td>
                                                            
                                                        </tr>
                                                    
                                                        <?php }
                                                } ?>
                                                
                                                </tbody>
                                        </table>
                                        </div>
                                        </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>

                     

</div></div></div></div></div></div></div></section>