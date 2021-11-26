<?php
include $_SERVER['DOCUMENT_ROOT'] . 'BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = test_input($_GET["id"]);
    $link = test_input($_GET["link"]);

    $sql = "UPDATE contact SET link='$link' WHERE id = '$id' ";
    if ($con->query($sql) === TRUE) {
        echo "<p class='btn btn-success' align='center'>Record update successfully</p>";
    } else {
        echo "Error deleting record: " . $con->error;
    }
}
