<?php
/**
 * Created by PhpStorm.
 * User: nanjain
 * Date: 7/6/15
 * Time: 3:18 PM
 */
session_start();
if(session_destroy()) // Destroying Session's data
{
    header("Location: index.php"); // Redirecting To Home Page
}
?>