<?php
include "views/head.php";
?>




    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h1>Voice Your Opinion, </h1>
                    <h2>Shape the Future!</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="#surveys" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="<?php echo public_path('assets/img/hero.jpg'); ?>" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
    <?php
    if (isset($_SESSION['msg'])):
        ?>
        <div class="alert alert-<?php echo $_SESSION['msg']['type']; ?>" role="alert">
            <?php echo $_SESSION['msg']['message']; ?>
        </div>
        <?php
        unset($_SESSION['msg']);
    endif;
    ?>
        <!-- ======= Clients Section ======= -->

        <!-- ======= About Us Section ======= -->
        <section id="surveys" class="about">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Featured Surveys</h2>
                </div>
                <div class="row content">
                    <?php
                    foreach ($surveys as $survey) {
                        ?>
                        <div class="col-6">
                            <div class="container-fluid">
                                <img src="<?php echo public_path('assets/img/card.jpg'); ?>" class="img-fluid" alt="">
                            </div>
                            <h2><?php echo $survey->title; ?></h2>
                            <p>
                                <?php echo $survey->description; ?>
                            </p>
                            <?php if (survey_taken($survey->id) == 'taken') { ?>
                                <p class="text-success">You have already taken this survey</p>
                                <?php }elseif(survey_taken($survey->id) == 'auth'){ ?>
                                <p class="text-danger">You must be logged in to take this survey</p>
                                <a  href= "/login"  class="btn-learn-more">Login</a>
                                <?php }else {?>
                            <a  href= "/survey?id= <?php echo $survey->id; ?>"  class="btn-learn-more">Take Survey</a>
                            <?php } ?>
                        </div>
                        <?php
                    }
                    ?>

                </div>

            </div>
        </section><!-- End About Us Section -->




<?php
include "views/bottom.php";
?>