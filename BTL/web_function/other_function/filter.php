<?php
include $_SERVER['DOCUMENT_ROOT'] . 'BTL/php/conn.php';
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $cur_page = $_GET['cur_page'];
    $type = $_GET['type'];
    $lang = $_GET['lang'];
    $pprice = $_GET['price'];
}
$link_condition = ' && ';
$filter_type = '';
switch ($type) {
    case '00':
        break;
    case '01':
        $filter_type .= "type = 'Chính trị – pháp luật'";
        break;
    case '02':
        $filter_type .= "type = 'Khoa học công nghệ – Kinh tế'";
        break;
    case '03':
        $filter_type .= "type = 'Văn học nghệ thuật'";
        break;
    case '04':
        $filter_type .= "type = 'Văn hóa xã hội – Lịch sử'";
        break;
    case '05':
        $filter_type .= "type = 'Giáo trình'";
        break;
    case '06':
        $filter_type .= "type = 'Truyện, tiểu thuyết'";
        break;
    case '07':
        $filter_type .= "type = 'Tâm lý, tâm linh, tôn giáo'";
        break;
    case '08':
        $filter_type .= "type = 'Sách thiếu nhi'";
        break;
    default:
        break;
}
$filter_price = '';
switch ($pprice) {
    case '00':
        break;
    case '01':
        if ($filter_type != '') {
            $filter_price .= $link_condition;
        }
        $filter_price .= 'price < 100';
        break;
    case '02':
        if ($filter_type != '') {
            $filter_price .= $link_condition;
        }
        $filter_price .= 'price >= 100 && price < 300';
        break;
    case '03':
        if ($filter_type != '') {
            $filter_price .= $link_condition;
        }
        $filter_price .= 'price >= 300 && price < 1000';
        break;
    case '04':
        if ($filter_type != '') {
            $filter_price .= $link_condition;
        }
        $filter_price .= 'price >= 1000';
        break;
    default:
        break;
}
$filter_lang = '';
switch ($lang) {
    case '00':
        break;
    case '01':
        if ($filter_type != '' || $filter_price != '') {
            $filter_lang .= $link_condition;
        }
        $filter_lang .= "lang = 'Việt'";
        break;
    case '02':
        if ($filter_type != '' || $filter_price != '') {
            $filter_lang .= $link_condition;
        }
        $filter_lang .= "lang = 'Anh'";
        break;
    case '03':
        if ($filter_type != '' || $filter_price != '') {
            $filter_lang .= $link_condition;
        }
        $filter_lang .= "lang = 'Khác'";
        break;
    default:
        break;
}
$sub_sql = $filter_type . $filter_price . $filter_lang;
if ($sub_sql != '') {
    $sql = "SELECT * FROM books WHERE " . $sub_sql;
    $result = mysqli_query($con, $sql);
    $output = '1';
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $img = $row['img'];
        $price = $row['price'] . '.000 đ';

        if ($row) {
            $output .=     '<div class="col-md-3 col-sm-6 col-6" style="border: 2px solid #e5e5e5; border-left:0">
                <div class="item">
                  <div class="img-big">
                    <a
                      href="product_detail.php?id=' . $row['id'] . '"
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
                        href="product_detail.php?id=' . $row['id'] . '"
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
    // $sql = "SELECT COUNT(*) FROM books WHERE " . $type;
    // $result = mysqli_query($con, $sql);
    // $row = mysqli_fetch_assoc($result);
    // $max_product = $row["COUNT(*)"];
    // $i = 0;
    // $output = ceil($max_product / 8);
    // while ($i < 8) {
    //     $id = $max_product - $i - 8 * ($cur_page - 1);
    //     if ($id > 0) {
    //         $sql = "SELECT * FROM books  WHERE id = '$id'";
    //         $result = mysqli_query($con, $sql);
    //         $row = mysqli_fetch_assoc($result);
    //         $name = $row['name'];
    //         $img = $row['img'];
    //         $price = $row['price'];
    //         // $content = $row['content'];
    //         if ($row) {
    //             $output .=     '<div class="col-md-3 col-sm-6 col-6" style="border: 2px solid #e5e5e5; border-left:0">
    //             <div class="item">
    //               <div class="img-big">
    //                 <a
    //                   href="product_detail.html"
    //                   title="' . $name . '"
    //                 >
    //                   <img
    //                     src="img/product/' . $img . '"
    //                     alt="' . $name . '"
    //                     class="img-responsive"
    //                   />
    //                 </a>
    //               </div>
    //               <div class="info">
    //                 <div class="product-name">
    //                   <a
    //                     href="product_detail.html"
    //                     >' . $name . '</a
    //                   >
    //                 </div>
    //               </div>
    //               <div class="price-after-list">
    //                 <div class="price">' . $price . '</div>
    //               </div>
    //             </div>
    //           </div>';
    //         }
    //     }
    //     $i++;
    // }
    echo $output;
}
