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
              <li class="breadcrumb-item active">Edit Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<section class="content">
  
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-8">
        <!-- general form elements -->
        <div class="card card-warning">
          <div class="card-header">
            <h3 class="card-title">Form Edit Akun</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <div class="card-body">
          <form action="<?= base_url('guru/changepassword') ?>" method="post">

            <div class="row">
                  <div class="col-10">
                  <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password">
                                    <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
            </div>

            <div class="row">
                  <div class="col-10">
                   <label for="new_password1">New Password</label>
                                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
            </div>

            <div class="row">
            <div class="col-10">
            <label for="new_password2">Repeat Password</label>
                                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            </div>    

        </div>

            
            <div class="card-footer">
                    <a type="button" class="btn btn-danger" href="<?= base_url('guru') ?>">Batal</a>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
              </form>

        </div></div>
           
        <div class="col-md-4">
            <!-- general form elements disabled -->
            <!-- timeline item -->
              <!-- The time line -->
            <div class="timeline">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-red">Harap Dibaca</span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-bell bg-blue"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-clock"></i> <?php echo date('l, d M Y'); ?></span>
                  <h3 class="timeline-header"><a href="#">Petunjuk Pengisian</a> Edit Password</h3>

                  <div class="timeline-body">
                    1. Masukkan Password Lama<br>
                    2. Masukkan Password Baru<br>
                    3. Ulangi Password Baru<br>

                    
                  </div>
                  
                </div>
              </div>

                <div>
                <i class="fas fa-user bg-green"></i>
                <div class="timeline-item">
                  <span class="time"><i class="fas fa-comments"></i><a href="https://api.whatsapp.com/send?phone=+62 "> Hanya Whatsapp</a></span>
                  <h3 class="timeline-header no-border">Edi Susanto, S.Pd &nbsp;&nbsp;<br><a href="https://api.whatsapp.com/send?phone=+62 ">0899-9999-9999</a></h3>
                </div>
               </div>
              </div>
          </div>
              

              

</div></div></div></div></div></div></div></section>