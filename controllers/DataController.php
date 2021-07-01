<?php
require_once 'models/Data.php'; // Call the Student model

class DataController extends Data
{
    public function handleQuantityStudentMajors()
    {
        $quantity = parent::quantityStudentsMajors();
        // Debug
        // echo '<pre>';
        // print_r($students);die();
        include_once 'views/data/index.php';
    }
}
?>