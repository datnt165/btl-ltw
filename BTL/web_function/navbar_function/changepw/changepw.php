<?php
include $_SERVER['DOCUMENT_ROOT'] . '/BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $email = $_COOKIE['email'];
    $old_pass = $_GET['old_pass'];
    $new_pass = $_GET['new_pass'];
    $new_pass_conf = $_GET['new_pass_conf'];
    $sql = "SELECT * FROM user  WHERE email = '$email' && password = '$old_pass'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        echo '* Mật khẩu cũ không đúng!';
    } else {
        if ($new_pass != $new_pass_conf) {
            echo '* Mật khẩu mới không khớp!';
        } else {
            $sql = "UPDATE user SET password='$new_pass' WHERE email = '$email'";
            if ($con->query($sql) === TRUE) {
            } else {
                echo "Error deleting record: " . $con->error;
            }
        }
    }
}
