<?php
include $_SERVER['DOCUMENT_ROOT'] . 'BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $sql = "SELECT * FROM contact";
  $result = mysqli_query($con, $sql);
  $output = "";
  while ($row = mysqli_fetch_assoc($result)) {
    $social = $row['social'];
    $link = $row['link'];
    $output .= '      <a class="btn btn-outline-light btn-floating m-1" href="' . $link . '" role="button"
        ><i class="fab fa-' . $social . '"></i
      ></a>';
  }
  echo $output;
}
