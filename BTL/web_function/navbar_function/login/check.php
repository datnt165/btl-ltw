<?php
include $_SERVER['DOCUMENT_ROOT'] . '/BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // $id = $_GET['formObj']['id'];
    $email = $_GET['email'];
    $password = $_GET['password'];
    $user = $_GET['roll'];
    $sql = "SELECT * FROM user  WHERE email = '$email' && type = '$user' && password = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        echo '* Email, Mật khẩu, Login as không khớp!';
    }
}
