<?php
require_once 'models/Login.php'; // Call the Student model

class LoginController extends Login
{

    public function returnViewLogin()
    {
        include 'views/login/login.php'; 
    }

    public function handleLogin()
    {
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");
        setcookie('email', $email, strtotime('+ 1 year'), '/');
        setcookie('password', $password, strtotime('+ 1 year'), '/');
        // Call login from Login model
        $user = parent::userLogin($email,$password);
        if ($user) { 
            $_SESSION['user_session'] = $user;
            header('Location: .?action=home');
        } else{
            die('Login fail');
        }
    }

    public function handlelogout()
    {
        unset($_SESSION['user_session']);
        session_destroy();
        header('Location: .?action=home');
    }
}
?>