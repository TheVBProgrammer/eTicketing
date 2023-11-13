<?php session()->set('breadcrumb_title', 'Offices');?>
<?= $this->extend('layout/admin_template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-heading"></div>
        <div class="card-body">
            <table id="tbl_offices" class="table table-bordered table-striped table-hover table-responsive">
                <thead class="bg-primary">
                <tr>
                    <th>ID</th>
                    <th>Office Name</th>
                    <th>Office Code</th>
                    <th>Office Type</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($records as $record){
                    echo '<tr>';
                    echo "<td>$record[office_id]</td>";
                    echo "<td>$record[office_name]</td>";
                    echo "<td>$record[office_code]</td>";
                    echo "<td>$record[office_type]</td>";
                    echo "<td>$record[description]</td>";
                    echo "<td style='text-align: center'>";
                    echo "<button class='btn btn-success btn-sm mr-1' id='editRow'><i class='fa fa-edit'></i> Edit</button>";
                    echo "<button class='btn btn-danger btn-sm' id='deleteRow'><i class='fa fa-trash'></i> Delete</button>";
                    echo "</td>";
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
    $('#tbl_offices').DataTable({
        processing: true,
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
