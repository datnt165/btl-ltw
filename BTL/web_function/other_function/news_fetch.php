<?php
include $_SERVER['DOCUMENT_ROOT'] . 'BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $cur_page = $_GET['cur_page'];
}
$sql = "SELECT MAX(id) FROM news";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$max_news = $row['MAX(id)'];
$i = 0;
$output = "";
while ($i < 3) {
  $id = $max_news - $i - 3 * ($cur_page - 1);
  $sql = "SELECT * FROM news  WHERE id = '$id'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_assoc($result);
  $link = $row['link'];
  $img = $row['img'];
  $date = $row['date'];
  $content = $row['content'];
  $i++;
  if ($row) {
    $output .= '<div class="row new" id="' . $id . '">
    <div class="col-sm-5">
  <a href="' . $link . '">
    <img src="' . $img . '" class="d-block w-100 thumb" style="
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 50%;
    "></a>
</div>
<div class="col-sm-7">
  <p class="time">Ngày-' . $date . '</p>
  <h5 class="news-title">' . $content . '</h5> 
  <h6 class="watch-now">Xem ngay >></h6> 
</div>
</div>';
  }
}
echo $output;
