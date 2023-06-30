<?php
include "views/admin/head.php";
$customScripts = '<script src="/public/assets/custom_scripts/survey.js"></script>'
?>

<div class="pagetitle">
    <h1><?php echo $survey->title?></h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item"><a href="/admin/survey/all">surveys</a></li>
            <li class="breadcrumb-item active"><?php echo $survey->title?></li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <?php
        $select_index = 0;
        $text_index = 0;
        $textarea_index = 0;
        $radio_index = 0;
        $checkbox_index = 0;
        $multiple_index = 0;
        ?>
        <?php foreach ($questions as $question): ?>
        <div class="col-lg-6">
            <div class="card">
                <?php if ($question->type == 'text'): ?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $question->label?></h5>
                    <canvas id="barChart<?php echo $question->id?>" class="my-4 w-100" style="max-height: 400px;"></canvas>
                    <?php $answers = $question->answers ?>
                    <script>
                        // get all the $answers->response in an array
                        <?php $responses = []; ?>
                        <?php foreach ($answers as $answer): ?>
                        <?php $responses[] = $answer->response; ?>
                        <?php endforeach; ?>

                        document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#barChart<?php echo $question->id?>'), {
                                type: 'bar',
                                data: {
                                    labels: [
                                        <?php foreach ($answers as $answer): ?>
                                        '<?php echo trim($answer->response)?>',
                                        <?php endforeach; ?>
                                    ],
                                    datasets: [{
                                        label: 'Line Chart',
                                        data: [
                                            <?php foreach ($answers as $answer): ?>
                                           // check how many times the $ansewer->response appears in the $responses array
                                            <?php $count = 0; ?>
                                            <?php foreach ($responses as $response): ?>
                                            <?php if (trim($response) == trim($answer->response)): ?>
                                            <?php $count++; ?>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php echo $count; ?>,
                                            <?php endforeach; ?>
                                        ],
                                        backgroundColor: [
                                            <?php foreach ($answers as $option): ?>
                                            'rgba(<?php echo rand(0,255)?>, <?php echo rand(0,255)?>, <?php echo rand(0,255)?>, 0.2)',
                                            <?php endforeach; ?>
                                        ],
                                        }]
                                    },
                                options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            });
                    </script>
                </div>
                <?php elseif (($question->type == 'select' &&  $select_index == 0)  || ($question->type == 'multiselect' && $multiple_index == 1)): ?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $question->label?></h5>
                    <canvas id="lineChart<?php echo $question->id?>" style="max-height: 400px;"></canvas>
                    <?php $options = explode(',', $question->options); ?>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#lineChart<?php echo $question->id?>'), {
                                type: 'line',
                                data: {
                                    labels: [
                                        <?php foreach ($options as $option): ?>
                                        '<?php echo trim($option)?>',
                                        <?php endforeach; ?>
                                    ],

                                    <?php $answers = $question->answers ?>

                                    datasets: [{
                                        label: "<?php echo $question->label?>",
                                        data: [
                                            <?php foreach ($options as $option): ?>
                                            <?php $count = 0; ?>
                                            <?php foreach ($answers as $answer): ?>
                                            <?php if (trim($answer->response) == trim($option)): ?>
                                            <?php $count++; ?>
                                            <?php endif; ?>
                                            <?php endforeach; ?>
                                            <?php echo $count; ?>,
                                            <?php endforeach; ?>

                                        ],
                                        fill: false,
                                        borderColor: 'rgb(75, 192, 192)',
                                        tension: 0.1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        });
                    </script>
                    <!-- End Line CHart -->

                </div>
                  <?php if ($question->type == 'select'){
                        $select_index = 1;

                    } else{
                            $multiple_index = 0;
                        }
                    ?>

                <?php
                elseif (($question->type == 'radio' && $radio_index == 0) || ($question->type == 'select' && $select_index == 2)): ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $question->label?></h5>
                        <canvas id="pieChart<?php echo $question->id?>" style="max-height: 400px;"></canvas>
                        <?php $options = explode(',', $question->options); ?>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new Chart(document.querySelector('#pieChart<?php echo $question->id?>'), {
                                    type: 'pie',
                                    data: {
                                        labels: [
                                            <?php foreach ($options as $option): ?>
                                            '<?php echo trim($option)?>',
                                            <?php endforeach; ?>
                                        ],
                                        <?php $answers = $question->answers ?>

                                        datasets: [{
                                            label: '<?php echo $question->label?>',
                                            data: [
                                                <?php foreach ($options as $option): ?>
                                                <?php $count = 0; ?>
                                                <?php foreach ($answers as $answer): ?>
                                                <?php if (trim($answer->response) == trim($option)): ?>
                                                <?php $count++; ?>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                                <?php echo $count; ?>,
                                                <?php endforeach; ?>
                                            ],
                                            backgroundColor: [
                                                <?php foreach ($options as $option): ?>
                                                // a diffenrt color for each option
                                                'rgba(<?php echo rand(0,255)?>, <?php echo rand(0,255)?>, <?php echo rand(0,255)?>, 0.2)',
                                                <?php endforeach; ?>
                                            ],
                                            hoverOffset: 4
                                        }]
                                    }
                                });
                            });
                        </script>
                        <!-- End Pie CHart -->

                    </div>
                    <?php if ($question->type == 'radio'){
                         $radio_index = 1;
                    }
                    else{
                         $select_index = 0;
                    }
                    ?>
                <?php elseif ($question->type == 'multiselect' && $multiple_index == 0): ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $question->label?></h5>
                        <canvas id="radarChart<?php echo $question->id?>" style="max-height: 400px;"></canvas>
                        <?php $options = explode(',', $question->options); ?>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new Chart(document.querySelector('#radarChart<?php echo $question->id?>'), {
                                    type: 'radar',
                                    data: {
                                        labels: [
                                            <?php foreach ($options as $option): ?>
                                            '<?php echo trim($option)?>',
                                            <?php endforeach; ?>
                                        ],
                                        <?php $answers = $question->answers?>


                                        datasets: [ {
                                            label: '<?php echo $question->label?>',
                                            data: [
                                                <?php foreach ($options as $option): ?>
                                                <?php $count = 0; ?>
                                                <?php foreach ($answers as $answer): ?>


                                                <?php if (in_array(trim($option), explode(',',trim($answer->response)) )): ?>
                                                <?php $count++; ?>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                                <?php echo $count; ?>,
                                                <?php endforeach; ?>
                                            ],
                                            fill: true,
                                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                            borderColor: 'rgb(54, 162, 235)',
                                            pointBackgroundColor: 'rgb(54, 162, 235)',
                                            pointBorderColor: '#fff',
                                            pointHoverBackgroundColor: '#fff',
                                            pointHoverBorderColor: 'rgb(54, 162, 235)'
                                        }]
                                    },
                                    options: {
                                        elements: {
                                            line: {
                                                borderWidth: 3
                                            }
                                        }
                                    }
                                });
                            });
                        </script>
                        <!-- End Radar CHart -->

                    </div>
                <?php elseif ($question->type == 'textarea'): ?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $question->label?></h5>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Response</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($question->answers as $answer): ?>
                        <tr>
                            <td><?php echo trim($answer->response)?></td>
                            <td><?php echo $answer->created_at?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                        </table>
                </div>
                <?php elseif ($question->type == 'select' &&  $select_index == 1): ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $question->label?></h5>

                        <!-- Doughnut Chart -->
                        <canvas id="doughnutChart" style="max-height: 400px;"></canvas>
                        <?php $options = explode(',', $question->options); ?>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new Chart(document.querySelector('#doughnutChart'), {
                                    type: 'doughnut',
                                    data: {
                                        labels: [
                                            <?php foreach ($options as $option): ?>
                                            '<?php echo trim($option)?>',
                                            <?php endforeach; ?>
                                        ],
                                        <?php $answers = $question->answers ?>

                                        datasets: [{
                                            label: '<?php echo $question->label?>',
                                            data: [
                                                <?php foreach ($options as $option): ?>
                                                <?php $count = 0; ?>
                                                <?php foreach ($answers as $answer): ?>
                                                <?php if (trim($answer->response) == trim($option)): ?>
                                                <?php $count++; ?>
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                                <?php echo $count; ?>,
                                                <?php endforeach; ?>
                                            ],
                                            backgroundColor: [
                                                <?php foreach ($options as $option): ?>
                                                // a diffenrt color for each option
                                                'rgba(<?php echo rand(0,255)?>, <?php echo rand(0,255)?>, <?php echo rand(0,255)?>, 0.2)',
                                                <?php endforeach; ?>
                                            ],
                                            hoverOffset: 4
                                        }]
                                    }
                                });
                            });
                        </script>
                        <!-- End Doughnut CHart -->

                    </div>
                <?php $select_index = 0; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title">submissions</h5>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">surveys done</th>
                            <th scope="col">joind at</th>
                            <th scope="col">actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($users as $user):
                            ?>
                            <tr>
                                <th scope="row"><?php echo $user->id?></th>
                                <td> <?php echo $user->name?></td>
                                <td><?php echo $user->email?></td>
                                <td><?php echo $user->submit_count?></td>
                                <td>
                                    <?php echo date('Y-m-d', strtotime($user->created_at));?>
                                </td>
                                <td>
                                    <a href="/admin/survey/answers?id=<?php echo $survey->id?>&user_id=<?php echo $user->id?>" class="btn btn-success">view answers</a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>

<?php
include "views/admin/bottom.php";
?>
