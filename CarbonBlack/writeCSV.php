<?php
/**
 * Created by PhpStorm.
 * User: Nandy
 * Date: 8/15/15
 * Time: 5:56 PM
 */
include('MongoDBClient.php');

$startDate = $_GET['start_date'];
$endDate = $_GET['end_date'];
$shop_id = (int)$_GET['shop_id'];
error_log("Request received for Month : StartDate : " . $startDate . " EndDate : " . $endDate . " : Shop iD : " . $shop_id);

date_default_timezone_set("America/New_York");

$startDate = date('Y-m-d', $startDate);
$endDate = date('Y-m-d', $endDate);
error_log("-------------------------StartDate : " . $startDate . " : End Date : " . $endDate);

$data = $MONGO_DB->getSalesByDate($shop_id, $startDate, $endDate);

header('Content-Type: application/excel');
$dateArray = split('-', $startDate);
$monthName = date('F', mktime(0, 0, 0, $dateArray[1], 10));
header('Content-Disposition: attachment; filename="' . $monthName . '-' . $dateArray[0] . '.csv"');

$fp = fopen('php://output', 'w');
foreach ($data as $d => $value) {
    error_log($d . "===========" . $value);
    fputcsv($fp, $value);
}

fclose($fp);
?>