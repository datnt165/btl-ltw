<?php
include $_SERVER['DOCUMENT_ROOT'] . '/BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = test_input($_GET["id"]);
    $link = test_input($_GET["link"]);
    $img = test_input($_GET["img"]);
    $date = test_input($_GET["date"]);
    $content = test_input($_GET["content"]);
    $sql = "INSERT INTO news (id, link, img, date, content)
        VALUES ('" . $id . "','" . $link . "','" . $img . "','" . $date . "','" . $content . "')";
    if ($con->query($sql) === TRUE) {
        echo "<p class='btn btn-success' align='center'>New record added successfully</p>";
    } else {
        echo "Error deleting record: " . $con->error;
    }
}
