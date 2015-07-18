<!DOCTYPE html>
<html>
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
if (isset($_SESSION['login_user']) && isset($_SESSION['login_shop_id'])) {
    $login_session = $_SESSION['login_user'];
    $shop_id = $_SESSION['login_shop_id'];
    error_log("main.php - session is set !!! " . $login_session . " --- shopid " . $shop_id);

    $sales_data = $MONGO_DB->getSales($shop_id);
    $inventory_data = $MONGO_DB->getInventory($shop_id);
    $history_data = $MONGO_DB->getHistory($shop_id);
} else {
    error_log("main.php - session is NOT set !!!");
    header('Location: index.php'); // Redirecting To Home Page
}
?>
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
<div class="sales_table" ng-controller="SalesController as salesCtrl">
    <script type="text/javascript">
        var sale = <?php echo $sales_data;?>;
    </script>

    <ul id="salesTable">
        <li ng-repeat="record in salesCtrl.records">
            <span>{{record.date | date}}</span>
            <span>{{record.cash| currency}}</span>
            <span>{{record.total | currency}}</span>
            <span>{{record.state}}</span>
        </li>
    </ul>
</div>
<div class="inventory_table" ng-controller="InventoryController as inventoryCtrl">
    <script type="text/javascript">
        var inventory = <?php echo $inventory_data;?>;
    </script>

    <ul id="inventoryTable">
        <li ng-repeat="record in inventoryCtrl.records">
            <span>{{record.tire}}</span>
            <span>{{record.quality}}</span>
            <span>{{record.quantity}}</span>
        </li>
    </ul>
</div>
<div class="history_table" ng-controller="HistoryController as historyCtrl">
    <script type="text/javascript">
        var historyData =
        <?php echo $history_data;?>
    </script>

    <ul id="historyTable">
        <li ng-repeat="record in historyCtrl.records">
            <span>{{record.date | date}}</span>
            <span>{{record.tire}}</span>
            <span>{{record.quality}}</span>
            <span>{{record.quantity}}</span>
        </li>
    </ul>
</div>
</body>
</html>