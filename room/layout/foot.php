<?php include 'modals/md_euser.php'; ?>
<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">
    E-Arsip V 1.0
  </div>
  <!-- Default to the left -->
  <strong>Developed &copy; 2024</strong>
</footer>
</div>
<!-- ./wrapper -->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<!-- SweetAlert -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../plugins/sweetalert/js/qunit-1.18.0.js"></script>
<!-- Toastr -->
<script src="../plugins/toastr/toastr.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js"></script>
<?php
if (@$_SESSION['pesan_user_suksesedit']) { ?>
  <script>
    toastr.success('<?php echo $_SESSION['pesan_user_suksesedit']; ?>')
  </script>
<?php unset($_SESSION['pesan_user_suksesedit']);
}

if (@$_SESSION['pesan_user_gagaledit']) { ?>
  <script>
    toastr.warning('<?php echo $_SESSION['pesan_user_gagaledit']; ?>')
  </script>
<?php unset($_SESSION['pesan_user_gagaledit']);
}
?>
<script>
  $(document).ready(function() {
    var table = $('#data1').DataTable({
      "scrollY": "400px",
      "paging": true,
      "ordering": true
    });

    $('a.toggle-vis').on('click', function(e) {
      e.preventDefault();
      var column = table.column($(this).attr('data-column'));
      column.visible(!column.visible());
    });
  });

  $(document).on("click", "#td_euser", function() {
    let id = $(this).data('id');
    let em = $(this).data('em');

    $("#md_euser #id_user").val(id);
    $("#md_euser #em_user").val(em);
  })

  $(document).ready(function(e) {
    $('#form').on("submit", function(e) {
      e.preventDefault();
      $.ajax({
        url: 'a_euser.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(msg) {
          $('.table').html(msg);
        }
      });
    });
  })

  function konfirmasi(delete_url) {
    $('#modal_delete').modal('show', {
      backdrop: 'static'
    });
    document.getElementById('delete_link').setAttribute('href', delete_url);
  }

  function logout_modal(logout_url) {
    $('#modal_logout').modal('show', {
      backdrop: 'static'
    });
    document.getElementById('logout_link').setAttribute('href', logout_url);
  }
</script>
</body>

</html>