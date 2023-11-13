<?php session()->set('breadcrumb_title', 'Category Group');?>
<?= $this->extend('layout/admin_template'); ?>
<?= $this->section('content'); ?>
<?php

?>
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-heading"></div>
        <div class="card-body">
            <table style="width: 100%" id="tbl_category_group" class="table table-bordered table-striped table-hover table-responsive">
                <thead class="bg-primary">
                <tr>
                    <th>Category Group ID</th>
                    <th>Category Group Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($records as $record){
                    echo '<tr>';
                    echo "<td>$record[category_group_id]</td>";
                    echo "<td>$record[category_group_name]</td>";
                    echo "<td style='text-align: center'>";
                    echo "<button class='btn btn-primary btn-sm mr-1' id='viewRow'><i class='fa fa-eye'></i> View</button>";
                    echo "<button class='btn btn-success btn-sm mr-1' id='editRow'><i class='fa fa-edit'></i> Edit</button>";
                    echo "<button class='btn btn-danger btn-sm' id='deleteRow'><i class='fa fa-trash'></i> Delete</button>";
                    echo "</td>";
                    echo '</tr>';
                }
                ?>
                </tbody>
                <tfoot class="bg-primary">
                <tr>
                    <th colspan="4"></th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('pagescripts'); ?>
<script type="application/javascript">
    $('#tbl_category_group').DataTable({
        processing: false,
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
