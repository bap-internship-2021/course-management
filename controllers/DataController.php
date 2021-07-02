<?php
require_once 'models/Data.php'; // Call the Student model

class DataController extends Data
{
    public function handleQuantityStudentsMajors()
    {
        $quantityStudentsMajors = parent::quantityStudentsMajors();
        
        // Debug
        // echo '<pre>';  echo 'sinh vien theo khoa<br>';
        // print_r($quantityStudentsMajors);
        // echo 'Subjecct theo khoa<br>';
        // print_r($quantitySubjectsMajors);
        // die();
        include_once 'views/data/index.php';
    }

    public function handleQuantitySubjectsMajors()
    {
        
        $quantitySubjectsMajors = parent::quantitySubjectsMajors();
        // Debug
        // echo '<pre>';  echo 'sinh vien theo khoa<br>';
        // print_r($quantityStudentsMajors);
        // echo 'Subjecct theo khoa<br>';
        // print_r($quantitySubjectsMajors);
        // die();
        include_once 'views/data/index2.php';
    }

}
?>