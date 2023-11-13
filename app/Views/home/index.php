<?php session()->set('breadcrumb_title', 'Dashboard');?>
<?= $this->extend('layout/admin_template'); ?>
<?php
use App\Components\CategoriesHelper;
use App\Components\ComponentHelper;

$cat_helper=new CategoriesHelper();
$comp_helper=new ComponentHelper();
// checks if the current user is an admin
$is_admin=$comp_helper->CheckCurrentRole('admin');
//Get the current user_id
$user_id=auth()->user()->id;
$data=$cat_helper->getPriorityByGroup($is_admin);
$priority_arr=[];
$priority_low=0;
$priority_medium=0;
$priority_high=0;
$priority_critical=0;
foreach($data as $item){
    switch($item['priority_id']){
        case 1: //Low
            $priority_low=$item['priority_count'];
            break;
        case 2: //Medium
            $priority_medium=$item['priority_count'];
            break;
        case 3: //High
            $priority_high=$item['priority_count'];
            break;
        case 4: //Critical
            $priority_critical=$item['priority_count'];
            break;
        default: // Others
    }
}
$data_status=$cat_helper->getStatusByGroup($is_admin);
$status_draft=0;
$status_pending=0;
$status_processing=0;
$status_resolved=0;
foreach($data_status as $item){
    switch($item['status_id']){
        case 1: //Draft
            $status_draft=$item['status_count'];
            break;
        case 2: //Pending
            $status_pending=$item['status_count'];
            break;
        case 3: //Processing
            $status_processing=$item['status_count'];
            break;
        case 4: //Resolved
            $status_resolved=$item['status_count'];
            break;
        default: // Others
    }
}

?>
<?= $this->section('content'); ?>
<div class="container-fluid">
        <div class="card card-secondary">
            <div class="card-header"></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-default">
                            <div class="inner">
                                <h3><?= $status_draft ?></h3>

                                <p>Draft</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-file"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?= $status_pending ?></h3>

                                <p>Pending</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-clock"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3><?= $status_processing ?></h3>

                                <p>Processing</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-cog"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?= $status_resolved ?></h3>

                                <p>Resolved</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?= $priority_low ?></h3>

                                <p>Low</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-arrow-down"></i>
                            </div>
                            <a href="/tracking/support/tickets" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-fuchsia">
                            <div class="inner">
                                <h3><?= $priority_medium ?></h3>

                                <p>Medium</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-arrows-alt-h"></i>
                            </div>
                            <a href="/tracking/support/tickets" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gradient-indigo">
                            <div class="inner">
                                <h3><?= $priority_high ?></h3>

                                <p>HIGH</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-arrow-up"></i>
                            </div>
                            <a href="/tracking/support/tickets" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?= $priority_critical ?></h3>

                                <p>Critical</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <a href="/tracking/support/tickets" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
<?= $this->endSection(); ?>