<?php
use Carbon\Carbon;
include "views/admin/head.php";
?>

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Surveys <span></span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-file-earmark"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo $survey_count?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Surveys Submissions</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-check2-square"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo $survey_submissions_count?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">



                            <div class="card-body">
                                <h5 class="card-title">Users </h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo $user_count?></h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-12">
                        <div class="card top-selling overflow-auto">
                            <div class="card-body pb-0">
                                <h5 class="card-title">Recent Surveys</h5>

                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">title</th>
                                        <th scope="col">Published</th>
                                        <th scope="col">submissions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if ($recent_surveys) :
                                        foreach ($recent_surveys as $survey):
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $survey->id?></th>
                                                <td> <?php echo $survey->title?></td>
                                                <td><?php echo $survey->featured == 1 ?  'yes' : 'no'?></td>
                                                <td><?php echo $survey->submit_count?></td>
                                            </tr>
                                        <?php
                                        endforeach;
                                    endif;
                                    ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">

                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Recent Submissions</h5>

                        <div class="activity">
                           <?php foreach ($recent_submissions as $submission):?>
                            <div class="activity-item d-flex">
                                <div class=" me-2">
                                    <?php echo $submission->user->name ?> submitted  <a href="#" class="fw-bold text-dark"><?php echo $submission->survey->title?> </a>
                                </div>

                                <div class=""><?php echo Carbon::parse($submission->created_at)->diffForHumans()?></div>
<!--                                <i class='bi bi-circle-fill activity-badge  align-self-start'></i>-->

                            </div><!-- End activity item-->
                               <hr>
                             <?php endforeach;?>


                        </div>

                    </div>
                </div>


            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Recent Users</h5>
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">admin</th>
                                <th scope="col">surveys done</th>
                                <th scope="col">joind at</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($recent_users as $user):
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $user->id?></th>
                                    <td> <?php echo $user->name?></td>
                                    <td><?php echo $user->email?></td>
                                    <td><?php echo $user->admin == 1 ? 'yes' : 'no'?></td>
                                    <td><?php echo $user->submit_count?></td>
                                    <td>
                                        <?php echo Carbon::parse($user->created_at)->diffForHumans();?>
                                    </td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>

        </div>
    </section>

<?php
include "views/admin/bottom.php";
?>