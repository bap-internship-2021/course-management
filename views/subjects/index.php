<!-- Header -->
<?php require_once 'views/layouts/header.php'; ?>

<!-- Content -->
<div class="container-fluid">
    <h1 class="text-blue text-center">List subjects</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Credit number</th>
            <th scope="col" colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>

        <?php if (!empty($subjects)) { ?>
            <?php foreach ($subjects as $key => $subject) { ?>
                <tr>
                    <th scope="row"><?php echo $key ?></th>
                    <td><?php echo $subject['name'] ?></td>
                    <td><?php echo $subject['credit_number'] ?></td>
                    <td><a href=".?action=edit_subject&id=<?php echo $subject['id']; ?>">Edit</a></td>
                    <td>Detail</td>
                </tr>
            <?php } ?>
        <?php } ?>
        </tbody>
    </table>
</div>
<!-- Footer -->
<?php require_once 'views/layouts/footer.php'; ?>