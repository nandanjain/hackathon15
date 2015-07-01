<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
    header("location: profile.php");
}
?>

<?php
/**
 * Created by PhpStorm.
 * User: nanjain
 * Date: 7/1/15
 * Time: 10:36 AM
 */
// connect
$m = new MongoClient();
// select a database
$db = $m->test;
$collection = $db->users;

$email = $_POST['email']; // Fetching Values from URL.
//$password = sha1($_POST['password']); // Password Encryption, If you like you can also leave sha1.
$password = $_POST['password'];

// check if e-mail address syntax is valid or not
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "EMAIL.INVALID";
} else {
// Matching user input email and password with stored email and password in database.
    $cursor = $collection->findOne(array('username' => $email, 'password' => $password));

    if ($cursor == NULL) {
        echo "LOGIN.FAILURE";
    } else {
        header("location: main.php");
//        echo "LOGIN.SUCCESS";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <meta name="robots" content="noindex, nofollow">
    <!-- Include CSS File Here -->
    <link rel="stylesheet" href="css/login.css"/>
    <!-- Include CSS File Here -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
</head>
<body>
<div class="container">
    <div class="main">
        <form class="form" method="post" action="#">
            <h2>Login Form</h2>
            <label>Email :</label>
            <input type="text" name="email" id="email">
            <label>Password :</label>
            <input type="password" name="password" id="password">
            <label>Remember Me</label><input type="checkbox" name="remember" id="remember">
            <input type="button" name="login" id="login" value="Login">
        </form>
    </div>
</div>
</body>
</html>