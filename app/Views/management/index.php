<?php session()->set('breadcrumb_title', 'Offices');?>
<?= $this->extend('layout/admin_template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-heading"></div>
        <div class="card-body">
            <div class="row mb-1">
                <div class="col-md-3">
                    <button onclick="BootboxModal('Add New User','/management/register',true,size.NORMAL,bootbox_type.PRIMARY,true,true)" class="btn btn-primary"><i class="fa fa-user-plus"></i> Add New User</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <table id="tbl_offices" class="table table-bordered table-striped table-hover table-responsive">
                <thead class="bg-primary">
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Status Message</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($records as $record){
                    echo '<tr>';
                    echo "<td>$record[id]</td>";
                    echo "<td>$record[username]</td>";
                    echo "<td>$record[status_message]</td>";
                    echo "<td>$record[active]</td>";
                    echo "<td style='text-align: center'>";
                    echo "<button onclick='BootboxModal(\"Update User\",\"/management/register\",true,size.NORMAL,bootbox_type.PRIMARY,true,true)' class='btn btn-success btn-sm mr-1' id='editRow'><i class='fa fa-edit'></i> Edit</button>";
                    echo "</td>";
                    echo '</tr>';
                }
                ?>
                </tbody>
                <tfoot class="bg-primary">
                <tr>
                    <th colspan="5"></th>
                </tr>
                </tfoot>
            </table>
                </div>
            </div>
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
