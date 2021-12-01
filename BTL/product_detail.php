<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chi tiết</title>
  <link rel="stylesheet" href="./style.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
  <?php
  include $_SERVER['DOCUMENT_ROOT'] . '/BTL/php/conn.php';
  error_reporting(E_ALL & ~E_NOTICE);
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $sql = "SELECT * FROM books  WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $author = $row['author'];
    $price = $row['price'];
    $page = $row['page'];
    $lang = $row['lang'];
    $type = $row['type'];
    $img = $row['img'];
  }

  ?>
  <div id="nav-placeholder"></div>
  <div class="container mb-2" style="margin-top: 70px">
    <form class="mx-2 my-auto d-inline w-100">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Tên sách, tên tác giả, ..." />
        <span class="input-group-append">
          <button class="btn btn-outline-secondary" type="button">
            Tìm kiếm
          </button>
        </span>
      </div>
    </form>
    <div class="row py-2" style="background: #f5df87">
      <div class="col-sm-5">
        <a href="index.html">Trang chủ</a>
        <span>></span>
        <a href="product.html">Sản phẩm</a>
        <span>></span>
        <a href="product-detail.html"><?php echo $name; ?></a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5">
        <div class="row">
          <div class="col-md-12 my-2">
            <div class="product-row-img py-2" style="border: solid black 1px">
              <img class="product-row-thumbnail" src="<?php echo  $img; ?>" />
            </div>
          </div>
        </div>
        <div class="row pl-3">
          <div class="col-md-3 col-sm-3 col-3 pl-0">
            <div class="product-row-img">
              <img class="product-row-thumbnail-small" src="<?php echo  $img; ?>" alt="" />
            </div>
          </div>
          <div class="col-md-3 col-sm-3 col-3 pl-0">
            <div class="product-row-img">
              <img class="product-row-thumbnail-small" src="img/product_4/<?php echo $id; ?>/pic1.png" alt="" />
            </div>
          </div>
          <div class="col-md-3 col-sm-3 col-3 pl-0">
            <div class="product-row-img">
              <img class="product-row-thumbnail-small" src="img/product_4/<?php echo $id; ?>/pic2.png" alt="" />
            </div>
          </div>
          <div class="col-md-3 col-sm-3 col-3 pl-0">
            <div class="product-row-img">
              <img class="product-row-thumbnail-small" src="img/product_4/<?php echo $id; ?>/pic3.png" alt="" />
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 mt-2 ml-4">
        <div class="header">
          <p style="font-size: 30px; font-weight: 600">
            <?php echo $name; ?>
          </p>
        </div>
        <h5>Thông tin chi tiết</h5>
        <div class="table">
          <table>
            <tbody>
              <tr>
                <td scope="row" style="background: rgb(239, 239, 239)">
                  Tác giả
                </td>
                <td style="background: rgb(220, 239, 239)"><?php echo $author ?></td>
              </tr>
              <tr>
                <td scope="row" style="background: rgb(239, 239, 239)">
                  Số trang
                </td>
                <td style="background: rgb(220, 239, 239)"><?php echo $page; ?></td>
              </tr>
              <tr>
                <td scope="row" style="background: rgb(239, 239, 239)">
                  Ngôn ngữ
                </td>
                <td style="background: rgb(220, 239, 239)">Tiếng <?php echo $lang; ?></td>
              </tr>
              <tr>
                <td scope="row" style="background: rgb(239, 239, 239)">
                  Loại bìa
                </td>
                <td style="background: rgb(220, 239, 239)">Bìa mềm</td>
              </tr>
              <tr>
                <td scope="row" style="background: rgb(239, 239, 239)">
                  Thể loại
                </td>
                <td style="background: rgb(220, 239, 239)">
                  <?php echo $type; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="price">
          <h4 style="color: red">Giá: <?php echo $price ?>.000 VNĐ</h4>
        </div>
        <button type="button" class="btn btn-danger" id='buy'>Chọn mua</button>
      </div>
    </div>
    <hr>
    <h4 class="mt-5">Sản phẩm tương tự</h4>
    <div class="row">
      <div class="col-md-3 col-sm-6 col-6" style="border: 0.5px black solid;">
        <div id="displaymessage" class="item">
          <div class="img-big">
            <a href="product_detail.php?id=8" title="Con Chim Xanh Biếc Bay Về">
              <img src="img/product/ccxbbv.png" class="img-responsive" />
            </a>
          </div>
          <div class="info">
            <div class="product-name">
              <a href="product_detail.php?id=8">Con Chim Xanh Biếc Bay Về</a>
            </div>
          </div>
          <div class="price-after-list">
            <div class="price">115.000 VNĐ</div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-6" style="border: 0.5px black solid; border-left:0;">
        <div id="displaymessage" class="item">
          <div class="img-big">
            <a href="product_detail.php?id=6" title="Đại Việt Sử Ký Toàn Thư Trọn Bộ">
              <img src="img/product/dvsk.png" class="img-responsive" />
            </a>
          </div>
          <div class="info">
            <div class="product-name">
              <a href="product_detail.php?id=6">Đại Việt Sử Ký Toàn Thư Trọn Bộ</a>
            </div>
          </div>
          <div class="price-after-list">
            <div class="price">156.000 VNĐ</div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-6" style="border: 0.5px black solid; border-left:0;">
        <div id="displaymessage" class="item">
          <div class="img-big">
            <a href="product_detail.php?id=3" title="Đàn Ông Sao Hỏa Đàn Bà Sao Kim">
              <img src="img/product/dosh.png" class="img-responsive" />
            </a>
          </div>
          <div class="info">
            <div class="product-name">
              <a href="product_detail.php?id=3">Đàn Ông Sao Hỏa Đàn Bà Sao Kim</a>
            </div>
          </div>
          <div class="price-after-list">
            <div class="price">135.000 VNĐ</div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-6" style="border: 0.5px black solid; border-left:0;">
        <div id="displaymessage" class="item">
          <div class="img-big">
            <a href="product_detail.php?id=10" title="Màn hình LCD LG 19.5 inch 20MK400H-B">
              <img src="img/product/scen.png" alt="Science Encyclopedia" class="img-responsive" />
            </a>
          </div>
          <div class="info">
            <div class="product-name">
              <a href="product_detail.php?id=10">Science Encyclopedia</a>
            </div>
          </div>
          <div class="price-after-list">
            <div class="price">365.000 VNĐ</div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <h4 class="mt-5">Mô tả sản phẩm</h4>
    <p>...</p>
    <h4>Đánh giá - Nhận xét từ khách hàng</h4>
    <hr>

    <?php
    if ($email = $_COOKIE['email']) {
      $sql = "SELECT * FROM comment  WHERE id_book = '$id' && email = '$email'";
      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_assoc($result);
      if ($row) {
    ?>
        <div class="row" style="border-bottom: black 0.2px solid;">
          <div class="col-sm-5" style="border-right: black 0.2px solid">
            <p>Người dùng: <?php echo $email; ?></p>
          </div>
          <div class="col-sm-7">
            <h5 style="text-decoration: underline">Đánh giá</h5>
            <div class="form-group">
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $row['comment'] ?></textarea>
            </div>
            <button type="button" class="btn btn-secondary mb-3" id="comment">
              Gửi
            </button>
          </div>
        </div>
      <?php
      } else {
      ?>
        <div class="row" style="border-bottom: black 0.2px solid;">
          <div class="col-sm-5" style="border-right: black 0.2px solid">
            <p>Người dùng: <?php echo $email; ?></p>
          </div>
          <div class="col-sm-7">
            <h5 style="text-decoration: underline">Đánh giá</h5>
            <div class="form-group">
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" cols=""></textarea>
            </div>
            <button type="button" class="btn btn-secondary  mb-3" id="comment">
              Gửi
            </button>
          </div>
        </div>
      <?php
      }
    }
    $sql = "SELECT * FROM comment  WHERE id_book = '$id' && email != '$email'";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <div class="row" style="border-bottom: black 0.2px solid;">
        <div class="col-sm-5" style="border-right: black 0.2px solid">
          <p>Người dùng: <?php echo $row['email'] ?></p>
        </div>
        <div class="col-sm-7">
          <h5 style="text-decoration: underline">Đánh giá</h5>
          <div class="form-group">
            <p><?php echo $row['comment'] ?></p>
          </div>
        </div>
      </div>
    <?php
    }
    ?>

  </div>

  <div id="footer"></div>
  <script>
    $(document).ready(function() {
      function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
          let c = ca[i];
          while (c.charAt(0) == ' ') {
            c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
          }
        }
        return "";
      }
      $('#comment').on('click', function() {
        var email = getCookie('email');
        var id_book = $.urlParam('id');
        var comment = $('#exampleFormControlTextarea1').val();
        $.get('./people/user/comment.php', {
          id_book: id_book,
          comment: comment,
        }, function(data) {
          console.log(data);
          location.reload()
        })
      })
      $('#buy').on('click', function() {
        var email = getCookie('email');
        var id_book = $.urlParam('id');
        if (email) {
          $.get('./people/user/buy.php', {
            id_book: id_book
          }, function(data) {
            console.log(data);
          })
          if (confirm("Đã thêm vào giỏ hàng, tới giỏ hàng!")) {
            $('button#modal').click();
          }
        } else {
          if (confirm("Bạn đã có tài khoản?")) {
            window.location.href = "./web_function/navbar_function/login/";
          }
        }
      })
      $.urlParam = function(name) {
        var results = new RegExp("[\?&]" + name + "=([^&#]*)").exec(
          window.location.search
        );
        return results !== null ? results[1] || 0 : false;
      };
      console.log($.urlParam('id'));

      function show() {
        $.get(
          "product_detail.php", {
            id: $.urlParam('id'),
          }
        );
      }
      $('img.product-row-thumbnail-small').on('click', function() {
        $('.product-row-thumbnail').attr('src', $(this).attr('src'));
      })
      show();
      $("#nav-placeholder").load("./html/nav.html", function() {
        $(".nav-link").each(function() {
          $(this).removeClass("active");
        });
      });
      $("#footer").load("./html/footer.html");
    })
  </script>
</body>

</html>