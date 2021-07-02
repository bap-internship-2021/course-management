<?php
require_once 'models/Data.php'; // Call the Student model
require_once 'controllers/LoginController.php';
class DataController extends Data
{
    public function handleQuantityStudentsMajors()
    {
        $quantityStudentsMajors = parent::quantityStudentsMajors();
        // Debug
        // echo '<pre>';  echo 'sinh vien theo khoa<br>';
        // print_r($quantityStudentsMajors);
        // die();
        include_once 'views/data/index.php';
    }

    public function handleQuantitySubjectsMajors()
    {
        
        $quantitySubjectsMajors = parent::quantitySubjectsMajors();
        // Debug
        // echo 'Subjecct theo khoa<br>';
        // print_r($quantitySubjectsMajors);
        // die();
        include_once 'views/data/index2.php';
    }

    public function handleQuantityAvgPoints()
    {
        
        $quantityAvgPoints = parent::quantityAvgPoints();
        // Debug
        // echo '<pre>';  echo 'sinh vien theo khoa<br>';
        // print_r($quantityAvgPoints);
        // die();
        include_once 'views/data/index3.php';
    }
}
?>