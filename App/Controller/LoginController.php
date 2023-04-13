<?php

Namespace App\Controller;

include_once "../Includes/classes.php";
use App\Model\Users;

class LoginController {
   
    public function login($userEmail,$userPassword) {
    
        // create user model object
        $userModel = new Users;
    
        // validate user login
        $user = $userModel->getUserByEmailAndPassword($userEmail, $userPassword);
    
        if ($user) {
            // update last login time
            $userModel->updateLastLogin($user['user_id']);
    
            // start session and set user data
            session_start();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_email'] = $user['user_email'];
            $_SESSION['user_name'] = $user['user_name'];
    
            return true;
        } 
        return false;
    }
    
}

if(isset($_POST['btnLogin'])){
    // create an object of the LoginController class
    $loginController = new LoginController();

    // retrieve form data
    $userEmail = $_POST['user_email'];
    $userPassword = $_POST['user_password'];

    // call the login method of the object
    $loginResult = $loginController->login($userEmail,$userPassword);

    if($loginResult){
        // redirect to dashboard or home page
        header('Location: ../View/dashboard.php');
    }else{
        // display error message and redirect to login.php
        $message =  "Invalid email or password.";
        session_start();
        $_SESSION['message'] = $message; 
        header("Location: ../View/login.php");
    }
}


?>