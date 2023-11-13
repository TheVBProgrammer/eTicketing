<?php

?>
<div class="card shadow-sm">
    <div class="card-body">
        <form action="/management/register" method="post">
            <input type="hidden" name="csrf_test_name" value="ff5595ec8d2f75cfec2f23871432aec4">
            <div class="row">
                <div class="col-md-12"><h3>Update User</h3></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="floatingEmailInput">Email Address</label>
                    <input type="email" class="form-control" id="floatingEmailInput" name="email" inputmode="email" autocomplete="email" placeholder="Email Address" value="" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="floatingUsernameInput">Username</label>
                    <input type="text" class="form-control" id="floatingUsernameInput" name="username" inputmode="text" autocomplete="username" placeholder="Username" value="" required>
                </div>
            </div>
            <!-- Password -->
            <div class="row">
                <div class="col-md-12">
                    <label for="floatingPasswordInput">Password</label>
                    <input type="password" class="form-control" id="floatingPasswordInput" name="password" inputmode="text" autocomplete="new-password" placeholder="Password" required>
                </div>
            </div>
            <!-- Password (Again) -->
            <div class="row">
                <div class="col-md-12">
                    <label for="floatingPasswordConfirmInput">Password (again)</label>
                    <input type="password" class="form-control" id="floatingPasswordConfirmInput" name="password_confirm" inputmode="text" autocomplete="new-password" placeholder="Password (again)" required>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
