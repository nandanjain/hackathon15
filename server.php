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
        logAndOpen(2, "$Name");
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
} else if (isset($_REQUEST['authorizePerm'])) {
    // Authorize Open in Database as well as Spark
    error_log("Owner Approved the request");
    $name = $_REQUEST['authorizePerm'];
    logAndOpen(1, "$name");
} else if (isset($_REQUEST['authorizeOnce'])) {
    // Authorize Open in Database as well as Spark
    error_log("Owner Approved the request");
    logAndOpen(0, "StrangerA");
}
else if (isset($_REQUEST['rejectAccess'])) {
    // Reject the access
    error_log("Rejected Access");
    $fileName = "StrangerR" . '_' . time();
    //Enter into the DB
    $output = shell_exec("sh logEntry.sh $fileName");

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
            $isOld=checkAgeOfStranger();
            if ($isOld == 1) {
               error_log("Rejected");
               echo "status:rejected";
            } else {
  
              error_log("InProgress");
              echo "status:inprogress";
            }
        }
    }
}
else if (isset($_REQUEST['adminGetLogRequest'])) {
    // Poll for Stranger
    $output = shell_exec("ls -mt log");
    error_log("Admin requesting Access logs..." . $output);
    echo $output;
} else if (isset($_REQUEST['adminPollRequest'])) {
    // Poll for Stranger
    error_log("Admin Polling...");
    if (file_exists('stranger/image.png')) {
        echo "stranger:atDoor";
    } else {
        echo "";
    }
}

else {
    error_log("Sorry, the key does not exist");
}

function sendSpark()
{
    shell_exec('sh runscript.sh');   
    error_log("Successfully sent to Spark");
}

//function to log and open
function logAndOpen($isStranger, $arg)
{
    $fileName = $arg . '_' . time();
    //Enter into the DB
    $output = shell_exec("sh logEntry.sh $fileName");

    // Invoke Spark API
    sendSpark();
    if ($isStranger == 0) {
        // move the stranger pic to approved state
        shell_exec('cp stranger/image.png stranger/Authorized/' . $fileName . '.png');
        shell_exec('mv stranger/image.png stranger/image_approved.png');
    } else if ($isStranger == 1) {
        shell_exec('mkdir -p Authorized/' . $arg);
        shell_exec('cp uploads/myImage.png Authorized/'. $arg . '/' . $fileName . '.png');
        shell_exec('mv stranger/image.png stranger/image_approved.png');
    } else {
        shell_exec('cp uploads/myImage.png Authorized/' . $arg . '/' . $fileName . '.png');
    }
}

function checkAgeOfStranger() {
    $output = shell_exec('sh testAge.sh');
    if ((!empty($output)) && (trim($output) == "old")) {
      return 1; 
    } 
    return 0;
}

?>
