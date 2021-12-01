<?php
include $_SERVER['DOCUMENT_ROOT'] . '/BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = test_input($_GET["id"]);
    $price = test_input($_GET["price"]);
    $img = test_input($_GET["img"]);
    $sql = "UPDATE books SET price='$price', img='$img' WHERE id = '$id' ";
    if ($con->query($sql) === TRUE) {
        echo "<p class='btn btn-success' align='center'>Record update successfully</p>";
    } else {
        echo "Error deleting record: " . $con->error;
    }
}
