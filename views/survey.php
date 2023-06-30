<?php
include "views/head.php";
?>



    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h1><?php echo $survey->title ?> </h1>
                    <p class="text-white"><?php echo $survey->description ?> </p>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="#surveys" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">

                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

    <!-- ======= Clients Section ======= -->

    <!-- ======= About Us Section ======= -->
    <section id="surveys" class="about">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
            </div>
            <form class="row content needs-validation" novalidate id="survey-form" method="post" action="/survey/submit" >
                <input type="hidden" name="survey_id" value="<?php echo $survey->id ?>">
                <?php
                foreach ($questions as $question) {
                    ?>
                    <?php
                    render_question($question);
                }
                ?>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->


    <!-- ======= Footer ======= -->


<?php
include "views/bottom.php";
?>