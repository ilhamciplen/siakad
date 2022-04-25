<script src="<?php echo base_url() ?>assets/assets/tinymce/js/tinymce/tinymce.min.js"></script>
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
              <li class="breadcrumb-item active">Berita</li>
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
                     <h3 class="card-title">Data Berita (last update <?php echo date('d M Y'); ?>)</h3>
                     </div>
                     
                     <div class="card-body">

            <section class="content">
                <div class="row">
                    <div class="col-12">
                         <div class="card">
                            <div class="card-header">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahbaru"><i class="fas fa-plus fa-fw"></i>Tambah Data Baru</button>
                    </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Foto</th>
                                                <th>Isi</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $id = 1;
                                            foreach ($berita as $s) { ?>
                                                <tr>
                                                    <td><?= $id++; ?></td>
                                                    <td><?= $s->judul; ?></td>
                                                    <td align=center><img style="width:100px;" src="<?php echo base_url('upload/berita/' . $s->foto); ?>" alt=""></td>
                                                    <td><?= $s->isi; ?></td>

                                                    <td>
                                                        <button title="Edit" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#update_berita<?= $s->id ?>"><i class="fas fa-edit"></i></button>
                                                        <a title="Hapus" onclick="deleteConfirm('<?php echo site_url('admin/delete_berita/' . $s->id) ?>')" href="#!"  data-toggle="modal" data-target="#deletemodal" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Foto</th>
                                                <th>Isi</th>
                                                <th>Action</th>

                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        
                    </div>


                    <script type='text/javascript'>
                        tinymce.init({
                            selector: 'textarea',
                            height: 400,

                            plugins: [
                                'advlist autolink lists link image charmap print preview anchor',
                                'searchreplace visualblocks code fullscreen',
                                'insertdatetime media table paste code help wordcount'
                            ],
                            toolbar: 'undo redo | formatselect | ' +
                                'bold italic backcolor | alignleft aligncenter ' +
                                'alignright alignjustify | bullist numlist outdent indent | ' +
                                'removeformat | help',
                            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
                        });
                    </script>


                    <!-- Modal add -->

                    <div class="modal fade" id="tambahbaru" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Baru</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form id="myForm" action="<?php echo site_url('Admin/save_berita') ?>" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label for="judul">Judul*</label>
                                            <input required type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Nama">
                                        </div>


                                        <div class="form-group">
                                            <label for="bukti">Upload Foto*</label>
                                            <input required type="file" class="form-control" id="foto" name="foto">
                                        </div>

                                        <div class="form-group">
                                            <label for="isi">Isi*</label>


                                            <textarea id="isi" class='editor' name='isi'>
      <?php if (isset($isi)) {
            echo $isi;
        } ?> 
      </textarea>

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

                    <!-- Modal Delete info lomba -->

                    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
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



                    <!-- Modal Edit Info Lomba -->

                    <?php foreach ($berita as $s) { ?>

                        <div class="modal fade" id="update_berita<?= $s->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="myForm" action="<?php echo site_url('Admin/update_berita/' . $s->id); ?>" method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="judul">Judul*</label>
                                                <input required type="text" class="form-control" id="judul" name="judul" value="<?= $s->judul ?>" placeholder="Masukkan Nama">
                                            </div>


                                            <div class="form-group">
                                                <label for="foto">Upload Foto*</label>
                                                <input type="file" class="form-control" id="file" name="file">
                                            </div>

                                            <div class="form-group">
                                                <label for="isi">Isi*</label>
                                                <textarea class="form-control" type="text" name="isi" placeholder="Masukkan Isi Redaksi" maxlength="500" cols="20" rows="20"><?php echo $s->isi ?></textarea>


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
