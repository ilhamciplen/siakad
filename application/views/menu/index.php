<?php $this->load->view('menu/alert');?>

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
              <li class="breadcrumb-item active">Menu Management</li>
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
                     <h3 class="card-title">Menu Management (last update <?php echo date('d M Y'); ?>)</h3>
                     </div>
                     
                     <div class="card-body">

            <section class="content">
                <div class="row">
                    <div class="col-12">
                         <div class="card">
                            <div class="card-header">
                                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal"> Add New Menu</a>
                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    
                                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <table id="example1" class="table table-bordered table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">#</th>
                                                                            <th scope="col">Menu</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php $i = 1  ?>
                                                                        <?php foreach ($menu as $m) : ?>
                                                                            <tr>
                                                                                <th scope="row"><?= $i;  ?></th>
                                                                                <td><?= $m['menu']; ?></td>

                                                                            </tr>
                                                                            <?php $i++; ?>
                                                                        <?php endforeach; ?>
                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>



                                                    </div>
                                                    <!-- /.container-fluid -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End of Main Content -->

                    <!-- Modal -->
                    <!-- Button trigger modal -->

                    <!-- Modal Tambah -->
                    <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('menu'); ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Edit -->

                    <?php foreach ($menu as $m) { ?>

                        <div class="modal fade" id="update_menu" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="newMenuModalLabel">Edit Menu</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('menu'); ?>" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>