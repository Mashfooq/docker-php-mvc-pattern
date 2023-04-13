<?php

namespace App\Controller;

include_once "../Includes/classes.php";

use App\Model\Users;


class RegisterController
{

    public function register($userEmail, $userName, $userPassword, $userConfirmPassword)
    {
        // create user model object
        $userModel = new Users;

        // Check if email already exists
        $emailExist = $userModel->checkEmailExist($userEmail);
        session_start();
        if ($emailExist) {
            // display error message and redirect to register.php
            $message = "This email is already registered. Please try another one.";
            $_SESSION['message'] = $message;
            header("Location: ../View/register.php");
            exit();
        }

        // Check if passwords match
        if ($userPassword !== $userConfirmPassword) {
            // display error message and redirect to register.php
            $message = "Passwords do not match. Please try again.";
            $_SESSION['message'] = $message;
            header("Location: ../View/register.php");
            exit();
        }

        // register or save users detail
        $registerResult = $userModel->saveUserDetail($userEmail, $userName, $userPassword);

        if ($registerResult) {
            //if register successful redirect to Dashboard
            $user = $userModel->getUserByEmailAndPassword($userEmail, $userPassword);
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_email'] = $user['user_email'];
            $_SESSION['user_name'] = $user['user_name'];

            return true;
        } else {
            // display error message and redirect to register.php
            $message = "Registration failed. Please try again.";
            $_SESSION['message'] = $message;
            header("Location: ../View/register.php");
            exit();
        }
    }
}

if (isset($_POST['btnRegister'])) {
    // retrieve form data
    $userEmail = $_POST['user_email'];
    $userName = $_POST['user_name'];
    $userPassword = $_POST['user_password'];
    $userConfirmPassword = $_POST['user_confirm_password'];

    // create an object of the LoginController class
    $registerController = new RegisterController();

    // call the login method of the object
    $result = $registerController->register($userEmail, $userName, $userPassword, $userConfirmPassword);

    if($result){
        header("Location: ../Veiw/dashboard.php");
    }
}
