<?php $this->load->view('admin/alert');?>

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
              <li class="breadcrumb-item active">Data User</li>
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
                     <h3 class="card-title">Daftar Pengguna (last update <?php echo date('d M Y'); ?>)</h3>
                     </div>
                     
                     <div class="card-body">

            <section class="content">
                <div class="row">
                    <div class="col-12">
                         <div class="card">
                            <div class="card-header">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahbaru"><i class="fas fa-plus fa-fw"></i>Tambah User Baru</button>
                            </div>
                        <!-- DataTales Example -->
                                    <table id="example1" class="table table-bordered table-striped">
                                         <thead>
                                             <tr>
                                                 <th>No</th>
                                                 <th>Nama</th>
                                                 <th>Email</th>
                                                 <th>Gambar</th>
                                                 <th>Role ID</th>
                                                 <th>Action</th>

                                             </tr>
                                         </thead>
                                         <tbody>

                                             <?php $id = 1;
                                                foreach ($role as $s) { ?>
                                                 <tr>
                                                     <td><?= $id++; ?></td>
                                                     <td><?= $s->name; ?></td>
                                                     <td><?= $s->email; ?></td>
                                                     <td align=center><img style="width:100px;" src="<?php echo base_url('upload/user/' . $s->image); ?>" alt=""></td>
                                                     <td><?= $s->role; ?></td>

                                                     <td>
                                                         <button title="Edit" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#update_user<?= $s->id ?>"><i class="fas fa-edit"></i></button>
                                                         <a title="Hapus" onclick="deleteConfirm('<?php echo site_url('admin/delete_user/' . $s->id) ?>')" href="#!"  data-toggle="modal" data-target="#deletemodal" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                     </td>
                                                 </tr>
                                             <?php } ?>
                                         </tbody>
                                         <tfoot>
                                             <tr>
                                                 <th>No</th>
                                                 <th>Nama</th>
                                                 <th>Email</th>
                                                 <th>Gambar</th>
                                                 <th>Role ID</th>
                                                 <th>Action</th>
                                             </tr>
                                         </tfoot>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>

                       <!-- Modal Delete info lomba -->

                    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"></span>
                                    </button>
                                </div>
                                <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a id="btn-delete" class="btn btn-danger" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>


                     <!-- Modal add User-->
                     <div class="modal fade" id="tambahbaru" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLongTitle">Tambah User Baru</h5>
                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                                 <div class="modal-body">
                                     <form id="myForm" action="<?php echo site_url('Admin/save_user') ?>" method="post" enctype="multipart/form-data">

                                         <div class="form-group">
                                             <label for="name">Nama*</label>
                                             <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                                         </div>

                                         <div class="form-group">
                                             <label for="email">E-Mail*</label>
                                             <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan E-Mail">
                                         </div>

                                         <div class="form-group">
                                             <label for="nip_nisn">NIP/NISN*</label>
                                             <input type="text" class="form-control" id="nip_nisn" name="nip_nisn" placeholder="Masukkan NIP/NISN">
                                         </div>


                                         <div class="form-group">
                                             <label for="password">Password*</label>
                                             <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                                         </div>

                                         <div class="form-group">
                                             <label for="image">Profil*</label>
                                             <input type="file" class="form-control" id="image" name="image" placeholder="Masukkan Profil">
                                         </div>

                                         <div class="form-group">
                                             <label for="role_id">Role ID*</label>
                                             <select required name="role_id" id="role_id" class="form-control">
                                                 <option value="">Pilih Role ID</option>
                                                 <?php foreach ($role_id as $a) { ?>
                                                     <option value="<?= $a->id; ?>"><?= $a->role; ?></option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                     <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                                 </div>
                                 </form>
                             </div>
                         </div>
                     </div>


                     <!-- Modal Edit User -->
                     <?php foreach ($role as $s) { ?>

                         <div class="modal fade" id="update_user<?= $s->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                             <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                     <div class="modal-header">
                                         <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                         </button>
                                     </div>
                                     <div class="modal-body">
                                         <form id="myForm" action="<?php echo site_url('Admin/update_user/' . $s->id); ?>" method="post" enctype="multipart/form-data">
                                             <div class="form-group">
                                                 <label for="name">Nama*</label>
                                                 <input type="text" class="form-control" id="name" name="name" value="<?= $s->name ?>" placeholder="Masukkan Nama">
                                             </div>

                                             <div class="form-group">
                                                 <label for="email">E-Mail*</label>
                                                 <input type="email" class="form-control" id="email" name="email" value="<?= $s->email ?>" placeholder="Masukkan E-Mail">
                                             </div>

                                             <div class="form-group">
                                                <label for="nip_nisn">NIP/NISN*</label>
                                                <input type="text" class="form-control" id="nip_nisn" name="nip_nisn" value="<?= $s->nip_nisn ?>" placeholder="Masukkan NIP/NISN">
                                            </div>


                                             <div class="form-group">
                                                 <label for="password">Password*</label>
                                                 <input required type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                                             </div>

                                             <div class="form-group">
                                    
                                                 <input type="file" class="form-control" id="image" name="image" value="<?= $s->image ?>" placeholder="Masukkan Profil">
                                             </div>

                                             <div class="form-group">
                                                 <label for="role_id">Role ID*</label>
                                                 <select required name="role_id" id="role_id" class="form-control">
                                                     <option value="">Pilih Role ID</option>
                                                     <?php foreach ($role_id as $a) { ?>
                                                         <option value="<?= $a->id; ?>"><?= $a->role; ?></option>
                                                     <?php } ?>
                                                 </select>
                                             </div>


                                     </div>
                                     <div class="modal-footer">
                                         <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                         <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                                     </div>
                                     </form>
                                 </div>
                             </div>
                         </div>
                     <?php } ?>
                     
                    </div>
                </div>
                </div>
            </section>


            </div>
        </div>
    </div>
</section>

<script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>
