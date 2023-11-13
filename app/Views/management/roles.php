<?php

use App\Components\CategoriesHelper;
use App\Models\AuthGroupUsers;
use App\Components\ComponentHelper;

session()->set('breadcrumb_title', 'Roles');
$this->extend('layout/admin_template');
$this->section('content');
$user_id=$data['user_id'];
$auth_group_users=new AuthGroupUsers();
$assigned_groups=$auth_group_users->select('id, user_id, group')->where('user_id=',$user_id)->findAll();
$cat_helper=new CategoriesHelper();
$users=$cat_helper->getAllUsers();
$comp_helper=new ComponentHelper();
$available_array=['admin','user'];
foreach($assigned_groups as $assigned_group){
    $keyToRemove = array_search($assigned_group['group'], $available_array);
    unset($available_array[$keyToRemove]);
}
if(!$user_id){
    $disabled='disabled';
}else{
    $disabled='';
}
if(count($available_array)<=0 || !$user_id){
    $disabled_available='disabled';
}else{
    $disabled_available='';
}
if(count($assigned_groups)<=0 || !$user_id){
    $disabled_assigned='disabled';
}else{
    $disabled_assigned='';
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-heading bg-primary"><span class="ml-1">Role & Permissions</span></div>
            <div class="card-body">
                <form id="formRoles" class="needs-validation" action="/management/roles/assign" method="post">
                <div class="row mb-1">
                    <div class="col-md-5">
                        <div class="input-group">
                            <?= $comp_helper->generateSelect('user_id',$cat_helper->getAllUsersSelect(),$user_id) ?>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary" href="/management/roles/assign"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-btn">
                            <label class="btn btn-default" class="control-label">Username:</label>
                            </span>
                            <input name="username" class="form-control" value="<?= $data['username'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="text" class="form-control search" data-target="available" placeholder="Search for Available Role">
                            <span class="input-group-btn">
                                <a id="role-refresh" class="btn btn-default" href="/management/roles/assign"><i class="fa fa-recycle"></i></a>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-2 text-center">

                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control search" data-target="assigned" placeholder="Search for assigned Role">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <select id="select_available" <?= $disabled_available ?> onclick="$('#btnAddRole').attr('href','/management/roles/save-group/<?= $user_id ?>/'+this.value)" size="15" class="form-control list" style="margin-top: 3px" data-target="available">
                            <?php foreach($available_array as $item){
                            echo "<option value='$item'>$item</option>";
                            } ?>
                        </select>
                    </div>
                    <div class="col-md-2 text-center">
                        <div>
                            <a id="btnAddRole" href="#" style="width: 100%" class="btn btn-success mb-1 <?= $disabled ?>"><i class="fa fa-arrow-right"></i> Add Role</a>
                            <a id="btnRemoveRole" <?= $disabled ?> href="#" style="width: 100%" class="btn btn-danger <?= $disabled ?>"><i class="fa fa-arrow-left"></i> Remove Role</a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <select size="15" <?= $disabled_assigned ?> onclick="$('#btnRemoveRole').attr('href','/management/roles/remove-group/<?= $user_id ?>/'+this.value)" class="form-control list" style="margin-top: 3px" data-target="assigned">
                            <?php
                            foreach($assigned_groups as $assigned_group){
                                echo "<option value='$assigned_group[group]'>$assigned_group[group]</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<script type="application/javascript">
    $("#select_available").onchange(function(){
        alert(this.value);
    })
</script>
