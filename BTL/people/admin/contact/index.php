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
      $(document).on("click", ".edit", function() {
        $("#displaymessage").empty();
        $(this).parents("tr").find("td:not(:last-child):not(:first-child)").each(function(i) {
          var name
          switch (i) {
            case 0:
              var name = 'social';
              break;
            case 1:
              var name = 'link';
              break;
          }
          $(this).html('<input type="text" class="form-control" name="name" id="' + name + '" value = "' + $(this).text() + '">');
          $('#social').attr("disabled", 'disabled');
        });
        $(this).parents("tr").find("td:first-child").attr("id", "id");
        $(this).parents("tr").find(".delete, .edit, .save, .cancel").toggle();
        $(".add-new").attr("disabled", "disabled");
      });
      $(document).on("click", ".cancel", function() {
        location.reload();
      });

      $('#back').on('click', function() {
        window.location.href = 'http://localhost/BTL/admin';
      })

      $(document).on("click", ".save", function() {
        $("#displaymessage").empty();
        var noti = "";
        var id = $("#id").text();
        var link = $("#link").val();
        if (!Boolean(link)) {
          noti += "<p class='btn btn-dark' align='center'>Thiếu link!</p><br>";
        }
        $("#displaymessage").html(noti);
        if (Boolean(noti) == "") {
          console.log('hello');
          $.get("c.php", {
            id: id,
            link: link,
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
        <button type="button" class="btn btn-info btn-block btn-sm" id="back">Trang quản lý</button>
      </div>
    </div>
    <div class="row table-responsive-sm">
      <table class="table table-bordered table-sm">
        <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>Mạng xã hội</th>
            <th>Link liên hệ</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include $_SERVER['DOCUMENT_ROOT'] . 'BTL/php/conn.php';
          $sql = "SELECT * FROM contact";
          $result = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $social = $row['social'];
            $link = $row['link'];
          ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $social ?></td>
              <td><?php echo $link ?></td>
              <td>
                <div class="row justify-content-center">
                  <div class="col-12">
                    <button type="button" class="btn btn-danger btn-block btn-sm edit" id="<?php echo $id; ?>">Edit</button>
                  </div>
                  <div class="col-6">
                    <button type="button" class="btn btn-warning btn-block btn-sm save" style="display: none;">Save</button>
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