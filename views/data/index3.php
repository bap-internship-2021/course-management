<!-- Header -->
<?php require_once 'views/header_app.php'; ?>

    <div class="data">
        <div>
            <h1 style="text-align: center; margin-bottom: 30px; font-weight:bold;">Students's GPA </h1>
            <table class="table table-striped" background="public/images/data1.jpg">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Students</th>
                        <th scope="col">Average</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($quantityAvgPoints)) {?>
                        
                    <?php foreach ($quantityAvgPoints as $key => $qap) { ?>
                        
                    <tr>
                        <th scope="row"><?php echo $qap['name'] ?></th>
                        <td><?php echo $qap['Average'] ?></td>
                        
                    </tr>
                    <?php } ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
        <div class="button-slide">
            <span id="btn-prev"><a href=".?action=data2"><i class="fas fa-chevron-left"></i></a></span>
            <span id="btn-next"><a href=""><i class="fas fa-chevron-right"></i></a></span>
        </div>
    </div>

    

   