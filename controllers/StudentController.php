<?php

require_once 'models/Student.php'; // Call the Subject model

class StudentController extends Student
{
    public function listStudents()
    {
        $students = parent::listStudents();
        // Debug
        // echo '<pre>';
        // print_r($students);die();
        include_once 'views/students/index.php';

    }

    
}
?>