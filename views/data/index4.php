<!-- Header -->
<?php require_once 'views/header_app.php'; ?>

<div class="data">
    <div>
        <h1 style="text-align: center; margin-bottom: 30px; font-weight:bold;">Students's GPA Good and bad</h1>
        <h1>Student good point</h1>
        <table class="table table-striped" background="public/images/teachers.jpg">
            <thead class="thead-light">
            <tr>
                <th scope="col">Students</th>
                <th scope="col">Point</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($results)) {?>

                <?php foreach ($results as $key => $student) { ?>
                <?php if($student['point'] >= 8) { ?>
                    <tr style="font-weight: bold;">
                        <th scope="row"><?php echo $student['name'] ?></th>
                        <td><?php echo $student['point'] ?></td>

                    </tr>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            </tbody>
        </table>

        <h1>Student bad point</h1>
        <table class="table table-striped" background="public/images/teachers.jpg">
            <thead class="thead-light">
            <tr>
                <th scope="col">Students</th>
                <th scope="col">Point</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($results)) {?>

                <?php foreach ($results as $key => $student) { ?>
                    <?php if($student['point'] <=5) { ?>
                        <tr style="font-weight: bold;">
                            <th scope="row"><?php echo $student['name'] ?></th>
                            <td><?php echo $student['point'] ?></td>

                        </tr>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="button-slide">
        <span id="btn-prev"><a href=".?action=data3"><i class="fas fa-chevron-left"></i></a></span>
        <span id="btn-next"><a href=".?action=data5"><i class="fas fa-chevron-right"></i></a></span>
    </div>
</div>



