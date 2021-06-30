<?php
//         echo '<pre>';
//         print_r($subject);die();
//?>
    <!-- Header -->
    <?php require_once 'views/header_app.php'; ?>

    <!-- Content -->
    <div class="container-fluid">
        <h1 class="text-blue text-center">Edit subject</h1>
        <!--  Name error  -->
        <?php if (isset($_SESSION['edit_subject']['name_error'])) { ?>
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="alert alert-danger text-center" role="alert">
                        <?php echo $_SESSION['edit_subject']['name_error']; ?>
                    </div>
                </div>
            </div>
        <?php }
        unset($_SESSION['edit_subject']['name_error']); ?>

        <!-- credit number error -->
        <?php if (isset($_SESSION['edit_subject']['credit_number_error'])) { ?>
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="alert alert-danger text-center" role="alert">
                        <?php echo $_SESSION['edit_subject']['credit_number_error']; ?>
                    </div>
                </div>
            </div>
        <?php }
        unset($_SESSION['edit_subject']['credit_number_error']); ?>
        <!--  Alert if update success  -->
        <?php if (isset($_SESSION['edit_subject']['success'])) { ?>
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="alert alert-success text-center" role="alert">
                        <?php echo $_SESSION['edit_subject']['success']; ?>
                    </div>
                </div>
            </div>
        <?php }
        unset($_SESSION['edit_subject']['success']); ?>
        <div class="row justify-content-center">
            <div class="col-6">
                <form action=".?action=update_subject" method="post" class="border p-3 rounded">
                    <!-- id -->
                    <div class="mb-3">
                        <input type="hidden" name="id" class="form-control" id="id"
                               value="<?php echo (!empty($subject['id'])) ? $subject['id'] : '' ?>">
                    </div>

                    <!-- subject name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Subject name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Subject name"
                               value="<?php echo (!empty($subject['name'])) ? $subject['name'] : '' ?>">
                    </div>

                    <!-- credit card -->
                    <div class="mb-3">
                        <label for="credit-number" class="form-label">Credit number</label>
                        <input type="text" name="credit_number" class="form-control" id="credit-number"
                               placeholder="Credit number"
                               value="<?php echo (!empty($subject['credit_number'])) ? $subject['credit_number'] : '' ?>">
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