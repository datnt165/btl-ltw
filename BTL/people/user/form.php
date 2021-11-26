<?php
include $_SERVER['DOCUMENT_ROOT'] . 'BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $name = $_GET['name'];
    $email = $_GET['email'];
    $about = $_GET['about'];
    $sql = "INSERT INTO customer (name,email,about) values ('$name','$email','$about')";
    if ($con->query($sql) === TRUE) {
        echo "Success2!";
    } else {
        echo "Error deleting record: " . $con->error;
    }
}
