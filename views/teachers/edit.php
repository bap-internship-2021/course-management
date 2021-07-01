<?php
//         echo '<pre>';
//         print_r($subject);die();
//?>
    <!-- Header -->
    <?php require_once 'views/header_app.php'; ?>

    <!-- Content -->
    <div class="container-fluid">
        <h1 class="text-blue text-center">Edit Teacher</h1>

        <!--  Alert if update success  -->
        <?php if (isset($_SESSION['edit_teacher']['success'])) { ?>
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="alert alert-success text-center" role="alert">
                        <?php echo $_SESSION['edit_teacher']['success']; ?>
                    </div>
                </div>
            </div>
        <?php }
        unset($_SESSION['edit_teacher']['success']); ?>

        <!-- Alert error -->
        <?php if (isset($_SESSION['edit_teacher']['name_error'])) { ?>
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="alert alert-success text-center" role="alert">
                        <?php echo $_SESSION['edit_teacher']['name_error']; ?>
                    </div>
                </div>
            </div>
        <?php }
        unset($_SESSION['edit_teacher']['name_error']); ?>

        <?php if (isset($_SESSION['edit_teacher']['gender_error'])) { ?>
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="alert alert-success text-center" role="alert">
                        <?php echo $_SESSION['edit_teacher']['gender_error']; ?>
                    </div>
                </div>
            </div>
        <?php }
        unset($_SESSION['edit_teacher']['gender_error']); ?>

        <?php if (isset($_SESSION['edit_teacher']['phone_error'])) { ?>
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="alert alert-success text-center" role="alert">
                        <?php echo $_SESSION['edit_teacher']['phone_error']; ?>
                    </div>
                </div>
            </div>
        <?php }
        unset($_SESSION['edit_teacher']['phone_error']); ?>

        <div class="row justify-content-center">
            <div class="col-6">
                <form action=".?action=update_teacher" method="post" class="border p-3 rounded">
                    <!-- id -->
                    <div class="mb-3">
                        <input type="hidden" name="id" class="form-control" id="id"
                               value="<?php echo (!empty($teacher['id'])) ? $teacher['id'] : '' ?>">
                    </div>

                    <!-- subject name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">student name</label>
                        <input type="text" name="name" class="form-control" id="name" "
                               value="<?php echo (!empty($teacher['name'])) ? $teacher['name'] : '' ?>">
                    </div>

                    <!-- credit card -->
                    <div class="mb-3">
                        <label for="gender" class="col-sm-12">Gender</label>
                        <div class="col-sm-12">
                            <select name="gender" class="form-control form-control-line">
                                <option value="2" <?php echo ($teacher['gender'] == 2) ? 'selected' : ''; ?> >Nữ</option>
                                <option value="1" <?php echo ($teacher['gender'] == 1) ? 'selected' : ''; ?> >Nam</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="credit-number" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone"
                               placeholder="Phone"
                               value="<?php echo (!empty($teacher['phone'])) ? $teacher['phone'] : '' ?>">
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
    <?php require_once 'views/footer_app.php'; ?>


