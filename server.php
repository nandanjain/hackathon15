<?php
/**
 * Created by PhpStorm.
 * User: Nandy
 * Date: 10/6/15
 * Time: 10:52 PM
 */

date_default_timezone_set("America/New_York");
error_log("Hello... I am here");
if (isset($_REQUEST['imageData'])) {
    $imgData = $_REQUEST['imageData'];
    $imgData = str_replace(" ", "+", $imgData);
    $data = base64_decode($imgData);
    // Path where the image is going to be saved
    $filePath = 'uploads/myImage.png';

    // Delete previously uploaded image
    if (file_exists($filePath)) {
        unlink($filePath);
    }
    error_log("3 " . $data);

    // Write $imgData into the image file
    $file = fopen($filePath, 'w');
    fwrite($file, $data);
    fclose($file);

    $output = shell_exec('./FREngine');
    error_log("Output of Face Recog.\n" . $output);
    $output1 = shell_exec('cat result.txt');
    error_log("Final Score: " . $output1);

    if (empty($output1) == false) {
        error_log("The match is SUCCESS !!!!");
        //Also authorize and Open
        $Name = strtok($output1, ',');
        logAndOpen(false, "$Name");
        echo "name:$Name";
    } else {
        $output1 = shell_exec('rm  stranger/*.png');
        $output1 = shell_exec('cp uploads/myImage.png stranger/image.png');
        error_log("The match is FAILED !!!!");
        echo "";
    }
}
else if (isset($_REQUEST['adminLogin'])) {
    // Reject the access
    $username = $_POST['username'];
    $password = $_POST['password'];
    error_log("Admin Login Requested : " . $username . " -- " . $password);

    if ($username == "karthven@gmail.com" && $password == "hack") {
        echo "login:success";
    } else {
        echo "login:failure";
    }
}
else if (isset($_REQUEST['authorizeOpen'])) {
    // Authorize Open in Database as well as Spark
    error_log("Owner Approved the request");
    logAndOpen(true, "Stranger");

}
else if (isset($_REQUEST['rejectAccess'])) {
    // Reject the access
    error_log("Rejected Access");
    $fileName = "Stranger" . '_' . time();
    shell_exec('cp stranger/image.png stranger/Rejected/' . $fileName . '.png');
    shell_exec('mv stranger/image.png stranger/image_rejected.png');
}
else if (isset($_REQUEST['pollAuthRequest'])) {
    // Poll for Stranger
    error_log("Polling...");
    if (file_exists('stranger/image_approved.png')) {
        error_log("Approved");
        echo "status:approved";
    } else {
        if (file_exists('stranger/image_rejected.png')) {
            error_log("Rejected");
            echo "status:rejected";
        } else {
            error_log("InProgress");
            echo "status:inprogress";
        }
    }
}
else if (isset($_REQUEST['adminGetLogRequest'])) {
    // Poll for Stranger
    $output = shell_exec("ls -m log");
    error_log("Admin requesting Access logs..." . $output);
    echo $output;
}
else {
    error_log("Sorry, the key does not exist");
}

function sendSpark()
{
    $url = 'https://api.particle.io/v1/devices/55ff6a065075555322151787/GainAccess';
    $fields = array('access_token' => urlencode('8a6a2fb3fd5d276609ea960af008247c72e34a97'));
    $fields_string = '';
    //url-ify the data for the POST
    foreach ($fields as $key => $value) {
        $fields_string .= $key . '=' . $value . '&';
    }
    rtrim($fields_string, '&');

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);

    //execute post
    $result = curl_exec($ch);
    error_log("Successfully sent to Spark");
}

//function to log and open
function logAndOpen($isStranger, $arg)
{
    $fileName = $arg . '_' . time();
    //Enter into the DB
    $output = shell_exec("sh logEntry.sh $fileName");

    // Invoke Spark API
//    sendSpark();
    if($isStranger) {
        // move the stranger pic to approved state
        shell_exec('cp stranger/image.png stranger/Authorized/' . $fileName . '.png');
        shell_exec('mv stranger/image.png stranger/image_approved.png');
    } else {
        shell_exec('cp uploads/myImage.png Authorized/'. $arg . '/' . $fileName . '.png');
    }
}

?>
