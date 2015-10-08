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
//    $data = $imgData;
//    error_log("1 " . $imgData);
    // Path where the image is going to be saved
    $filePath = 'uploads/myImage.png';

    error_log("2 " . file_exists($filePath));
    // Delete previously uploaded image
    if (file_exists($filePath)) {
        unlink($filePath);
    }
    error_log("3 " . $data);
//    file_put_contents($filePath, $data);

    // Write $imgData into the image file
    $file = fopen($filePath, 'w');
    fwrite($file, $data);
    fclose($file);

//    $output = shell_exec('sh runscript.sh uploads/myImage.png ');
    $output1 = shell_exec('cat /tmp/result.txt');
    error_log("Output of Face Recog.\n" . $output);
    error_log("Final Score: " . $output1);
//    settype($output1, "integer");
    if(empty($output1) == false) {
	error_log("The match is SUCCESS !!!!");
        //Also authorize and Open
        //logAndOpen("TestArgTODOReplace");
	echo "Name: $output1";
        
    } else {
        $output1 = shell_exec('cp uploads/myImage.png stranger/image.png');
        error_log("The match is FAILED !!!!");
    }
} else {
    error_log("Sorry, the key does not exist");
}

//function to log and open
function logAndOpen($arg) {
    //Enter into the DB
    $output = shell_exec("sh logEntry.sh $arg");

    // Invoke Spark API
    $response = file_get_contents('http://example.com/');

}


// Authorize Open in Database as well as Spark
if (isset($_REQUEST['authorizeOpen'])) {
    $imgData = $_REQUEST['authorizeOpen'];
    $imgData = str_replace(" ", "+", $imgData);
    $data = base64_decode($imgData);
//    $data = $imgData;
    error_log("1 " . $imgData);
    logAndOpen($imgData); 

} else {
    error_log("Sorry, the key does not exist");
}
?>
