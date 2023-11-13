<?php
/* @var $officeModel App\Models\form\OfficeModel */

use App\Components\CategoriesHelper;
use App\Components\ComponentHelper;

$cat_comp =new CategoriesHelper();
$comp=new ComponentHelper();
if($officeModel->is_newrecord){
    $action_url="/master-file/catalog/office/create";
}else{
    $action_url="/master-file/catalog/office/update/$officeModel->office_id";
}
?>
<form action="<?= $action_url ?>"  method="post" class="needs-validation" novalidate>
    <div class="row">
        <div class="col-md-12">
            <label for="office_code">Office Code</label>
            <input type="text" class="form-control" id="office_code" required name="office_code" value="<?= $officeModel->office_code ?>" placeholder="enter office code">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="office_name">Office Name</label>
            <input type="text" class="form-control" id="office_name" required name="office_name" value="<?= $officeModel->office_name ?>" placeholder="enter office name">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="office_type_id">Office Type</label>
            <?= $comp->generateSelect("office_type_id",$cat_comp->getOfficeType(),$officeModel->office_type_id,"Select Office Type") ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="5" class="form-control"><?= $officeModel->description ?></textarea>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <button id="btnClose" style="margin-left: 5px" type="button" class="btn btn-secondary btn-sm float-right" data-dismiss="modal"><i class="fa fa-cancel"></i> Cancel</button>
            <button type="submit" class="btn btn-success btn-sm float-right"><i class="fa fa-save"></i> Submit</button>
        </div>
    </div>
</form>
