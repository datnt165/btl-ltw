<?php
include $_SERVER['DOCUMENT_ROOT'] . 'BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $email = $_COOKIE['email'];
    $id_book = $_GET['id_book'];
    $comment = $_GET['comment'];
    if (strlen($comment) != 0) {
        $sql = "SELECT * FROM comment  WHERE email = '$email' && id_book = '$id_book'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $sql = "UPDATE comment SET  comment='$comment' WHERE email = '$email'  && id_book = '$id_book'";
            if ($con->query($sql) === TRUE) {
                echo "Success1!";
            } else {
                echo "Error deleting record: " . $con->error;
            }
        } else {
            $sql = "INSERT INTO comment(id_book, email, comment) VALUES('$id_book','$email','$comment')";
            if ($con->query($sql) === TRUE) {
                echo "Success2!";
            } else {
                echo "Error deleting record: " . $con->error;
            }
        }
    }
}
