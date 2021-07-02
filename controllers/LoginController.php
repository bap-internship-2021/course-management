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
        $password = md5($password);
        // Call login from Login model
        $user = parent::userLogin($email,$password);
        if ($user) {
            $_SESSION['user_session'] = $user;
        } else{
            die('Login fail');
        }
        
    }
}
?>