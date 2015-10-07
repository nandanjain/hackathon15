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

    $output = shell_exec('br -algorithm FaceRecognition -compare uploads/myImage.png uploads/my.png > uploads/temp');
    $output1 = shell_exec('cat uploads/temp');
    error_log("Output of Face Recog.\n" . $output);
    error_log("Final Score: " . $output1);
    settype($output1, "integer");
    if($output1 >= 3) {
	error_log("The match is SUCCESS !!!!");
    } else {
        error_log("The match is FAILED !!!!");
    }
} else {
    error_log("Sorry, the key does not exist");
}
?>
