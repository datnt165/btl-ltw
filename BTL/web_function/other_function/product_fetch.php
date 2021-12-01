<?php
include $_SERVER['DOCUMENT_ROOT'] . '/BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {

  if (array_key_exists('cur_page', $_GET)) {
    $cur_page = $_GET['cur_page'];
    $sql = "SELECT COUNT(*) FROM books";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $max_product = $row["COUNT(*)"];
    $i = 0;
    $output = ceil($max_product / 8);
    while ($i < 8) {
      $id = $max_product - $i - 8 * ($cur_page - 1);
      if ($id > 0) {
        $sql = "SELECT * FROM books  WHERE id = '$id'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $img = $row['img'];
        $price = $row['price'] . '.000 đ';
        // $content = $row['content'];
        if ($row) {
          $output .=     '<div class="col-md-3 col-sm-6 col-6" style="border: 2px solid #e5e5e5; border-left:0">
            <div class="item">
              <div class="img-big">
                <a
                  href="product_detail.php?id=' . $id . '"
                  title="' . $name . '"
                >
                  <img
                    src="' . $img . '"
                    alt="' . $name . '"
                    class="img-responsive"
                  />
                </a>
              </div>
              <div class="info">
                <div class="product-name">
                  <a
                    href="product_detail.php?id=' . $id . '"
                    >' . $name . '</a
                  >
                </div>
              </div>
              <div class="price-after-list">
                <div class="price">' . $price . '</div>
              </div>
            </div>
          </div>';
        }
      }
      $i++;
    }
    echo $output;
  }
  if (array_key_exists('search', $_GET)) {
    $output = '1';
    $search = $_GET['search'];
    $sql = "SELECT * FROM books  WHERE name like '%$search%' || author like '%$search%'";
    $result = mysqli_query($con, $sql);
    // $content = $row['content'];
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['id'];
      $name = $row['name'];
      $img = $row['img'];
      $price = $row['price'] . '.000 đ';
      $output .=     '<div class="col-md-3 col-sm-6 col-6" style="border: 2px solid #e5e5e5; border-left:0">
        <div class="item">
          <div class="img-big">
            <a
              href="product_detail.php?id=' . $id . '"
              title="' . $name . '"
            >
              <img
                src="' . $img . '"
                alt="' . $name . '"
                class="img-responsive"
              />
            </a>
          </div>
          <div class="info">
            <div class="product-name">
              <a
                href="product_detail.php?id=' . $id . '"
                >' . $name . '</a
              >
            </div>
          </div>
          <div class="price-after-list">
            <div class="price">' . $price . '</div>
          </div>
        </div>
      </div>';
    }
    echo $output;
  }
}
