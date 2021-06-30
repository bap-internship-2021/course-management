<?php
//         echo '<pre>';
//         print_r($subject);die();
//?>
    <!-- Header -->
<?php require_once 'views/layouts/header.php'; ?>

    <!-- Content -->
    <div class="container-fluid">
        <h1 class="text-blue text-center">Edit student</h1>
        <!--  Alert if update success  -->
        <?php if (isset($_SESSION['edit_student']['success'])) { ?>
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="alert alert-success text-center" role="alert">
                        <?php echo $_SESSION['edit_student']['success']; ?>
                    </div>
                </div>
            </div>
        <?php }
        unset($_SESSION['edit_student']['success']); ?>
        <div class="row justify-content-center">
            <div class="col-6">
                <form action=".?action=update_student" method="post" class="border p-3 rounded">
                    <!-- id -->
                    <div class="mb-3">
                        <input type="hidden" name="id" class="form-control" id="id"
                               value="<?php echo (!empty($students['id'])) ? $students['id'] : '' ?>">
                    </div>

                    <!-- subject name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">student name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Student name"
                               value="<?php echo (!empty($students['name'])) ? $students['name'] : '' ?>">
                    </div>

                    <!-- credit card -->
                    <div class="mb-3">
                        <label for="gender" class="col-sm-12">Gender</label>
                        <div class="col-sm-12">
                            <select name="gender" class="form-control form-control-line">
                                <?php if($students['gender'] == 0){ ?>
                                    <option selected value="0">Nữ</option>
                                    <option value="1">Nam</option>
                                <?php }else{ ?>
                                    <option value="0">Nữ</option>
                                    <option selected value="1">Nam</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="credit-number" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone"
                               placeholder="Phone"
                               value="<?php echo (!empty($students['phone'])) ? $students['phone'] : '' ?>">
                    </div>

                    <!-- Button submit -->
                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
<?php require_once 'views/layouts/footer.php'; ?>