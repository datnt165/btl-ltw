<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>phan2_bai2</title>
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
          '<td><input type="text" class="form-control" name="link" id="link"></td>' +
          '<td><input type="text" class="form-control" name="img" id="img"></td>' +
          '<td><input type="text" class="form-control" name="date" id="date"></td>' +
          '<td><input type="text" class="form-control" name="content" id="content"></td>' +
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
              var name = 'link';
              break;
            case 1:
              var name = 'img';
              break;
            case 2:
              var name = 'date';
              break;
            case 3:
              var name = 'content';
              break;
          }
          $(this).html('<input type="text" class="form-control" name="name" id="' + name + '" value = "' + $(this).text() + '">');
          $('#date').attr("disabled", 'disabled');
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

      function isValidDate(dateString) {
        var regEx = /^\d{4}-\d{2}-\d{2}$/;
        if (!dateString.match(regEx)) return false; // Invalid format
        var d = new Date(dateString);
        var dNum = d.getTime();
        if (!dNum && dNum !== 0) return false; // NaN value, Invalid date
        return d.toISOString().slice(0, 10) === dateString;
      }

      $('#back').on('click', function() {
        window.location.href = 'http://localhost/BTL/admin';
      })
      $(document).on("click", '.add', function() {
        $("#displaymessage").empty();
        var noti = "";
        var id = $("#id").text();
        var link = $("#link").val();
        var img = $("#img").val();
        var date = $("#date").val();
        var content = $("#content").val();
        if (!Boolean(link)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu link!</p><br>";
        }
        if (!Boolean(img)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu ảnh minh họa!</p><br>";
        }
        if (!Boolean(date)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu ngày đăng!</p><br>";
        } else if (!isValidDate(date)) {
          noti += "<p class='btn btn-dark' align='center'>Ngày không hợp lệ!</p><br>";
        }
        if (!Boolean(content)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu tiêu đề!</p><br>";
        }
        $("#displaymessage").html(noti);
        if (Boolean(noti) == "") {
          console.log('hello');
          $.get("b.php", {
            id: id,
            link: link,
            img: img,
            date: date,
            content: content,
          }, function(data) {
            $("#displaymessage").html(data);
          });
          $(this).parents("tr").find('input[type="text"]').each(function() {
            $(this).parent("td").html($(this).val());
          });
          $(this).parents("tr").find(".add, .edit, .cancel, .delete").toggle();
          $(".add-new").removeAttr("disabled");
          $("#id").removeAttr('id');
        }
      });
      $(document).on("click", ".save", function() {
        $("#displaymessage").empty();
        var noti = "";
        var id = $("#id").text();
        var link = $("#link").val();
        var img = $("#img").val();
        var date = $("#date").val();
        var content = $("#content").val();
        if (!Boolean(link)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu link!</p><br>";
        }
        if (!Boolean(img)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu ảnh minh họa!</p><br>";
        }
        if (!Boolean(date)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu ngày đăng!</p><br>";
        } else if (!isValidDate(date)) {
          noti += "<p class='btn btn-dark' align='center'>Ngày không hợp lệ!</p><br>";
        }
        if (!Boolean(content)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu tiêu đề!</p><br>";
        }
        $("#displaymessage").html(noti);
        if (Boolean(noti) == "") {
          console.log('hello');
          $.get("c.php", {
            id: id,
            link: link,
            img: img,
            date: date,
            content: content,
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
            <th>Link bài viết</th>
            <th>Ảnh minh họa</th>
            <th>Ngày đăng</th>
            <th>Tiêu đề</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include $_SERVER['DOCUMENT_ROOT'] . 'BTL/php/conn.php';
          $sql = "SELECT * FROM news";
          $result = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $link = $row['link'];
            $img = $row['img'];
            $date = $row['date'];
            $content = $row['content'];
          ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $link ?></td>
              <td><?php echo $img ?></td>
              <td><?php echo $date ?></td>
              <td><?php echo $content ?></td>
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