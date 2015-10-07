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
} else {
    error_log("Sorry, the key does not exist");
}
?>