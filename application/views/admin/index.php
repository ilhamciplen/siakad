                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-success">
                            <h3 class="widget-user-username">
                                <font color="#FFFFFF" face="Arial" size="5">&nbsp;Selamat Datang</font>
                            </h3>
                            <h5 class="widget-user-desc">
                                <font color="#FFFFFF" face="Arial" size="4">&nbsp;Sebagai Admin SIAKAD SMK Islam Al Hikmah Mayong</font>
                            </h5>
                        </div>
                        <div class="widget-user-image">
                            <div class="card-title text-center"> <img class="" src="<?= base_url() ?>assets/img/smkia.png" alt="SMKIA" style="width: 200px;" />
                            </div>
                            <div class="card-footer">
                                <div class="">
                                    <!-- /.col -->
                                    <div class="Widget-user-username">
                                        <div class="description-block">
                                            <h3 class="description-header">
                                                <font color="#000000" face="Arial" size="5">SIAKAD</font>
                                            </h3>
                                            <h5 class="description-header">
                                                <font color="#000000" face="Arial" size="4">Sistem Informasi Akademik</font>
                                            </h5>
                                            <h5 class="description-header">
                                                <font color="#000000" face="Arial" size="4"><b>SMK Islam Al Hikmah Mayong</b></font>
                                            </h5>

                                        </div>
                                        <!-- /.description-block -->
                                    </div>


                                    <!-- /.col -->
                                    <!-- Earnings (Monthly) Card Example -->

                                    <div class="row">

                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="card border-left-primary shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <h3><?php foreach ($role as $d) { ?>
                                                                    <?php echo  $d->count; ?>
                                                                <?php } ?> Data User</h3>
                                                            <p>Jumlah User</p>
                                                        </div>
                                                        <a href="<?php echo base_url("admin/data_user") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-xl-3 col-md-6 mb-4">
                                            <div class="card border-left-primary shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <h3> Berita</h3>

                                                        </div>
                                                        <a href="<?php echo base_url("admin/berita") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                    </div>
                </div>
                                                            </div>