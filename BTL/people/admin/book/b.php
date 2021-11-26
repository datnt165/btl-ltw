<?php
include $_SERVER['DOCUMENT_ROOT'] . 'BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = test_input($_GET["id"]);
    $name = test_input($_GET["name"]);
    $author = test_input($_GET["author"]);
    $price = test_input($_GET["price"]);
    $page = test_input($_GET["page"]);
    $lang = test_input($_GET["lang"]);
    $type = test_input($_GET["type"]);
    $img = test_input($_GET["img"]);
    $sql = "INSERT INTO books (id, name, author, price, page, lang, type, img)
        VALUES ('" . $id . "','" . $name . "','" . $author . "','" . $price . "','" . $page . "','" . $lang . "','" . $type . "','" . $img . "')";
    if ($con->query($sql) === TRUE) {
        echo "<p class='btn btn-success' align='center'>New record added successfully</p>";
    } else {
        echo "Error deleting record: " . $con->error;
    }
}
