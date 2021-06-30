<?php

require_once 'models/Teacher.php'; // Call the Teacher model

class TeacherController extends Teacher
{
    public function listTeachers()
    {
        $students = parent::listTeachers();
        // Debug
        // echo '<pre>';
        // print_r($students);die();
        include_once 'views/teachers/index.php';

    }
}
?>