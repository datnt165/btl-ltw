<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý khách hàng</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
  <link rel="stylesheet" href="../style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var actions = $("table td:last-child").html();
      if (!Boolean(actions)) {
        actions = '<div class="row"> \
                  <div class="col-6"> \
                    <button type="button" class="btn btn-danger btn-block btn-sm edit" id="1">Edit</button> \
                  </div> \
                  <div class="col-6"> \
                    <button type="button" class="btn btn-danger btn-block btn-sm delete" id="1">Delete</button> \
                  </div> \
                  <div class="col-6"> \
                    <button type="button" class="btn btn-warning btn-block btn-sm save" style="display: none;">Save</button> \
                    <button type="button" class="btn btn-warning btn-block btn-sm add" style="display: none; margin-top:0px;">Add</button> \
                  </div> \
                  <div class="col-6"> \
                    <button type="button" class="btn btn-warning btn-block btn-sm cancel" style="display: none;">Cancel</button> \
                  </div> \
                </div> \ ';
      }
      $(".add-new").click(function() {
        $(this).attr("disabled", "disabled");
        var index = $("table tbody tr:last-child").index();
        var id = Number($("table tbody tr:last-child td:first-child").html());
        id ? id++ : 1;
        var row = '<tr>' +
          '<td id="id">' + id + '</td>' +
          '<td><input type="text" class="form-control" name="fn" id="fn"></td>' +
          '<td><input type="text" class="form-control" name="ln" id="ln"></td>' +
          '<td><input type="text" class="form-control" name="email" id="email"></td>' +
          '<td><input type="text" class="form-control" name="pw" id="pw"></td>' +
          '<td><input type="text" class="form-control" name="birth" id="birth"></td>' +
          '<td><input type="text" class="form-control" name="gender" id="gender"></td>' +
          '<td><input type="text" class="form-control" name="country" id="country"></td>' +
          '<td><input type="text" class="form-control" name="type" id="type" value="Khách hàng" disabled></td>' +
          '<td>' + actions + '</td>' +
          '</tr>';
        $("table").append(row);
        $("table tbody tr").eq(index + 1).find(".delete, .edit, .add, .cancel").toggle();
        $("#displaymessage").empty();
      });
      $(document).on("click", ".edit", function() {
        $("#displaymessage").empty();
        $(this).parents("tr").find("td:not(:last-child):not(:first-child)").each(function(i) {
          var name
          switch (i) {
            case 0:
              var name = 'fn';
              break;
            case 1:
              var name = 'ln';
              break;
            case 2:
              var name = 'email';
              break;
            case 3:
              var name = 'pw';
              break;
            case 4:
              var name = 'birth';
              break;
            case 5:
              var name = 'gender';
              break;
            case 6:
              var name = 'country';
              break;
            case 7:
              var name = 'type';
              break;
          }
          $(this).html('<input type="text" class="form-control" name="name" id="' + name + '" value = "' + $(this).text() + '">');
          $('#type').attr("disabled", 'disabled');
        });
        $(this).parents("tr").find("td:first-child").attr("id", "id");
        $(this).parents("tr").find(".delete, .edit, .save, .cancel").toggle();
        $(".add-new").attr("disabled", "disabled");
      });
      $(document).on("click", ".cancel", function() {
        location.reload();
      });
      $(document).on("click", ".delete", function() {
        $(this).parents("tr").remove();
        $(".add-new").removeAttr("disabled");
        var id = $(this).attr("id");
        $.get("d.php", {
          id: id
        }, function(data) {
          $("#displaymessage").html(data);
        });
      });

      function validateEmail(email) {
        const re =
          /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
      }

      function isValidDate(dateString) {
        var regEx = /^\d{4}-\d{2}-\d{2}$/;
        if (!dateString.match(regEx)) return false; // Invalid format
        var d = new Date(dateString);
        var dNum = d.getTime();
        if (!dNum && dNum !== 0) return false; // NaN value, Invalid date
        return d.toISOString().slice(0, 10) === dateString;
      }

      $('#back').on('click', function() {
        window.history.back();
      })
      $(document).on("click", '.add', function() {
        $("#displaymessage").empty();
        var noti = "";
        var id = $("#id").text();
        var fn = $("#fn").val();
        var ln = $("#ln").val();
        var email = $("#email").val();
        var pw = $("#pw").val();
        var birth = $("#birth").val();
        var gender = $("#gender").val();
        var country = $("#country").val();
        var type = $("#type").val();
        if (!Boolean(fn)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu họ!</p><br>";
        } else if (fn.length < 2 || fn.length > 30) {
          noti += "<p class='btn btn-dark' align='center'>Họ độ dài 2-30 ký tự!</p><br>";
        }
        if (!Boolean(ln)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu tên!</p><br>";
        } else if (ln.length < 2 || ln.length > 30) {
          noti += "<p class='btn btn-dark' align='center'>Tên độ dài 2-30 ký tự!</p><br>";
        }
        if (!Boolean(email)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu email!</p><br>";
        } else if (!validateEmail(email)) {
          noti += "<p class='btn btn-dark' align='center'>Email không hợp lệ!</p><br>";
        }
        if (!Boolean(pw)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu password!</p><br>";
        } else if (pw.length < 2 || pw.length > 30) {
          noti += "<p class='btn btn-dark' align='center'>Password độ dài 2-30 ký tự!</p><br>";
        }
        if (!Boolean(birth)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu ngày sinh!</p><br>";
        } else if (!isValidDate(birth)) {
          noti += "<p class='btn btn-dark' align='center'>Ngày không hợp lệ!</p><br>";
        }

        if (!Boolean(country)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu quốc gia!</p><br>";
        }
        $("#displaymessage").html(noti);
        if (Boolean(noti) == "") {
          console.log('hello');
          $.get("b.php", {
            id: id,
            fn: fn,
            ln: ln,
            email: email,
            pw: pw,
            birth: birth,
            gender: gender,
            country: country,
            type: type
          }, function(data) {
            $("#displaymessage").html(data);
          });
          $(this).parents("tr").find('input[type="text"]').each(function() {
            $(this).parent("td").html($(this).val());
          });
          $(this).parents("tr").find(".save, .edit, .cancel, .delete").toggle();
          $(".add-new").removeAttr("disabled");
          $("#id").removeAttr('id');
        }
      });
      $(document).on("click", ".save", function() {
        $("#displaymessage").empty();
        var noti = "";
        var id = $("#id").text();
        var fn = $("#fn").val();
        var ln = $("#ln").val();
        var email = $("#email").val();
        var pw = $("#pw").val();
        var birth = $("#birth").val();
        var gender = $("#gender").val();
        var country = $("#country").val();
        var type = $("#type").val();
        if (!Boolean(fn)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu họ!</p><br>";
        } else if (fn.length < 2 || fn.length > 30) {
          noti += "<p class='btn btn-dark' align='center'>Họ độ dài 2-30 ký tự!</p><br>";
        }
        if (!Boolean(ln)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu tên!</p><br>";
        } else if (ln.length < 2 || ln.length > 30) {
          noti += "<p class='btn btn-dark' align='center'>Tên độ dài 2-30 ký tự!</p><br>";
        }
        if (!Boolean(email)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu email!</p><br>";
        } else if (!validateEmail(email)) {
          noti += "<p class='btn btn-dark' align='center'>Email không hợp lệ!</p><br>";
        }
        if (!Boolean(pw)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu password!</p><br>";
        } else if (pw.length < 2 || pw.length > 30) {
          noti += "<p class='btn btn-dark' align='center'>Password độ dài 2-30 ký tự!</p><br>";
        }
        if (!Boolean(birth)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu ngày sinh!</p><br>";
        } else if (!isValidDate(birth)) {
          noti += "<p class='btn btn-dark' align='center'>Ngày không hợp lệ!</p><br>";
        }

        if (!Boolean(country)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu quốc gia!</p><br>";
        }
        $("#displaymessage").html(noti);
        if (noti == "") {
          console.log('hello');
          $.get("c.php", {
            id: id,
            fn: fn,
            ln: ln,
            email: email,
            pw: pw,
            birth: birth,
            gender: gender,
            country: country,
            type: type
          }, function(data) {
            console.log(data);
            $("#displaymessage").html(data);
          });
          $(this).parents("tr").find('input[type="text"]').each(function() {
            $(this).parent("td").html($(this).val());
          });
          $(this).parents("tr").find(".save, .edit, .cancel, .delete").toggle();
          $(".add-new").removeAttr("disabled");
          $("#id").removeAttr('id');
        }
      })
    });
  </script>
</head>

<body>
  <div class="container-fluid back-ground">
    <div class="head">
      <h1>Danh sách khách hàng</h1>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-4 col-6" style="padding-bottom: 20px;">
        <button type="button" class="btn btn-info btn-block btn-sm add-new">Thêm tài khoản</button>
      </div>
      <div class="col-md-3 col-sm-4 col-6" style="padding-bottom: 20px;">
        <button type="button" class="btn btn-info btn-block btn-sm" id="back">Trang quản lý</button>
      </div>
    </div>
    <div class="row table-responsive-sm">
      <table class="table table-bordered table-sm">
        <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>Họ</th>
            <th>Tên</th>
            <th>Tài khoản email</th>
            <th>Mật khẩu</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Quốc gia</th>
            <th>Loại tài khoản</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include $_SERVER['DOCUMENT_ROOT'] . '/BTL/php/conn.php';
          $sql = "SELECT * FROM user where type != 'Admin'";
          $result = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $fn = $row['fn'];
            $ln = $row['ln'];
            $email = $row['email'];
            $password = $row['password'];
            $birth = $row['birth'];
            $gender = $row['gender'];
            $country = $row['country'];
            $type = $row['type'];
          ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $fn ?></td>
              <td><?php echo $ln ?></td>
              <td><?php echo $email ?></td>
              <td><?php echo $password ?></td>
              <td><?php echo $birth ?></td>
              <td><?php echo $gender ?></td>
              <td><?php echo $country ?></td>
              <td><?php echo $type ?></td>
              <td>
                <div class="row">
                  <div class="col-6">
                    <button type="button" class="btn btn-danger btn-block btn-sm edit" id="<?php echo $id; ?>">Edit</button>
                  </div>
                  <div class="col-6">
                    <button type="button" class="btn btn-danger btn-block btn-sm delete" id="<?php echo $id; ?>">Delete</button>
                  </div>
                  <div class="col-6">
                    <button type="button" class="btn btn-warning btn-block btn-sm save" style="display: none;">Save</button>
                    <button type="button" class="btn btn-warning btn-block btn-sm add" style="display: none; margin-top:0px;">Add</button>
                  </div>
                  <div class="col-6">
                    <button type="button" class="btn btn-warning btn-block btn-sm cancel" style="display: none;">Cancel</button>
                  </div>
                </div>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <div>
    <h4 style="color: white;">Notification:</h4>
  </div>
  <div id="displaymessage"></div>
</body>

</html>