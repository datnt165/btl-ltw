<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
  <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <title>phan1_bai6</title>
</head>

<body>
  <?php
  include $_SERVER['DOCUMENT_ROOT'] . 'BTL/php/conn.php';
  $cookie_name = "email";
  $fname = $lname = $birth = $gender = $country = $type = '';
  if ($email = $_COOKIE[$cookie_name]) {
  }
  ?>
  <div id="nav-placeholder"></div>
  <div class="container register mt-5">
    <div class="row">
      <div class="col-md-3 register-left">
        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
        <h3>Welcome</h3>
      </div>
      <div class="col-md-9 register-right">
        <h3 class="register-heading">Đổi mật khẩu</h3>
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
              <div class="col-md-3 title">Mật khẩu cũ</div>
              <div class="col-md-9">
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="" value="" id="old_pass" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 title">Mật khẩu mới</div>
              <div class="col-md-9">
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="" value="" id="new_pass" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 title">Xác nhận lại</div>
              <div class="col-md-9">
                <div class="form-group">
                  <input type="password" class="form-control" placeholder="" value="" id="new_pass_conf" />
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
        $('#submit').on('click', function() {
          var old_pass = $('#old_pass').val();
          var new_pass = $('#new_pass').val();
          var new_pass_conf = $('#new_pass_conf').val();
          if (!old_pass.length || !new_pass.length || !new_pass_conf.length) {
            $('.error').text('* Hãy điền vào chỗ trống!');
          } else if (old_pass.length > 30 || old_pass.length < 2 || new_pass_conf.length > 30 || new_pass_conf.length < 2 || new_pass.length > 30 || new_pass.length < 2) {
            $('.error').text('* Mật khẩu được giới hạn 2-30 ký tự!')
          } else {
            $.get("changepw.php", {
              old_pass: old_pass,
              new_pass: new_pass,
              new_pass_conf: new_pass_conf,
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