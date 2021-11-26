<?php
include $_SERVER['DOCUMENT_ROOT'] . 'BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = test_input($_GET["id"]);
    $fn = test_input($_GET["fn"]);
    $ln = test_input($_GET["ln"]);
    $email = test_input($_GET["email"]);
    $pw = test_input($_GET["pw"]);
    $birth = test_input($_GET["birth"]);
    $gender = test_input($_GET["gender"]);
    $country = test_input($_GET["country"]);
    $type = test_input($_GET["type"]);
    $sql = "UPDATE user SET fn='$fn', ln='$ln',email='$email', password='$pw',birth='$birth', gender='$gender',country='$country', type='$type' WHERE id = '$id' ";
    if ($con->query($sql) === TRUE) {
        echo "<p class='btn btn-success' align='center'>Record update successfully</p>";
    } else {
        echo "Error deleting record: " . $con->error;
    }
}
