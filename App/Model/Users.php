<?php

namespace App\Model;

include_once "../Includes/classes.php";

use Connection\Connection;
use PDO;

class Users extends Connection
{


    // trigger the parent construct so that the connect object gets created
    public function __construct()
    {
        parent::__construct();
    }


    //fmethod checks if the given email already exists in the users table. Returns true if it exists, false if it doesn't.
    public function checkEmailExist($user_email)
    {
        $stmt = $this->_connection->prepare("SELECT * FROM users WHERE user_email = ?");
        $stmt->execute([$user_email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // method saves the user details (email, name, password) to the users table, along with the current date and time as created_on. Returns true if the insert is successful, false if it fails.
    public function saveUserDetail($user_email, $user_name, $user_password)
    {
        $created_on = date("Y-m-d H:i:s"); // get current date and time
        $stmt = $this->_connection->prepare("INSERT INTO users (user_email, user_name, user_password, created_on) VALUES (?, ?, ?, ?)");
        $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
        $stmt->execute([$user_email, $user_name, $hashed_password, $created_on]);

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // method retrieves the user data from the users table based on the given email. 
    public function getUserByEmailAndPassword($user_email, $user_password) {
        $stmt = $this->_connection->prepare("SELECT * FROM users WHERE user_email = ?");
        $stmt->execute([$user_email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$user) {
            return null; // user not found
        }
    
        $hashed_password = $user['user_password'];
        // f the user is found and the password matches, returns the user data. If the user is found and the password matches, returns the user data. 
        if (password_verify($user_password, $hashed_password)) {
            // return user data
            return $user;
        } else {
            return null; // password did not match
        }
    }

    public function updateLastLogin($user_id){
        // Update last_login with the current date and time
        $stmt = $this->_connection->prepare("UPDATE users SET last_login = ? WHERE user_id = ?");
        $current_time = date("Y-m-d H:i:s");
        $stmt->execute([$current_time, $user_id]);
    }
    
    public function signOut($userId){
        // method destroys the current session and returns true.
        session_destroy();
        return true;

    }
    
}
