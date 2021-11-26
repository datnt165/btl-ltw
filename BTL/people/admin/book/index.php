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
          '<td><input type="text" class="form-control" name="name" id="name"></td>' +
          '<td><input type="text" class="form-control" name="author" id="author"></td>' +
          '<td><input type="text" class="form-control" name="price" id="price"></td>' +
          '<td><input type="text" class="form-control" name="page" id="page"></td>' +
          '<td><input type="text" class="form-control" name="lang" id="lang"></td>' +
          '<td><input type="text" class="form-control" name="type" id="type"></td>' +
          '<td><input type="text" class="form-control" name="img" id="img"></td>' +
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
              var name = 'name';
              break;
            case 1:
              var name = 'author';
              break;
            case 2:
              var name = 'price';
              break;
            case 3:
              var name = 'page';
              break;
            case 4:
              var name = 'lang';
              break;
            case 5:
              var name = 'type';
              break;
            case 6:
              var name = 'img';
              break;
          }
          $(this).html('<input type="text" class="form-control" name="name" id="' + name + '" value = "' + $(this).text() + '">');
          $('#name').attr("disabled", 'disabled');
          $('#author').attr("disabled", 'disabled');
          $('#page').attr("disabled", 'disabled');
          $('#lang').attr("disabled", 'disabled');
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

      $('#back').on('click', function() {
        window.location.href = 'http://localhost/BTL/admin';
      })
      $(document).on("click", '.add', function() {
        $("#displaymessage").empty();
        var noti = "";
        var id = $("#id").text();
        var name = $("#name").val();
        var author = $("#author").val();
        var price = $("#price").val();
        var page = $("#page").val();
        var lang = $("#lang").val();
        var type = $("#type").val();
        var img = $("#img").val();
        if (!Boolean(name)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu tên sách!</p><br>";
        }
        if (!Boolean(author)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu tên tác giả!</p><br>";
        }
        if (!Boolean(price)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu giá sách!</p><br>";
        }
        if (!Boolean(page)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu số trang!</p><br>";
        }
        if (!Boolean(lang)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu ngôn ngữ!</p><br>";
        }
        if (!Boolean(type)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu thể loại sách!</p><br>";
        }
        if (!Boolean(img)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu nguồn ảnh minh họa!</p><br>";
        }
        $("#displaymessage").html(noti);
        if (Boolean(noti) == "") {
          console.log('hello');
          $.get("b.php", {
            id: id,
            name: name,
            author: author,
            price: price,
            page: page,
            lang: lang,
            type: type,
            img: img,
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
        var price = $("#price").val();
        var img = $("#img").val();
        if (!Boolean(price)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu giá sách!</p><br>";
        }
        if (!Boolean(type)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu thể loại sách!</p><br>";
        }
        $("#displaymessage").html(noti);
        if (noti == "") {
          console.log('hello');
          $.get("c.php", {
            id: id,
            price: price,
            img: img,
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
            <th>Tên sách</th>
            <th>Tác giả</th>
            <th>Giá</th>
            <th>Số trang</th>
            <th>Ngôn ngữ</th>
            <th>Thể loại</th>
            <th>Nguồn ảnh</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include $_SERVER['DOCUMENT_ROOT'] . 'BTL/php/conn.php';
          $sql = "SELECT * FROM books ";
          $result = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $author = $row['author'];
            $price = $row['price'];
            $page = $row['page'];
            $lang = $row['lang'];
            $type = $row['type'];
            $img = $row['img'];
          ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $name ?></td>
              <td><?php echo $author ?></td>
              <td><?php echo $price ?></td>
              <td><?php echo $page ?></td>
              <td><?php echo $lang ?></td>
              <td><?php echo $type ?></td>
              <td><?php echo $img ?></td>
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
    <div class="">
      <h4 style="color: white;">Notification:</h4>
      <p style="color: white; font: size 20px;">Giá: điền số hàng nghìn</p>
      <p style="color: white; font: size 20px;">Thể loại: có 8 thể loại chính sau:</p>
      <ul style="color: white; font: size 20px;" class="list-inline">
        <li class="list-inline-item">Văn học nghệ thuật</li>
        <li class="list-inline-item">Tâm lý, tâm linh, tôn giáo</li>
        <li class="list-inline-item">Văn hóa xã hội – Lịch sử</li>
        <li class="list-inline-item">Chính trị – pháp luật</li>
        <li class="list-inline-item">Khoa học công nghệ – Kinh tế</li>
        <li class="list-inline-item">Giáo trình</li>
        <li class="list-inline-item">Truyện, tiểu thuyết</li>
        <li class="list-inline-item">Sách thiếu nhi</li>
      </ul>
    </div>
  </div>

  <div id="displaymessage"></div>
</body>

</html>