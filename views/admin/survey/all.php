<?php
include "views/admin/head.php";
$customScripts = '<script src="/public/assets/custom_scripts/survey.js"></script>'
?>

    <div class="pagetitle">
      <h1>Surveys</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">Surveys</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
             <div class="d-flex align-items-center justify-content-between">
                 <h5 class="card-title">Surveys</h5>
                 <a href="#" data-bs-toggle="modal" data-bs-target="#create_new_custom_form" class="btn btn-primary">New Survey</a>
             </div>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">description</th>
                      <th scope="col">Featured</th>
                      <th scope="col">success message</th>
                    <th scope="col">submissions</th>
                    <th scope="col">actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                foreach ($surveys as $survey):
                ?>
                <tr>
                    <th scope="row"><?php echo $survey->id?></th>
                    <td> <?php echo $survey->title?></td>
                    <td><?php echo $survey->description?></td>
                    <td><?php echo $survey->featured == 1 ?  'yes' : 'no'?></td>
                    <td><?php echo $survey->success_message?></td>
                    <td><?php echo $survey->submit_count?></td>
                    <td>
                        <?php if ($survey->submit_count > 0): ?>
                        <a href="/admin/survey/submissions?id=<?php echo $survey->id?>" class="btn btn-info mb-1">submissions</a>
                        <?php endif; ?>
                        <a href="/admin/survey/build?id=<?php echo $survey->id?>" class="btn btn-success">edit</a>
                        <a href="/admin/survey/delete?id=<?php echo $survey->id?>" class="btn btn-danger">Delete</a>
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

    <div class="modal fade" id="create_new_custom_form" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Survey</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                </div>
                <form action="/admin/survey/store" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group mb-4">
                            <label for="text">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Title">
                        </div>
                        <div class="form-group mb-4">
                            <label for="text">Description</label>
                            <textarea class="form-control" name="description" placeholder="Enter Description"></textarea>
                        </div>

                        <div class="form-group mb-2">
                            <label for="success_message">Success Message</label>
                            <input type="text" class="form-control" name="success_message" placeholder="form submit success message">
                        </div>
                        <div class="form-group mb-2">
                            <label for="admin" class="col-md-4 col-lg-3 col-form-label">Featured</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="1" id="flexSwitchCheckChecked"  name="featured">
                                <label class="form-check-label" for="flexSwitchCheckChecked"> show in featured inside home page</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit_custom_form" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Survey</h5>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>×</span></button>
                </div>
                <form action="/admin/survey/edit" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id">
                        <div class="form-group mb-4">
                            <label for="text">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Title">
                        </div>
                        <div class="form-group mb-4">
                            <label for="text">Description</label>
                            <textarea class="form-control" name="description" placeholder="Enter Description"></textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for="success_message">Success Message</label>
                            <input type="text" class="form-control" name="success_message" placeholder="form submit success message">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
include "views/admin/bottom.php";
?>
