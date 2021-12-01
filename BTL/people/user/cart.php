<?php
include $_SERVER['DOCUMENT_ROOT'] . '/BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $email = $_GET['email'];
  $sql = "SELECT * FROM cart  WHERE email = '$email'";
  $result = mysqli_query($con, $sql);
  $output = '';
  $total = 0;
  $loca = 1;
  while ($row = mysqli_fetch_assoc($result)) {
    $id_book = $row['id_book'];
    $sql_1 = "SELECT c.id_book, b.name, b.price, c.many FROM cart c, books b WHERE c.id_book = b.id && c.id_book = '$id_book' && email = '$email'";
    $result1 = mysqli_query($con, $sql_1);
    $row1 = mysqli_fetch_assoc($result1);
    $name = $row1['name'];
    $price = $row1['price'];
    $many = $row1['many'];
    $total += (int)$price * (int)$many;
    $output .= '          <div class="cart-row input">
            <div class="cart-item cart-column">
              <span class="cart-item-title"
                >' . $name . '</span
              >
            </div>
            <span class="cart-price cart-column">' . $price . '.000đ</span>
            <div class="cart-quantity cart-column">
              <input class="form-control number" type="number" onfocus="setOldMany(this.value);" onchange="change_product(' . $id_book . ',' . $price . ', $(this).val())" value="' . $many . '" />
              <button class="btn btn-info b_delete" type="button" onclick="delete_product(' . $id_book . ',' . $price . ',' . $many . ')"' . $loca++ . '">Xóa</button>
            </div>
          </div>';
  }
  echo $output;
  echo $total;
}
