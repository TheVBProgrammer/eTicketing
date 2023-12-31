<?php

use App\Components\CategoriesHelper;
use App\Components\ComponentHelper;

$comp=new ComponentHelper();
$cat_comp =new CategoriesHelper();
$is_resolved=$data['status_id']==4;
?>
<div class="card card-primary shadow-sm">
    <div class="card-body">
        <form id="formTickets" class="needs-validation" action="/tracking/support/tickets/update/<?= $data['ticket_id'] ?>" method="post">
            <input type="hidden" name="user_id" value="<?= $data['user_id'] ?>">
            <input type="hidden" name="status_id" value="<?= $data['status_id'] ?>">
            <div class="row">
                <div class="col-md-6">
                    <label for="ticket_number">Ticket #</label>
                    <input type="text" class="form-control" readonly id="ticket_number" name="ticket_number" inputmode="text" placeholder="<autogenerated>" value="<?= $data['ticket_number'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="created_at">Date</label>
                    <input type="text" class="form-control" readonly id="created_at" name="created_at" inputmode="text" placeholder="Date" value="<?= $data['created_at'] ?>" required>
                </div>
            </div>
            <div class="row">
                <?php if($is_resolved){ ?>
                <div class="col-md-12">
                    <label for="status_id">Action</label>
                    <button style="width: 100%" class="btn btn-success"><i class="fas fa-check-circle"></i> Resolved</button>
                </div>
                <?php }else{ ?>
                <div class="col-md-12">
                    <label for="status_id">Action</label>
                    <?= $comp->generateSelect("status_id",$cat_comp->getStatus($data['status_id']!=1),$data['status_id'],"Select Action",true,$is_resolved) ?>
                </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="remarks">Remarks</label>
                    <textarea type="text" class="form-control" <?= $is_resolved ? 'readonly': '' ?> id="remarks" name="remarks" required><?= $data['remarks'] ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="floatingEmailInput">First Name</label>
                    <input type="text" class="form-control" readonly onkeyup="this.value = this.value.toUpperCase();" id="firstname" name="firstname" inputmode="text" autocomplete="firstname" placeholder="<Enter Name>" value="<?= $data['firstname'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="floatingEmailInput">Last Name</label>
                    <input type="text" class="form-control" readonly onkeyup="this.value = this.value.toUpperCase();" id="lastname" name="lastname" inputmode="text" autocomplete="lastname" placeholder="<Enter Lastname>" value="<?= $data['lastname'] ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="floatingEmailInput">Email</label>
                    <input type="email" class="form-control" readonly id="email" name="email" inputmode="text" placeholder="<Enter Email>" value="<?= $data['email'] ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="floatingEmailInput">Priority</label>
                    <?= $comp->generateSelect("priority_id",$cat_comp->getPriority(),$data['priority_id'],"Select Priority",true,true) ?>
                </div>
                <div class="col-md-6">
                    <label for="floatingEmailInput">Category</label>
                    <?= $comp->generateCategorySelect('category_id',$data['category_id'],true,true) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="floatingEmailInput">Office/Section/Division</label>
                    <?= $comp->generateSelect("office_id",$cat_comp->getOfficeSelect(),$data['office_id'],"Select Office",true,true) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="floatingEmailInput">Description</label>
                    <textarea type="text" readonly class="form-control" id="description" name="description" required><?= $data['description'] ?></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <button id="btnClose" style="margin-left: 5px" type="button" class="btn btn-secondary btn-sm float-right" data-dismiss="modal"><i class="fa fa-cancel"></i> Cancel</button>
                    <?php if(!$is_resolved){ ?>
                    <button type="submit" class="btn btn-success btn-sm float-right"><i class="fa fa-save"></i> Submit</button>
                    <?php } ?>
                </div>
            </div>
        </form>
    </div>
</div>

