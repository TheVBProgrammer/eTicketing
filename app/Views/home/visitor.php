<?php session()->set('breadcrumb_title', 'Dashboard');?>
<?= $this->extend('layout/admin_template'); ?>
<?= $this->section('content'); ?>
<div class="row" style="margin-top: 100px">
    <div class="col-md-4"></div>
    <div class="col-md-4 col-xs-12 text-center">
        <hr class="hr-line">
        <h3>WELCOME VISITOR</h3>
        <hr class="hr-line">
        <div id="clock" class="clock-2"></div>
    </div>
    </div>
    <div class="col-md-4"></div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('pagescripts'); ?>
<script type="application/javascript">
    function showTime(){
    // to get current time/ date.
    var date = new Date();
    // to get the current hour
    var h = date.getHours();
    // to get the current minutes
    var m = date.getMinutes();
    //to get the current second
    var s = date.getSeconds();
    // AM, PM setting
    var session = "AM";

    //conditions for times behavior
    if ( h == 0 ) {
    h = 12;
    }
    if( h >= 12 ){
    session = "PM";
    }

    if ( h > 12 ){
    h = h - 12;
    }
    m = ( m < 10 ) ? m = "0" + m : m;
    s = ( s < 10 ) ? s = "0" + s : s;

    //putting time in one variable
    var time = h + ":" + m + ":" + s + " " + session;
    // Create a new Date object
    var currentDate = new Date();
    // Get individual components of the date
    var year = currentDate.getFullYear();
    var month = currentDate.getMonth() + 1; // Months are zero-based, so add 1
    var day = currentDate.getDate();
    // Format the date as a string
    //var formattedDate = year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;
    var formattedDate = (day < 10 ? '0' : '') + day + '/' + (month < 10 ? '0' : '') + month + '/' + year;
    //putting time in our div
    $('#clock').html(formattedDate+'<br>'+time);
    //to change time in every seconds
    setTimeout( showTime, 1000 );
    }
    showTime();
</script>
<?= $this->endSection(); ?>


