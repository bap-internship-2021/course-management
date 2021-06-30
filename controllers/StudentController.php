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

    public function editStudent()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        // Get current subject with id from subject model
        $students = parent::show($id);
//         echo '<pre>';
//         var_dump($students);die();
        include_once 'views/students/edit.php';
    }
}
?>