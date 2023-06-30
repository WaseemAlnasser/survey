<?php
include "views/admin/head.php";
?>

<div class="pagetitle">
    <h1>Answers</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item">Surveys</li>
            <li class="breadcrumb-item active">Answers</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <?php foreach ($answers as $answer): ?>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?php echo $answer->id; ?>">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $answer->id; ?>" aria-expanded="true" aria-controls="collapseOne">
                            <?=$answer->question->label?>
                        </button>
                    </h2>
                    <div id="collapse<?php echo $answer->id; ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo $answer->id; ?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><?=$answer->response?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
include "views/admin/bottom.php";
?>
