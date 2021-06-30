<!-- Header -->
<?php require_once 'views/layouts/header.php'; ?>

<!-- Content -->
<div class="container-fluid">
    <!--  Form create new subject  -->
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Create new subject
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form create new subject</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action=".?action=create_subject" method="post">
                        <!-- subject name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Subject name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Subject name">
                        </div>

                        <!-- credit card -->
                        <div class="mb-3">
                            <label for="credit-number" class="form-label">Credit number</label>
                            <input type="text" name="credit_number" class="form-control" id="credit-number"
                                   placeholder="Credit number">
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
    <!--  Name error  -->
    <?php if (isset($_SESSION['create_subject']['name_error'])) { ?>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="alert alert-danger text-center" role="alert">
                    <?php echo $_SESSION['create_subject']['name_error']; ?>
                </div>
            </div>
        </div>
    <?php }
    unset($_SESSION['create_subject']['name_error']); ?>

    <!-- credit number error -->
    <?php if (isset($_SESSION['create_subject']['credit_number_error'])) { ?>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="alert alert-danger text-center" role="alert">
                    <?php echo $_SESSION['create_subject']['credit_number_error']; ?>
                </div>
            </div>
        </div>
    <?php }
    unset($_SESSION['create_subject']['credit_number_error']); ?>
    <!--  Alert success  -->
    <?php if (isset($_SESSION['create_subject']['success'])) { ?>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="alert alert-success text-center" role="alert">
                    <?php echo $_SESSION['create_subject']['success']; ?>
                </div>
            </div>
        </div>
    <?php }
    unset($_SESSION['create_subject']['success']); ?>
    <!--  ENd form create subject-->
    <!--  Alert if update success  -->
    <?php if (isset($_SESSION['delete_subject']['success'])) { ?>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="alert alert-success text-center" role="alert">
                    <?php echo $_SESSION['delete_subject']['success']; ?>
                </div>
            </div>
        </div>
    <?php }
    unset($_SESSION['delete_subject']['success']); ?>
    <h1 class="text-blue text-center">List subjects</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Credit number</th>
            <th scope="col" colspan="2"></th>
        </tr>
        </thead>
        <tbody>

        <?php if (!empty($subjects)) { ?>
            <?php foreach ($subjects as $key => $subject) { ?>
                <tr>
                    <th scope="row"><?php echo $key ?></th>
                    <td><?php echo $subject['name'] ?></td>
                    <td><?php echo $subject['credit_number'] ?></td>
                    <td><a class="btn btn-primary"
                           href=".?action=edit_subject&id=<?php echo $subject['id']; ?>">Edit</a></td>
                    <td><a class="btn btn-success" href=".?action=detail_subject&id=<?php echo $subject['id']; ?>">Detail</a>
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- Footer -->
<?php require_once 'views/layouts/footer.php'; ?>