<?php

require_once 'models/User.php'; // Call the Subject model

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
    public function status404()
    {
        include_once 'views/errors/404.php';
        die();
    }
}