<!-- Header -->
<?php require_once 'views/header_app.php'; ?>

<!-- Content -->
<div class="container-fluid">
    <h1 class="text-blue text-center">Detail subject</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Credit number</th>
            <th scope="col" colspan="2"></th>
        </tr>
        </thead>
        <tbody>

        <?php if (!empty($subject)) { ?>
            <tr>
                <td><?php echo $subject['name'] ?></td>
                <td><?php echo $subject['credit_number'] ?></td>
                <td><a class="btn btn-primary" href=".?action=edit_subject&id=<?php echo $subject['id']; ?>">Edit</a></td>
                <td>
                    <form action=".?action=delete_subject" method="post">
                        <input type="hidden" name="id" value="<?php echo $subject['id']; ?>">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger"">Delete</button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
                                        <button type="submit" class="btn btn-primary">Delete now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- Footer -->
<?php require_once 'views/footer_app.php'; ?>
