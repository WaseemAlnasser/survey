<?php
include "views/head.php";
?>


    <section id="hero" class="section  min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 d-flex flex-column align-items-center justify-content-center">
                    <div class="d-flex justify-content-center py-4">
                        <a href="" class="logo d-flex align-items-center w-auto">
                        </a>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <?php
                            if (isset($_SESSION['msg'])):
                                ?>
                                <div class="alert alert-<?php echo $_SESSION['msg']['type']; ?> alert-dismissible fade show" role="alert">
                                    <?php echo $_SESSION['msg']['message']; ?>
                                </div>
                                <?php
                                unset($_SESSION['msg']);
                            endif;
                            ?>
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Account settings</h5>
                                <p class="text-center small">you can edit your account information here</p>
                            </div>
                            <form method="post" action="/account-edit" class="row g-3 needs-validation" novalidate>
                                <div class="col-12">
                                    <label for="yourName" class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control" id="yourName" required value="<?php echo $user->name ?>" placeholder="full name " >
                                    <div class="invalid-feedback">Please, enter your name!</div>
                                </div>
                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">email</label>
                                    <div class="input-group has-validation">
                                        <input type="text" name="email" class="form-control" id="email" required value="<?php echo $user->email ?>" placeholder="email required">
                                        <div class="invalid-feedback">Please enter your email.</div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password <small> (leave blank to keep the same)</small></label>
                                    <input type="password" name="password" class="form-control"  id="yourPassword" >
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control"  id="yourPassword" >
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Save changes</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php
include "views/bottom.php";
?>