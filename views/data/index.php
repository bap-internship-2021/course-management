<!-- Header -->
<?php require_once 'views/header_app.php'; ?>

    <div class="data">
        <div>
            <h1 style="text-align: center; margin-bottom: 30px;">Quantity </h1>
            <table class="table table-striped" background="public/images/data1.jpg">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Majors</th>
                        <th scope="col">Quantity (Students)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($quantityStudentsMajors)) {?>
                        
                    <?php foreach ($quantityStudentsMajors as $key => $qsm) { ?>
                        
                    <tr>
                        <th scope="row"><?php echo $qsm['name'] ?></th>
                        <td><?php echo $qsm['StudentCount'] ?></td>
                    </tr>
                    <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
        <div class="button-slide">
            <span id="btn-prev"><i class="fas fa-chevron-left"></i></span>
            <span id="btn-next"><a href=".?action=data2"><i class="fas fa-chevron-right"></i></a></span>
            
        </div>
    </div>

    

   