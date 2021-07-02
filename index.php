<?php

session_start();
require_once 'controllers/UserController.php'; //Call the User controller
require_once 'controllers/SubjectController.php'; //Call the Subject controller
require_once 'controllers/StudentController.php'; //Call the Student controller
require_once 'controllers/TeacherController.php'; //Call the Teacher controller
require_once 'controllers/DataController.php'; //Call the Data controller
require_once 'controllers/LoginController.php'; //Call the Login controller

$userController = new UserController(); // Create obj of UserController
$subjectController = new SubjectController(); // Create obj of SubjectController
$studentController = new StudentController(); // Create obj of StudentController
$teacherController = new TeacherController(); // Create obj of TeacherController
$dataController = new DataController(); // Create obj of DataController
$loginController = new LoginController(); // Create obj of LoginController

// Default action
$action = filter_input(INPUT_POST, 'action'); // default is post method

if ($action == null) { // if action is null then set action = input get type
    $action = filter_input(INPUT_GET, 'action');
    if ($action == null) {
        $action = 'login'; // set action default is home
    }
}

if (!empty($_SESSION['user_session'])) { // if user authenticate
    if (in_array($action, ['login', 'handlelogin'])) { // if action are login and handlelogin then redirect to root directory
        header('Location: .?action=home'); // Return redirect back
    }
}else{
    if (!in_array($action, ['login', 'handlelogin'])) { // if action are login and handlelogin then redirect to root directory
        header('Location: .?action=login'); // Return redirect back
    }
}


switch ($action) {
    case 'home': // Home page
    {
        $userController->home(); // Return home page and create database if not exits
        break;
    }
    case 'subjects': // List subjects
    {
        $subjectController->index(); // Get list subjects
        break;
    }
    case 'create_subject':
    {
        $subjectController->storeSubject();
        break;
    }
    case 'detail_subject':
    {
        $subjectController->detailSubject();
        break;
    }
    case 'edit_subject': // Edit view subject
    {
        $subjectController->edit();
        break;
    }
    case 'update_subject': // Update subject
    {
        $subjectController->updateSubject();
        break;
    }
    case 'delete_subject' :
    {
        $subjectController->deleteSubject();
        break;
    }

    // student

    case 'students':
    {
        $studentController->listStudents();
        break;
    }
    // editStudent
    case 'edit_student':
    {
        $studentController->editStudent();
        break;
    }
    case 'update_student':
    {
        $studentController->updateStudent();
        break;
    }
    case 'create_student':
    {
        $studentController->storeStudent();
        break;
    }

    // 404
    

    // teacher
    case 'teachers':
    {
        $teacherController->listTeachers();
        break;
    }
    case 'create_teacher':
    {
        $teacherController->storeTeacher();
        break;
    }
    case 'edit_teacher':
    {
        $teacherController->editTeacher();
        break;
    }
    case 'update_teacher':
    {
        $teacherController->updateTeacher();
        break;
    }

    // list
    case 'data': // return view thống kê
    {
        $dataController->handleQuantityStudentsMajors();
        break;
    }
    case 'data2': // return view thống kê
    {
        $dataController->handleQuantitySubjectsMajors();
        break;
    }
    case 'data3':
    {
        $dataController->handleQuantityAvgPoints();
        break;
    }

    // login
    case 'login':
    {
        // echo 'ok';die();
        $loginController->returnViewLogin();
        break;
    }
    case 'handlelogin':
    {
        $loginController->handleLogin();
        break;
    }
    case'handlelogout':
        {
            $loginController->handleLogout();
            break;
        }

}

