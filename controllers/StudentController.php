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

    public function updateStudent()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $name = filter_input(INPUT_POST, 'name');
        $gender = filter_input(INPUT_POST, 'gender');
        $phone = filter_input(INPUT_POST, 'phone');

        $result = parent::update($id, $name, $gender, $phone);
        if ($result) {
            $_SESSION['edit_student']['success'] = 'Update student success';
            header("Location: .?action=edit_student&id=$id");
        } else {
            die('Error update');
        }
    }

}
?>