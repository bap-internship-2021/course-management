<?php

session_start();
require_once 'controllers/UserController.php'; //Call the User controller
require_once 'controllers/SubjectController.php'; //Call the Subject controller

$userController = new UserController(); // Create obj of UserController
$subjectController = new SubjectController(); // Create obj of UserController
// Default action
$action = filter_input(INPUT_POST, 'action'); // default is post method

if ($action == null) { // if action is null then set action = input get type
    $action = filter_input(INPUT_GET, 'action');
    if ($action == null) {
        $action = 'home'; // set action default is home
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
}

