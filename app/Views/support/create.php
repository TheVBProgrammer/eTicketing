<?php

use App\Components\CategoriesHelper;
use App\Components\ComponentHelper;

$comp=new ComponentHelper();
$cat_comp =new CategoriesHelper();

?>
<div class="card card-primary shadow-sm">
    <div class="card-body">
        <form id="formTickets" class="needs-validation" action="/tracking/support/tickets/create" method="post">
            <input type="hidden" name="user_id" value="<?= $data['user_id'] ?>">
            <input type="hidden" id="status_id" name="status_id" value="<?= $data['status_id'] ?>">
        <div class="row">
            <div class="col-md-6">
                <label for="floatingEmailInput">Ticket #</label>
                <input type="text" class="form-control" id="ticket_number" readonly name="ticket_number" inputmode="text" autocomplete="ticket_number" placeholder="<autogenerated>" value="<?= $data['ticket_number'] ?>">
            </div>
            <div class="col-md-6">
                <label for="floatingEmailInput">Date</label>
                <input type="text" class="form-control" readonly id="created_at" name="created_at" inputmode="text" autocomplete="created_at" placeholder="Date" value="<?= $data['created_at'] ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="floatingEmailInput">First Name</label>
                <input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase();" id="firstname" name="firstname" inputmode="text" autocomplete="firstname" placeholder="<Enter Name>" value="<?= $data['firstname'] ?>" required>
            </div>
            <div class="col-md-6">
                <label for="floatingEmailInput">Last Name</label>
                <input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase();" id="lastname" name="lastname" inputmode="text" autocomplete="lastname" placeholder="<Enter Lastname>" value="<?= $data['lastname'] ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="floatingEmailInput">Email</label>
                <input type="email" class="form-control" id="email" name="email" inputmode="text" placeholder="<Enter Email>" value="<?= $data['email'] ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="floatingEmailInput">Priority</label>
                <?= $comp->generateSelect("priority_id",$cat_comp->getPriority(),$data['priority_id'],"Select Priority") ?>
            </div>
            <div class="col-md-6">
                <label for="floatingEmailInput">Category</label>
                <?= $comp->generateCategorySelect('category_id',$data['category_id']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="floatingEmailInput">Office/Section/Division</label>
                <?= $comp->generateSelect("office_id",$cat_comp->getOfficeSelect(),$data['office_id'],"Select Office") ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="floatingEmailInput">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" value="<?= $data['description'] ?>" required></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <button id="btnClose" style="margin-left: 5px" type="button" class="btn btn-secondary btn-sm float-right" data-dismiss="modal"><i class="fa fa-cancel"></i> Cancel</button>
                <button type="submit" class="btn btn-primary btn-sm float-right"><i class="fa fa-save"></i> Save Draft</button>
                <button id="btnSubmit" type="button" class="btn btn-success btn-sm float-right mr-1"><i class="fa fa-send"></i> Submit</button>
            </div>
        </div>
        </form>
    </div>
</div>
<script type="application/javascript">
    $("#btnSubmit").click(function(){
        bootbox.confirm({
            title: 'eTicketing',
            message: 'Are you sure you want to submit this ticket?',
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> No'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Yes'
                }
            },
            callback: function (result) {
                if(result){
                    $("#status_id").val(2);
                    $("#formTickets").submit();
                }
            }
        });
    });
</script>