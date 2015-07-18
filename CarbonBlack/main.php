<?php
/**
 * Created by PhpStorm.
 * User: nanjain
 * Date: 7/6/15
 * Time: 11:35 AM
 */
include("MongoDBClient.php");
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
    <script type="text/javascript" src="lib/angular.min.js"></script>
    <script type="text/javascript" src="js/sales.js"></script>
</head>
<body ng-app="SalesModule">
<div id="profile">
    <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
    <b id="logout"><a href="logout.php">Log Out</a></b>
</div>
<?php $sales_data = $MONGO_DB->getSales(7); ?>
<script type="text/javascript">
    var sale = <?php echo $sales_data;?>;
</script>
<div class="sales_table" ng-controller="SalesController as sales">
    <ul id="salesTable">
        <li ng-repeat="record in sales.records | orderBy : date : reverse">
            <span>{{record.date | date}}</span>
            <span>{{record.cash| currency}}</span>
            <span>{{record.total | currency}}</span>
            <span>{{record.state}}</span>
        </li>
    </ul>
</div>
</body>
</html>