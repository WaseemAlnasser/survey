<?php
include "views/admin/head.php";
$customScripts = '<script src="/public/assets/custom_scripts/survey.js"></script>'
?>

<div class="row">
    <div class="col-lg-12 col-ml-12">
        <div class="row g-4">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body p-4">
                        <h4 class="header-title">Edit Form</h4>
                        <form class="needs-validation " id="save-survey" action="/admin/survey/edit" method="Post" novalidate>
                            <input type="hidden" name="id" value="<?php echo $survey->id?>">
                            <div class="form-group mb-4">
                                <label for="text">Title</label>
                                <input type="text" class="form-control" required name="title" value="<?php echo $survey->title?>" placeholder="Enter Title">
                            </div>
                            <div class="form-group mb-4">
                                <label for="text">Description</label>
                                <textarea class="form-control" name="description" required placeholder="Enter Description"><?php echo $survey->description?></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="success_message">Success Message</label>
                                <input type="text" class="form-control" required name="success_message" value="<?php echo $survey->success_message?>" placeholder="form submit success message">
                            </div>
                            <div class="form-group mb-4">
                                <label for="admin" class="col-md-4 col-lg-3 col-form-label">Featured</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" <?php if ($survey->featured == 1) echo 'checked'?>  value="1" id="flexSwitchCheckChecked"  name="featured">
                                    <label class="form-check-label" for="flexSwitchCheckChecked"> show in featured inside home page</label>
                                </div>
                            </div>
                            <?php
                            if (!$survey->submit_count  > 0){
                                echo render_drag_drop_form_builder($survey->questions);
                            }else{
                                echo '<div class="alert alert-danger" role="alert">
                                        <strong>Warning!</strong> You can not edit this survey\'s questions because it has been submitted by users.
                                      </div>';
                            }
                            ?>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4 margin-bottom-40">Save Change</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php  if (!$survey->submit_count  > 0){
                echo '
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body p-4">
                     
                            <h4 class="header-title">Available Form Fields</h4>
                        <ul id="sortable_02" class="available-form-field">
                            <li class="ui-state-default" type="text"><span
                                    class="ui-icon ui-icon-arrowthick-2-n-s"></span>Text</li>
                            <li class="ui-state-default" type="select"><span
                                    class="ui-icon ui-icon-arrowthick-2-n-s"></span>Select</li>
                            <li class="ui-state-default" type="multiselect"><span
                                        class="ui-icon ui-icon-arrowthick-2-n-s"></span>Multi Select</li>
                            <li class="ui-state-default" type="textarea"><span
                                    class="ui-icon ui-icon-arrowthick-2-n-s"></span>Textarea</li>

                            <li class="ui-state-default" type="radio"><span
                                    class="ui-icon ui-icon-arrowthick-2-n-s"></span>Radio</li>
                        </ul>
                         
                    </div>
                </div>
            </div>   ';
            }
            ?>
        </div>
    </div>
</div>

<?php
include "views/admin/bottom.php";
?>
