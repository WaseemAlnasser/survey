<?php
include "views/admin/head.php";
//$customScripts = '<script src="/public/assets/custom_scripts/user.js"></script>'
?>

<div class="pagetitle">
    <h1>Users</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title">Users</h5>
                        <a href="/admin/users/create"  class="btn btn-primary">New User</a>
                    </div>
                    <table class="table datatable">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">admin</th>
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
                            <td><?php echo $user->admin == 1 ? 'yes' : 'no'?></td>
                            <td><?php echo $user->submit_count?></td>
                            <td>
                                <?php echo date('Y-m-d', strtotime($user->created_at));?>
                            </td>
                            <td>
                                <a href="/admin/user/edit?id=<?php echo $user->id?>" class="btn btn-success">edit</a>
                                <a href="/admin/user/delete/<?php echo $user->id?>" class="btn btn-danger">Delete</a>
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
