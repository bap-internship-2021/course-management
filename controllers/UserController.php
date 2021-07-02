<?php

require_once 'models/User.php'; // Call the Subject model
require_once 'controllers/LoginController.php';
class UserController extends User
{
    public function home()
    {
        try {
            // Checking database
            parent::checkDatabase(); // Call check database function
            include_once 'views/homepage.php'; // include home page view
        } catch (Exception $exception) {
            die($exception->getMessage());
        }
    }
    
}