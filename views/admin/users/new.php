<?php
include "views/admin/head.php";
//$customScripts = '<script src="/public/assets/custom_scripts/user.js"></script>'
?>

<div class="pagetitle">
    <h1>Users</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/users/all">Users</a></li>
            <li class="breadcrumb-item active">edit</li>
        </ol>
    </nav>
</div>

<section class="section">
    <form method="post" class="needs-validation " action="/admin/users/store" novalidate>
        <div class="row mb-3">
            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
            <div class="col-md-8 col-lg-9">
                <input name="name" required type="text" class="form-control" id="fullName">
            </div>
        </div>

        <div class="row mb-3">
            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
            <div class="col-md-8 col-lg-9">
                <input name="email" required type="email" class="form-control" id="Email" >
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-lg-3 col-form-label"></div>
            <div class="col-md-8 col-lg-9">
                <p>Keep password fields empty if you dont want to change the password </p>
            </div>
        </div>

        <div class="row mb-3">
            <label for="Password" class="col-md-4 col-lg-3 col-form-label">Password</label>
            <div class="col-md-8 col-lg-9">
                <input name="password" type="password" required class="form-control" id="password" placeholder="****" value="">
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm" class="col-md-4 col-lg-3 col-form-label">Confirm Password</label>
            <div class="col-md-8 col-lg-9">
                <input name="password_confirmation" required type="password" class="form-control" id="password-confirm" placeholder="****" value="">
            </div>
        </div>

        <div class="row mb-3">
            <label for="admin" class="col-md-4 col-lg-3 col-form-label">Admin</label>
            <div class="col-md-8 col-lg-9">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="1" id="flexSwitchCheckChecked" name="admin">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Check if you want to give user admin privileges</label>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form><!-- End Profile Edit Form -->

</section>


<?php
include "views/admin/bottom.php";
?>
