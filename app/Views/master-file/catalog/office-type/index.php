<?php session()->set('breadcrumb_title', 'Offices');?>
<?= $this->extend('layout/admin_template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-heading"></div>
        <div class="card-body">
            <table id="tbl_office_type" class="table table-bordered table-striped table-hover table-responsive">
                <thead class="bg-primary">
                <tr>
                    <th>Office Type ID</th>
                    <th>Office Type</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($records as $record){
                    echo '<tr>';
                    echo "<td>$record[office_type_id]</td>";
                    echo "<td>$record[office_type]</td>";
                    echo '</tr>';
                }
                ?>
                </tbody>
                <tfoot class="bg-primary">
                <tr>
                    <th colspan="6"></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('pagescripts'); ?>
<script type="application/javascript">
    $('#tbl_office_type').DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: true,
        lengthMenu: [5, 10, 20, 50]
    });
</script>
<?= $this->endSection(); ?>
