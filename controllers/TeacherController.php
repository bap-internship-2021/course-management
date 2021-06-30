<?php

require_once 'models/Teacher.php'; // Call the Teacher model
require_once 'validators/teachers/CreateTeacherRequest.php';
// require_once 'validators/students/EditStudentRequest.php';

class TeacherController extends Teacher
{
    public function listTeachers()
    {
        $teachers = parent::listTeachers();
        // Debug
        // echo '<pre>';
        // print_r($students);die();
        include_once 'views/teachers/index.php';

    }

    public function storeTeacher()
    {
        $name = filter_input(INPUT_POST, 'name');
        $gender = filter_input(INPUT_POST, 'gender');
        $phone = filter_input(INPUT_POST, 'phone');
        
        $isValidData = CreateTeacherRequest::validateCreateInfoTeacher(['name' => $name, 'gender' => $gender, 'phone' => $phone]);
        if ($isValidData == true) { 

            if (parent::store($name, $gender, $phone)) {
                $_SESSION['create_teacher']['success'] = 'Create student success';
                header("Location: .?action=teachers"); // return view list subject
            }
        }else{
            header("Location: .?action=teachers"); // return view list subject with error
        }
        
    }
}
?>