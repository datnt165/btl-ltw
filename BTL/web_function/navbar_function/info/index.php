<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
  <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <title>Thông tin khách hàng</title>
</head>

<body>
  <?php
  include $_SERVER['DOCUMENT_ROOT'] . '/BTL/php/conn.php';
  $cookie_name = "email";
  $fname = $lname = $birth = $gender = $country = $type = '';
  if ($email = $_COOKIE[$cookie_name]) {
    $sql = "SELECT * FROM user  WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
      $fname = $row['fn'];
      $lname = $row['ln'];
      $birth = $row['birth'];
      $gender = $row['gender'];
      $country = $row['country'];
      $type = $row['type'];
    }
  }
  ?>
  <div class="container register">
    <div class="row">
      <div class="col-md-3 register-left">
        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
        <h3>Welcome</h3>
      </div>
      <div class="col-md-9 register-right">
        <h3 class="register-heading">Thông tin cá nhân</h3>
        <form method="" action="">
          <div class="register-form">
            <div class="row">
              <div class="col-md-3 title">Tài khoản</div>
              <div class="col-md-9">
                <div class="form-group">
                  <input type="text" class="form-control" disabled placeholder="Tài khoản" value="<?php echo $email; ?>" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 title">Loại tài khoản</div>
              <div class="col-md-9">
                <div class="form-group">
                  <input type="text" class="form-control" disabled placeholder="Loại tài khoản" value="<?php echo $type; ?>" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 title">Họ</div>
              <div class="col-md-9">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Họ" id="fname" value="<?php echo $fname; ?>" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 title">Tên</div>
              <div class="col-md-9">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Tên" id="lname" value="<?php echo $lname; ?>" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 title">Ngày sinh</div>
              <div class="col-md-9">
                <div class="form-group">
                  <input type="date" class="form-control" placeholder="Ngày sinh" id="birth" value="<?php echo $birth; ?>" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 title">Giới tính</div>
              <div class="col-md-9">
                <div class="form-group">
                  <div class="form-group">
                    <label class="radio inline">
                      <input type="radio" name="gender" value="Nam" <?php echo ($gender == "Nam") ? "checked" : '' ?> />
                      <span> Nam </span>
                    </label>
                    <label class="radio inline">
                      <input type="radio" name="gender" value="Nữ" <?php echo ($gender == "Nữ") ? "checked" : '' ?> />
                      <span>Nữ </span>
                    </label>
                    <label class="radio inline">
                      <input type="radio" name="gender" value="Khác" <?php echo ($gender == "Khác") ? "checked" : '' ?> />
                      <span>Khác </span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 title">Quốc gia</div>
              <div class="col-md-9">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Quốc gia" id="country" value="<?php echo $country; ?>" />
                </div>
              </div>
            </div>
            <div class="error mr-3"></div>
            <div class="row justify-content-right">
              <div class="col-md-6">
                <button type="button" class="btn btn-primary" name="back" id="back">
                  Quay lại
                </button>
              </div>
              <div class="col-md-6">
                <button type="button" class="btn btn-primary" name="submit" id="submit">
                  Lưu
                </button>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>
    <script>
      $(document).ready(function() {
        $('#back').on('click', function() {
          window.history.back();
        })
        $('#submit').on('click', function() {
          var fname = $('#fname').val();
          var lname = $('#lname').val();
          var birth = $('#birth').val();
          var gender = $('input[name=gender]:checked').val();
          var country = $('#country').val();
          if (!fname.length || !lname.length || !country.length) {
            $('.error').text('* Họ, Tên hoặc Quốc gia bị trống!');
          } else if (fname.length > 30 || fname.length < 2 || lname.length > 30 || lname.length < 2) {
            $('.error').text('* Họ, Tên giới hạn 2-30 ký tự!')
          } else {
            $.get("update.php", {
              fname: fname,
              lname: lname,
              birth: birth,
              country: country,
              gender: gender,
            }, function(data) {
              if (data) {
                $('.error').text(data);
              } else {
                if (confirm("Sửa thông tin thành công! Về trang chủ:"))
                  window.history.back();
              }
            })
          }
        })
      });
    </script>
</body>

</html>