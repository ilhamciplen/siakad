                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;  ?></h1>

                    <div class="row">
                        <div class="col-lg-8">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    </div>

                    <div class="card mb-3" style="max-width: 540px;">

                        <div class="row no-gutters">

                            <div class="col-md-4">
                                <img src="<?= base_url('upload/user/') . $user['image']; ?>" class="card-img">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $user['name']; ?></h5>
                                    <p class="card-text"><?= $user['email']; ?></p>
                                    <p class="card-text"><small class="text-muted">Member since <?= date('d F Y', $user['date_created']);  ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 py-3 border-left-secondary">
                        <div class="card-body">
                            Edit Profil
                            <div>
                                <a href="<?php echo base_url("siswa/edit") ?>" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4 py-3 border-left-secondary">
                        <div class="card-body">
                            Changes Password
                            <div>
                                <a href="<?php echo base_url("siswa/changepassword") ?>" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->