<?php
include "views/head.php";
?>


        <section id="hero" class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
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
                                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                    <p class="text-center small">Enter your email & password to login</p>
                                </div>
                                <form method="post" action="/login" class="row g-3 needs-validation" novalidate>

                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">email</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="email" class="form-control" id="email" required>
                                            <div class="invalid-feedback">Please enter your email.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Don't have account? <a href="/register">Create an account</a></p>
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