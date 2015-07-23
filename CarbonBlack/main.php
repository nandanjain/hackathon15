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
</head>
<body ng-app="SalesModule">
<div id="profile">
    <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
    <b id="logout"><a href="logout.php">Log Out</a></b>
</div>
<div ng-controller="TabController as tabCtrl">
    <div id="side_panel">
        <ul class="side_menu">
            <li ng-class="{ active:tabCtrl.isSet(1) }">
                <a href ng-click="tabCtrl.setTab(1)">Sales</a>
            </li>
            <li ng-class="{ active:tabCtrl.isSet(2) }">
                <a href ng-click="tabCtrl.setTab(2)">Inventory</a>
            </li>
            <li ng-class="{ active:tabCtrl.isSet(3) }">
                <a href ng-click="tabCtrl.setTab(3)">History</a>
            </li>
        </ul>
    </div>
    <div class="sales_table" ng-show="tabCtrl.isSet(1)" ng-cloak ng-controller="SalesController as salesCtrl">
        <script type="text/javascript">
            var sale = <?php echo $sales_data;?>;
        </script>

        <table id="salesTable">
            <thead>
            <tr>
                <th>Date</th>
                <th>Tires</th>
                <th>Services</th>
                <th>Cash</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="record in salesCtrl.records">
                <td>{{record.date | date}}</td>
                <td>{{salesCtrl.populateTiresData(record)}}</td>
                <td>{{salesCtrl.populateServicesData(record)}}</td>
                <td>{{record.cash | currency}}</td>
                <td>{{record.total | currency}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="inventory_table" ng-show="tabCtrl.isSet(2)" ng-cloak
         ng-controller="InventoryController as inventoryCtrl">
        <script type="text/javascript">
            var inventory = <?php echo $inventory_data;?>;
        </script>

        <table id="inventoryTable">
            <thead>
            <tr>
                <th>Tire</th>
                <th>Quality</th>
                <th>Quantity</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="record in inventoryCtrl.records">
                <td>{{record.tire}}</td>
                <td>{{record.quality}}</td>
                <td>{{record.quantity}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="history_table" ng-show="tabCtrl.isSet(3)" ng-cloak ng-controller="HistoryController as historyCtrl">
        <script type="text/javascript">
            var historyData = <?php echo $history_data;?>;
        </script>

        <table id="historyTable">
            <thead>
            <tr>
                <th>Date</th>
                <th>Tire</th>
                <th>Quality</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="record in historyCtrl.records">
                <td>{{record.date | date}}</td>
                <td>{{record.tire}}</td>
                <td>{{record.quality}}</td>
                <td>{{record.quantity}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" src="lib/angular.min.js"></script>
<script type="text/javascript" src="js/sales.js"></script>
</body>
</html>