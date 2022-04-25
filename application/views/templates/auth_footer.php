    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url()  ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url()  ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url()  ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url()  ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url()  ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url()  ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url()  ?>assets/js/demo/datatables-demo.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                responsive: true
            });
        });
    </script> 

<!-- AdminLTE -->
<!-- jQuery -->
<script src="<?= base_url()  ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()  ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url()  ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()  ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()  ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()  ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url()  ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url()  ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url()  ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url()  ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url()  ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url()  ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url()  ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url()  ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>




    </body>

    </html>