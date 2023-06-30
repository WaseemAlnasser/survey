<?php
include "views/head.php";
?>
    <section id="hero" class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
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
                                <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                <p class="text-center small">Enter your personal details to create account</p>
                            </div>

                            <form method="post" id="register-form" action="/register" class="row g-3 needs-validation" >
                                <div class="col-12">
                                    <label for="yourName" class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control" id="yourName" required>
                                    <div class="invalid-feedback">Please, enter your name!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourEmail" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="yourEmail" required>
                                    <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                                    <div class="invalid-feedback">Please enter your password!</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="yourPassword" required>
                                    <div class="invalid-feedback">Please enter your password!</div>
                                </div>
                                <div class="col-12">
                                    <button id="register-btn" class="btn btn-primary w-100" type="submit">Create Account</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Already have an account? <a href="/login">Log in</a></p>
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