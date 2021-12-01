<?php
include $_SERVER['DOCUMENT_ROOT'] . '/BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = test_input($_GET["id"]);
    $link = test_input($_GET["link"]);
    $img = test_input($_GET["img"]);
    $date = test_input($_GET["date"]);
    $content = test_input($_GET["content"]);
    $sql = "UPDATE news SET link='$link', img='$img',date='$date', content='$content' WHERE id = '$id' ";
    if ($con->query($sql) === TRUE) {
        echo "<p class='btn btn-success' align='center'>Record update successfully</p>";
    } else {
        echo "Error deleting record: " . $con->error;
    }
}
