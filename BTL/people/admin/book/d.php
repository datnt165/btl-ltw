<?php
include $_SERVER['DOCUMENT_ROOT'] . '/BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = test_input($_GET["id"]);
    $sql = "delete from books where id='$id'";
    if ($con->query($sql) === TRUE) {
        echo "<p class='btn btn-success' align='center'>Record delete successfully</p>";
    } else {
        echo "Error deleting record: " . $con->error;
    }
}
