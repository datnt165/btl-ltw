<?php
include $_SERVER['DOCUMENT_ROOT'] . 'BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // $id = $_GET['formObj']['id'];
    $fname = $_GET['formObj']['fname'];
    $lname = $_GET['formObj']['lname'];
    $email = $_GET['formObj']['email'];
    $password = $_GET['formObj']['password'];
    $birth = $_GET['formObj']['year'] . '-' . $_GET['formObj']['month'] . '-' . $_GET['formObj']['date'];
    $gender = $_GET['formObj']['gender'];
    $country = $_GET['formObj']['country'];
    $type = 'customer';

    $sql = "SELECT * FROM user  WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        echo "* Email đã được đăng ký!";
    } else {
        $sql = "INSERT INTO user(fn, ln, email, password, birth, gender, country, type)  VALUES  ('$fname','$lname','$email','$password','$birth','$gender','$country','$type')";
        if ($con->query($sql) === TRUE) {
        } else {
            echo "Error deleting record: " . $con->error;
        }
    }
}
