<?php
/**
 * Created by PhpStorm.
 * User: nanjain
 * Date: 7/6/15
 * Time: 11:35 AM
 */

if (PHP_SESSION_NONE == session_status()) {
    error_log("main.php - Session is not available --- Start a new one !!!");
    session_start(); // Starting Session
} else {
    error_log("main.php - Session already active !!!");
}
if (isset($_SESSION['login_user'])) {
    error_log("main.php - session is set !!!");
    $login_session = $_SESSION['login_user'];
} else {
    error_log("main.php - session is NOT set !!!");
    header('Location: index.php'); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Home Page</title>
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <script type="javascript" src="lib/angular.min.js"></script>
</head>
<body>
<div id="profile">
    <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
    <b id="logout"><a href="logout.php">Log Out</a></b>
</div>
<div class="sales_table" ng-controller="SalesController as sales">
    <ul id="salesTable">
        <li ng-repeat="record in sales.records">
            <span>{{record.date | date}}</span>
            <span>{{record.saleDetails}}</span>
            <span>{{record.total | currency}}</span>
            <span>{{record.state}}</span>
        </li>
    </ul>
</div>
</body>
</html>