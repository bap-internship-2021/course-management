<!-- Header -->
<?php require_once 'views/header_app.php'; ?>

    <div class="data">
        <div>
            <h1 style="text-align: center; margin-bottom: 30px;">Quantity </h1>
            <table class="table table-striped" background="public/images/data1.jpg">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Majors</th>
                        <th scope="col">Quantity (Subjects)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($quantitySubjectsMajors)) {?>
                        
                    <?php foreach ($quantitySubjectsMajors as $key => $qss) { ?>
                        
                    <tr>
                        <th scope="row"><?php echo $qss['name'] ?></th>
                        <td><?php echo $qss['SubjectCount'] ?></td>
                        
                    </tr>
                    <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
        <div class="button-slide">
            <span id="btn-prev"><i class="fas fa-chevron-left"></i></span>
            <span id="btn-next"><i class="fas fa-chevron-right"></i></span>
        </div>
    </div>

    

   