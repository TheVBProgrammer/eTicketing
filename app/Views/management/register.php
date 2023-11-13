<?php
/* @var $model App\Models\User */
?>
<div class="card shadow-sm">
    <div class="card-body">
        <form action="/management/users/update/<?= $model['id'] ?>" method="post">
            <input type="hidden" name="csrf_test_name" value="ff5595ec8d2f75cfec2f23871432aec4">
            <div class="row">
                <div class="col-md-12"><h3>Update User</h3></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="floatingEmailInput">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" inputmode="email" autocomplete="email" placeholder="Email Address" value="<?= $model['secret'] ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" inputmode="text" autocomplete="username" placeholder="Username" value="<?= $model['username'] ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="status_message">Status Message</label>
                    <input type="text" class="form-control" id="status_message" name="status_message" inputmode="text" autocomplete="off" placeholder="Status Message" value="<?= $model['status_message'] ?>" required>
                </div>
            </div>
            <!-- Password -->
            <div class="row">
                <div class="col-md-12">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" inputmode="text" autocomplete="off" placeholder="Password">
                </div>
            </div>
            <!-- Password (Again) -->
            <div class="row">
                <div class="col-md-12">
                    <label for="password_confirm">Password (again)</label>
                    <input type="password" class="form-control" id="password_confirm" name="password_confirm" inputmode="text" autocomplete="off" placeholder="Password (again)">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <button id="btnClose" style="margin-left: 5px" type="button" class="btn btn-secondary btn-sm float-right" data-dismiss="modal"><i class="fa fa-cancel"></i> Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm float-right"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
