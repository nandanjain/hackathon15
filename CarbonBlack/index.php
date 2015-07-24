<?php
/**
 * Created by PhpStorm.
 * User: nanjain
 * Date: 7/6/15
 * Time: 11:31 AM
 */
include('MongoDBClient.php');
include('login.php'); // Includes Login Script
if(isset($_SESSION['login_user'])){
    error_log("index.php - session is set ... now redirecting to main.php");
    header("location: main.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Carbon Black</title>
    <link href="css/login.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
    <h1>Carbon Black</h1>
    <div id="login">
        <h2>Login</h2>
        <form action="" method="post">
            <label>EMail :</label>
            <input id="email" name="email" placeholder="email@server.com" type="text">
            <label>Password :</label>
            <input id="password" name="password" placeholder="**********" type="password">
            <input name="submit" type="submit" value=" Login ">
            <span id="error_message"><?php echo $error; ?></span>
        </form>
    </div>
</div>
</body>
</html>