<?php ?>
<!-- jQuery -->
<script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootbox -->
<script src="<?= base_url() ?>assets/bootbox/dist/bootbox.min.js"></script>
<script src="<?= base_url() ?>assets/js/dialog.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script type="application/javascript">
    // app.js

    //$(document).ready(function () {
        // Get the current URL path
    //    var path = window.location.pathname;
        // Set the active state for each navbar item
    //    $('.nav-sidebar li').each(function () {
     //       var $li = $(this);
    //        var $link = $li.find('a');
    //        var href = $link.attr('href');

            // Check if the current path starts with the href value
     //       if (path==href) {
     //           $link.addClass('active');
     //           $li.addClass('menu-is-opening menu-open');
     //           $li.parents('.nav-item').addClass('menu-is-opening menu-open');
     //       }.
     //   });
    //});
</script>
