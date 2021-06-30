<!-- Header -->
<?php require_once 'views/layouts/header.php'; ?>

<!-- Content -->
<div class="container-fluid">
    <h1 class="text-blue text-center">List students</h1>
    <table class="table">
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

        <?php if (!empty($students)) { ?>
            <?php foreach ($students as $key => $st) { ?>
                <tr>
                    <th scope="row"><?php echo $key ?></th>
                    <td><?php echo $st['name'] ?></td>
                    <td><?php echo $st['gender'] ?></td>
                    <td><?php echo $st['phone'] ?></td>
                    <td><a href=".?action=edit_student&id=<?php echo $st['id']; ?>" class="btn btn-primary">Edit</a></td>
                    <td>Detail</td>
                </tr>
            <?php } ?>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- Footer -->
<?php require_once 'views/layouts/footer.php'; ?>