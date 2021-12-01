<?php
include $_SERVER['DOCUMENT_ROOT'] . '/BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // $id = $_GET['formObj']['id'];
    $email = $_COOKIE['email'];
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $birth =  date('Y-m-d"', strtotime($_GET['birth']));;
    $country = $_GET['country'];
    $gender = $_GET['gender'];
    $sql = "UPDATE user SET fn='$fname',ln='$lname',birth='$birth',`gender`='$gender',`country`='$country' WHERE email = '$email'";
    // $result = mysqli_query($con, $sql);
    // $row = mysqli_fetch_assoc($result);
    if ($con->query($sql) === TRUE) {
    } else {
        echo "Error deleting record: " . $con->error;
    }
}
