<?php
include $_SERVER['DOCUMENT_ROOT'] . '/BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $email = $_COOKIE['email'];
    $id_book = $_GET['id_book'];
    $many = $_GET['many'];
    $sql = "UPDATE cart  SET many = '$many' WHERE email = '$email' && id_book = '$id_book'";
    if ($con->query($sql) === TRUE) {
        echo "Success2!";
    } else {
        echo "Error deleting record: " . $con->error;
    }
}
