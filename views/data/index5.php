<!-- Header -->
<?php require_once 'views/header_app.php'; ?>

<div class="data">
    <div>
        <h1 style="text-align: center; margin-bottom: 30px; font-weight:bold;">Students's GPA to time on ward subject </h1>
        <table class="table table-striped" background="public/images/data2.jfif">
            <thead class="thead-light">
            <tr>
                <th scope="col">Students</th>
                <th scope="col">Time</th>
                <th scope="col">Subject</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($results)) {?>

                <?php foreach ($results as $key => $item) { ?>

                    <tr style="font-weight: bold;">
                        <th scope="row"><?php echo $item['userName'] ?></th>
                        <td ><?php echo $item['pointTime'] ?></td>
                        <td><?php echo $item['subjectName'] ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="button-slide">
        <span id="btn-prev"><a href=".?action=data4"><i class="fas fa-chevron-left"></i></a></span>
        <span id="btn-next"><a href=".?action=data"><i class="fas fa-chevron-right"></i></a></span>
    </div>
</div>



