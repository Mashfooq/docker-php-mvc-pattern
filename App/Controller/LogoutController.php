<?php

namespace App\Controller;

include_once "../Includes/classes.php";

use App\Model\Users;

class LogoutController
{

    public function logout($userId)
    {
        $userModel = new Users;
        $result = $userModel->signOut($userId);

        return $result;
    }
}

// create an object of the LoginController class
$logoutController = new LogoutController();

session_start();
$userId = $_SESSION['user_id'];
// call the login method of the object
$logoutResult = $logoutController->logout($userId);
if ($logoutResult) {
    unset($logoutController);
    header("Location: ../View/login.php");
}
