<?php

require_once 'models/Student.php'; // Call the Student model
require_once 'validators/students/CreateStudentRequest.php';
require_once 'validators/students/EditStudentRequest.php';
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
        $isValidData = EditStudentRequest::validateEditInfoStudent(['name' => $name, 'gender' => $gender, 'phone' => $phone]);
        if ($isValidData == true) { // if pass validate
            $result = parent::update($id, $name, $gender, $phone);

            if ($result) {
                $_SESSION['edit_student']['success'] = 'Update student success';
                header("Location: .?action=edit_student&id=$id");
            } else {
                die('Error update');
            }
        } else{
            header("Location: .?action=edit_student&id=$id"); // return back with error
        }
    }

    public function storeStudent()
    {
        $name = filter_input(INPUT_POST, 'name');
        $gender = filter_input(INPUT_POST, 'gender');
        $phone = filter_input(INPUT_POST, 'phone');
        $role_id = filter_input(INPUT_POST, 'role_id');
        $isValidData = CreateStudentRequest::validateCreateInfoStudent(['name' => $name, 'gender' => $gender, 'phone' => $phone, 'role_id' => $role_id]);
        if ($isValidData == true) {
            if (parent::store($name, $gender, $phone, $role_id)) {
                $_SESSION['create_student']['success'] = 'Create student success';
                header("Location: .?action=students"); // return view list subject
            }
        }else{
            header("Location: .?action=students"); // return view list subject with error
        }
        
    }

}
?>