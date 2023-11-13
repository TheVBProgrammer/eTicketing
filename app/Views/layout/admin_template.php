<?php
$breadcrumbs_title=session()->get('breadcrumb_title');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <?php include 'menu.php'; ?>
    <div class="content-wrapper">
            <div class="container-fluid2 pb-0 mb-0">
                <div class="row pb-0 mb-0 bg-gray ml-1 mr-1">
                    <div class="col-sm-6 pb-0 mb-0">
                        <h5 class="m-0"><?= $breadcrumbs_title ?></h5>
                    </div><!-- /.col -->
                    <hr style="margin-bottom: 0px;margin-top: 0px;border: 2px solid gray">
                </div><!-- /.row -->
            </div>
        <div class="container-fluid mt-2">
            <section class="content">
            <?= $this->renderSection('content'); ?>
            </section>
        </div>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2023 <a href="https://www.linkedin.com/in/nolan-sunico-4552ab39/">Nolan F. Sunico</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>


</div>
<!-- ./wrapper -->

<?php include 'scripts.php'; ?>

<?= $this->renderSection('pagescripts'); ?>
</body>

</html>