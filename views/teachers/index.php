<!-- Header -->
<?php require_once 'views/header_app.php'; ?>

<!-- Content -->
<div class="container-fluid">

    <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Create new teacher
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form create new teacher</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action=".?action=create_teacher" method="post">
                        <!-- student name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Teacher name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Teacher name">
                        </div>

                        <!-- gender -->
                        <div class="mb-3">
                        <label for="gender" class="col-sm-12">Gender</label>
                        <div class="col-sm-12">
                            <select name="gender" class="form-control form-control-line">
                                <option value="0">Nữ</option>
                                <option value="1">Nam</option>
                            </select>
                        </div>
                        </div>

                        <!-- phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone"
                                   placeholder="phone">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <?php if (isset($_SESSION['create_teacher']['success'])) { ?>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="alert alert-success text-center" role="alert">
                    <?php echo $_SESSION['create_teacher']['success']; ?>
                </div>
            </div>
        </div>
    <?php }
    unset($_SESSION['create_teacher']['success']); ?>

    <?php if (isset($_SESSION['create_teacher']['name_error'])) { ?>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="alert alert-success text-center" role="alert">
                    <?php echo $_SESSION['create_teacher']['name_error']; ?>
                </div>
            </div>
        </div>
    <?php }
    unset($_SESSION['create_teacher']['name_error']); ?>

    <?php if (isset($_SESSION['create_teacher']['gender_error'])) { ?>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="alert alert-success text-center" role="alert">
                    <?php echo $_SESSION['create_teacher']['gender_error']; ?>
                </div>
            </div>
        </div>
    <?php }
    unset($_SESSION['create_teacher']['gender_error']); ?>

    <?php if (isset($_SESSION['create_teacher']['phone_error'])) { ?>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="alert alert-success text-center" role="alert">
                    <?php echo $_SESSION['create_teacher']['phone_error']; ?>
                </div>
            </div>
        </div>
    <?php }
    unset($_SESSION['create_teacher']['phone_error']); ?>
    <!--  ENd form create subject-->
    <!--  Alert if update success  -->

    <div class="table-responsive">
        <h1 class="text-blue text-center">List Teachers</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Phone</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>

            <?php if (!empty($teachers)) { ?>
                <?php foreach ($teachers as $key => $tc) { ?>
                    <tr>
                        <th scope="row"><?php echo $key ?></th>
                        <td><?php echo $tc['name'] ?></td>
                        <td><?php echo (($tc['gender'] == 0) ? 'Nữ' : 'Nam'); ?></td>
                        <td><?php echo $tc['phone'] ?></td>
                        <td><a href=".?action=edit_teacher&id=<?php echo $tc['id']; ?>" class="btn btn-primary">Edit</a></td>
                    </tr>
                <?php } ?>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Footer -->
<?php require_once 'views/footer_app.php'; ?>