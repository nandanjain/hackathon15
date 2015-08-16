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

    //Default time zone
    date_default_timezone_set("America/New_York");
    $today = date('Y-06-30');
    $tomorrow = date('Y-07-01');
    $monthStart = date('Y-06-01');
    error_log("===========================Today: " . $today . " :Tomorrow: " . $tomorrow . " :Start of Month: " . $monthStart);
    $todaysSale = $MONGO_DB->getSalesByDate($shop_id, $today, $tomorrow);
    $monthlySale = $MONGO_DB->getSalesByDate($shop_id, $monthStart, $tomorrow);
} else {
    session_destroy();
    error_log("main.php - session is NOT set !!!");
    header('Location: index.php'); // Redirecting To Home Page
}
?>
<head>
    <title>Your Home Page</title>
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <!--    <script type="text/javascript" src="data/data.js"></script>-->
    <script type="text/javascript">
        var ShopId = <?php echo $shop_id; ?>;
    </script>
    <script type="text/javascript">
        function onMonthSelect(obj) {
            var month = parseInt(obj.value);
            if (month > 0) {
                var startDate = new Date();
                startDate.setMonth(month - 1);
                startDate.setDate(1);
                startDate.setHours(0, 0, 0, 0);

                var endDate = new Date();
                endDate.setMonth(month);
                endDate.setDate(1);
                endDate.setHours(0, 0, 0, 0);
                document.getElementById('download_report').href = 'writeCSV.php?start_date=' + startDate.getTime() / 1000 + '&end_date=' + endDate.getTime() / 1000 + '&shop_id=' + ShopId;
                document.getElementById('download_report').className = '';
            } else {
                document.getElementById('download_report').href = '#';
                document.getElementById('download_report').className = 'disabled';
            }
        }
    </script>
</head>
<body ng-app="SalesModule">
<div id="profile">
    <b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
    <b id="logout"><a href="logout.php">Log Out</a></b>
</div>
<div id="main_body" ng-controller="TabController as tabCtrl">
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
            <li ng-class="{ active:tabCtrl.isSet(4) }">
                <a href ng-click="tabCtrl.setTab(4)">Reports</a>
            </li>
        </ul>
    </div>
    <div id="dash_board" ng-cloak ng-show="tabCtrl.isSet(0)" ng-controller="DashboardController as dashCtrl">
        <script type="text/javascript">
            var dailySales = <?php echo json_encode($todaysSale); ?>;
            var monthlySales = <?php echo json_encode($monthlySale); ?>;
        </script>
        <div class="daily_sale">
            <table>
                <tr>
                    <th colspan="2">Today's Summary</th>
                </tr>
                <tr>
                    <td class="dash_label">Tires</td>
                    <td class="dash_value">{{dashCtrl.todaysSalesSummary.noOfTires}}</td>
                </tr>
                <tr>
                    <td class="dash_label">Services</td>
                    <td class="dash_value">{{dashCtrl.todaysSalesSummary.noOfServices}}</td>
                </tr>
                <tr>
                    <td class="dash_label">Amount</td>
                    <td class="dash_value">${{dashCtrl.todaysSalesSummary.totalCost}}</td>
                </tr>
            </table>
        </div>
        <div class="monthly_sale">
            <table>
                <tr>
                    <th colspan="2">Month's Summary</th>
                </tr>
                <tr>
                    <td class="dash_label">Tires</td>
                    <td class="dash_value">{{dashCtrl.monthlySalesSummary.noOfTires}}</td>
                </tr>
                <tr>
                    <td class="dash_label">Services</td>
                    <td class="dash_value">{{dashCtrl.monthlySalesSummary.noOfServices}}</td>
                </tr>
                <tr>
                    <td class="dash_label">Amount</td>
                    <td class="dash_value">${{dashCtrl.monthlySalesSummary.totalCost}}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="sales_table" ng-show="tabCtrl.isSet(1)" ng-cloak ng-controller="SalesController as salesCtrl">
        <script type="text/javascript">
            var sale = <?php echo $sales_data;?>;
        </script>

        <table id="salesTable" cellspacing="0">
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
            <tr ng-repeat="record in salesCtrl.records | orderBy: 'date'" ng-class-even="'even_row'"
                ng-class-odd="'odd_row'">
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

        <table id="inventoryTable" cellspacing="0">
            <thead>
            <tr>
                <th>Tire</th>
                <th>Quality</th>
                <th>Quantity</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="record in inventoryCtrl.records | orderBy: 'quantity'" ng-class-even="'even_row'"
                ng-class-odd="'odd_row'">
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

        <table id="historyTable" cellspacing="0">
            <thead>
            <tr>
                <th>Date</th>
                <th>Tire</th>
                <th>Quality</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="record in historyCtrl.records" ng-class-even="'even_row'" ng-class-odd="'odd_row'">
                <td>{{record.date | date}}</td>
                <td>{{record.tire}}</td>
                <td>{{record.quality}}</td>
                <td>{{record.quantity}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="reports_table" ng-show="tabCtrl.isSet(4)" ng-cloak>
        <div>
            <label id="month_label" for="startDate">Month</label>
            <select id="month_select" name="startDate" onchange="onMonthSelect(this)">
                <option value="0">Select Month</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <a id="download_report" class="disabled" href="#">Download</a>
        </div>
    </div>
</div>
<script type="text/javascript" src="lib/angular.min.js"></script>
<script type="text/javascript" src="js/sales.js"></script>
</body>
</html>