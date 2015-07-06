<?php
/**
 * Created by PhpStorm.
 * User: nanjain
 * Date: 7/1/15
 * Time: 10:36 AM
 */
if(PHP_SESSION_NONE == session_status()){
    error_log("login.php - Session is not available --- Start a new one !!!");

    session_start(); // Starting Session
} else {
    error_log("login.php - Session already active !!!");
}
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Email or Password is invalid";
    } else {
        // connect
        $m = new MongoClient();
        // select a database
        $db = $m->test;
        $collection = $db->users;

        $email = $_POST['email']; // Fetching Values from URL.
        //$password = sha1($_POST['password']); // Password Encryption, If you like you can also leave sha1.
        $password = $_POST['password'];

        error_log($email);
        error_log($password);
        // check if e-mail address syntax is valid or not
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        error_log("9999999999999999999999999 : " . $email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "EMAIL.INVALID";
        } else {
            // Matching user input email and password with stored email and password in database.
            $cursor = $collection->findOne(array('username' => $email, 'password' => $password));

            if ($cursor == NULL) {
                echo "LOGIN.FAILURE";
            } else {
                $_SESSION['login_user'] = $email;
            }
        }
    }
}
?>