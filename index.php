<?php

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
    case 'home':
    {
        $userController->home(); // Return home page and create database if not exits
        break;
    }
}

