<?php
$con = mysqli_connect("localhost", "root", "", "examples");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function redirect($url)
{
    ob_start();
    header('Location: ' . $url);
    ob_end_flush();
    die();
}
function maxrow($con)
{
    $result = mysqli_query($con, "SELECT MAX(id) FROM cars");
    $row = mysqli_fetch_array($result);
    return $row[0];
}
