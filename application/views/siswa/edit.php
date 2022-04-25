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
              <li class="breadcrumb-item active">Edit Akun</li>
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
            <?= form_open_multipart('siswa/edit'); ?>

            <div class="row">
                  <div class="col-5">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?> " readonly>
                  </div>
                  <div class="col-5">
                    <label>Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>');  ?>
                  </div>
            </div>

            <div class="row">
                  <div class="col-10">
                  <label>Picture</label>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('upload/user/') . $user['image']; ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                  </div>
            </div>

            
            <div class="card-footer">
                    <a type="button" class="btn btn-danger" href="<?= base_url('siswa') ?>">Batal</a>
                    <button type="submit" class="btn btn-primary">Edit</button>
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
                  <h3 class="timeline-header"><a href="#">Petunjuk Pengisian</a> Edit Profile</h3>

                  <div class="timeline-body">
                    1. Silahkan Masukkan Nama Lengkap<br>
                    2. Silahkan Masukkan Foto/Gambar dari perangkat Anda (jpg/png)<br>
                    3. Klik Edit<br>

                    
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