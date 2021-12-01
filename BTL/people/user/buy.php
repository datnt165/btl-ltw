<?php
include $_SERVER['DOCUMENT_ROOT'] . '/BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $email = $_COOKIE['email'];
    $id_book = $_GET['id_book'];
    $sql = "SELECT * FROM cart  WHERE email = '$email' && id_book = '$id_book'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $many = (int)$row['many'] + 1;
        $sql = "UPDATE cart SET many='$many' WHERE email = '$email'  && id_book = '$id_book'";
        if ($con->query($sql) === TRUE) {
            echo "Success1!";
        } else {
            echo "Error deleting record: " . $con->error;
        }
    } else {
        $sql = "INSERT INTO cart(id_book, email, many) VALUES('$id_book','$email','1')";
        if ($con->query($sql) === TRUE) {
            echo "Success2!";
        } else {
            echo "Error deleting record: " . $con->error;
        }
    }
}
