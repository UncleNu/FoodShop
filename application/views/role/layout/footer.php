  <!-- /.card -->
  </div>
  </div>
  </div>
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  </div>
  </div>
  </div>
  </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
          <b>Version</b> 1.0.4
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="http://dwasoft.com">dwasoft.com</a>.</strong> All rights
      reserved. &nbsp;
      Urs. <?php echo  @$_SESSION['user_name']; ?> lv. <?php echo @$_SESSION['user_level']; ?>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->


  <!-- Bootstrap 4 -->
  <script src="<?php echo BASE_URL; ?>/static/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables -->
  <script src="<?php echo BASE_URL; ?>/static/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo BASE_URL; ?>/static/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo BASE_URL; ?>/static/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo BASE_URL; ?>/static/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo BASE_URL; ?>/static/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo BASE_URL; ?>/static/dist/js/demo.js"></script>
  <!-- page script -->




  <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>








  <script>
$(function() {
    $("#datatable").DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Thai.json"
        },
        "dom": '<"top"p>rt<"bottom"flp><"clear">',
        stateSave: true,
        "paging": true,
        "responsive": true,
        "autoWidth": false,
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5' ,'print'
        ]
    });
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