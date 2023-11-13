<?php session()->set('breadcrumb_title', 'Support Tickets');?>
<?= $this->extend('layout/admin_template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-heading"></div>
        <div class="card-body">
            <div class="row mb-1">
                <div class="col-md-3">
                    <button onclick="BootboxModal('Add New Ticket','/tracking/support/tickets/create',true,size.NORMAL,bootbox_type.PRIMARY,true,true)" class="btn btn-primary btn-sm"><i class="fa fa-ticket-alt"></i> Add New Ticket</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table id="tbl_tickets" style="font-size: 13px" class="table table-bordered table-striped table-hover table-responsive">
                        <thead class="bg-primary">
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Office/Section/Division</th>
                            <th>Severity</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($records as $record){
                            echo '<tr>';
                            echo "<td>$record[ticket_id]</td>";
                            echo "<td>$record[firstname]</td>";
                            echo "<td>$record[lastname]</td>";
                            echo "<td>$record[email]</td>";
                            echo "<td>$record[office_name]</td>";
                            echo "<td><span style='width: 100%' class='btn btn-sm $record[priority_class]'>$record[priority]</span></td>";
                            echo "<td>$record[office_description]</td>";
                            echo "<td><span style='width: 100%' class='$record[btn_class] btn-sm'>$record[status]</span></td>";
                            echo "<td style='text-align: center'>";
                            if($is_admin) {
                                echo "<button onclick='BootboxModal(\"Action Ticket\",\"/tracking/support/tickets/update/$record[ticket_id]\",true,size.NORMAL,bootbox_type.PRIMARY,true,true)' class='btn btn-success btn-sm mr-1'><i class='fa fa-ticket-alt'></i></button>";
                            }else{
                                echo "<span class='btn btn-success btn-sm mr-1 disabled'><i class='fa fa-ticket-alt'></i></span>";
                            }
                            echo "<a href='' class='btn btn-danger btn-sm' title='Delete ticket' data-confirm='Are you sure you want to delete this ticket?' data-method='post'><span class='fa fa-trash'></span></a>";
                            echo "</td>";
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                        <tfoot class="bg-primary">
                        <tr>
                            <th colspan="9"></th>
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
    $('#tbl_tickets').DataTable({
        processing: true,
        responsive: true,
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
