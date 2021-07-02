<?php

require_once 'models/Teacher.php'; // Call the Teacher model
require_once 'validators/teachers/CreateTeacherRequest.php';
require_once 'validators/teachers/EditTeacherRequest.php';
require_once 'controllers/LoginController.php';
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

    public function editTeacher()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        // Get current subject with id from subject model
        $teacher = parent::show($id);
//         echo '<pre>';
//         var_dump($teachers);die();
        include_once 'views/teachers/edit.php';
    }

    public function updateTeacher()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $name = filter_input(INPUT_POST, 'name');
        $gender = filter_input(INPUT_POST, 'gender');
        $phone = filter_input(INPUT_POST, 'phone');
        $isValidData = EditTeacherRequest::validateEditInfoTeacher(['name' => $name, 'gender' => $gender, 'phone' => $phone]);
        if ($isValidData == true) { // if pass validate
            $result = parent::update($id, $name, $gender, $phone);

            if ($result) {
                $_SESSION['edit_teacher']['success'] = 'Update teacher success';
                header("Location: .?action=edit_teacher&id=$id");
            } else {
                die('Error update');
            }
        } else{
            header("Location: .?action=edit_teacher&id=$id"); // return back with error
        }
    }
}
?>