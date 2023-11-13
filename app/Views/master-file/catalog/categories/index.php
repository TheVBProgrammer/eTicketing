<?php session()->set('breadcrumb_title', 'Categories');?>
<?= $this->extend('layout/admin_template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-heading"></div>
        <div class="card-body">
            <table id="tbl_categories" class="table table-bordered table-striped table-hover table-responsive">
                <thead class="bg-primary">
                <tr>
                    <th>Category ID</th>
                    <th>Category Group</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($records as $record){
                    echo '<tr>';
                    echo "<td>$record[category_id]</td>";
                    echo "<td>$record[category_group_name]</td>";
                    echo "<td>$record[category_name]</td>";
                    echo "<td style='text-align: center'>";
                    echo "<button class='btn btn-success btn-sm mr-1' id='editRow'><i class='fa fa-edit'></i> Edit</button>";
                   // echo "<button class='btn btn-danger btn-sm' id='deleteRow'><i class='fa fa-trash'></i> Delete</button>";
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
    var groupColumn = 1;
    $('#tbl_categories').DataTable({
        processing: true,
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: true,
        lengthMenu: [5, 10, 20, 50],
        columnDefs: [{ visible: false, targets: groupColumn }],
        order: [[groupColumn, 'asc']],
        displayLength: 25,
        drawCallback: function (settings) {
            var api = this.api();
            var rows = api.rows({ page: 'current' }).nodes();
            var last = null;

            api.column(groupColumn, { page: 'current' })
                .data()
                .each(function (group, i) {
                    if (last !== group) {
                        $(rows)
                            .eq(i)
                            .before(
                                '<tr class="group"><th colspan="5">' +
                                group +
                                '</th></tr>'
                            );

                        last = group;
                    }
                });
        }
    });
</script>
<?= $this->endSection(); ?>
