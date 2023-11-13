<?php session()->set('breadcrumb_title', 'Offices');?>
<?= $this->extend('layout/admin_template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-heading"></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <button onclick="BootboxModal('Add New Office','/master-file/catalog/office/create',true,size.NORMAL,bootbox_type.PRIMARY,true,true)" class="btn btn-primary btn-sm mb-2"><i class="fa fa-user-plus"></i> Add New Office</button>
                </div>
            </div>
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
                    echo "<button onclick='BootboxModal(\"Edit Office\",\"/master-file/catalog/office/update/$record[office_id]\",true,size.NORMAL,bootbox_type.PRIMARY,true,true)' class='btn btn-success btn-sm'><i class='fa fa-edit'></i></button>";
                    //echo "<button class='btn btn-danger btn-sm' id='deleteRow'><i class='fa fa-trash'></i> Delete</button>";
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
