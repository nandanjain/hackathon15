<?php
/**
 * Created by PhpStorm.
 * User: Nandy
 * Date: 10/6/15
 * Time: 10:52 PM
 */

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
        $Name = strtok($output1,',');
        logAndOpen("$Name");
        echo "name:$Name";
    } else {
        $output1 = shell_exec('rm  stranger/*');
        $output1 = shell_exec('cp uploads/myImage.png stranger/image.png');
        error_log("The match is FAILED !!!!");
        echo "";
    }
} else if (isset($_REQUEST['adminLogin'])) {
    // Reject the access
    $username = $_POST['username'];
    $password = $_POST['password'];
    error_log("Admin Login Requested : " . $username . " -- " . $password);

    if ($username == "karthven@gmail.com" && $password == "hackathon15") {
        echo "login:success";
    } else {
        echo "login:failure";
    }
} else if (isset($_REQUEST['authorizeOpen'])) {
    // Authorize Open in Database as well as Spark
    error_log("Owner Approved the request");
    logAndOpen($imgData);
} else if (isset($_REQUEST['rejectAccess'])) {
    // Reject the access
    error_log("Rejected Access");
    shell_exec('mv stranger/image.png stranger/image_rejected.png');
} else if (isset($_REQUEST['pollAuthRequest'])) {
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
} else {
    error_log("Sorry, the key does not exist");
}

function sendSpark()
{
    $url = 'http://api.particle.io';
    $data = array('access_token' => '8a6a2fb3fd5d276609ea960af008247c72e34a97');

    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data),
        ),
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    error_log("sendSpark : " . $result);
}

//function to log and open
function logAndOpen($arg)
{
    //Enter into the DB
    $output = shell_exec("sh logEntry.sh $arg");

    // Invoke Spark API
    sendSpark();

    // move the stranger pic to approved state
    shell_exec('mv stranger/image.png stranger/image_approved.png');
}

?>
