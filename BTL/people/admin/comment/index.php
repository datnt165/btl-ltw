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
    });
  </script>
</head>

<body>
  <div class="container-fluid back-ground">
    <div class="head">
      <h1>Danh sách khách hàng bình luận</h1>
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
            <th>Tài khoản email</th>
            <th>ID sách</th>
            <th>Bình luận</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include $_SERVER['DOCUMENT_ROOT'] . 'BTL/php/conn.php';
          $sql = "SELECT * FROM comment";
          $result = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $email = $row['email'];
            $id_book = $row['id_book'];
            $comment = $row['comment'];
          ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $email ?></td>
              <td><?php echo $id_book ?></td>
              <td><?php echo $comment ?></td>
              <td>
                <div class="row justify-content-center">
                  <!-- <div class="col-6">
                    <button type="button" class="btn btn-danger btn-block btn-sm edit" id="<?php echo $id; ?>">Edit</button>
                  </div> -->
                  <div class="col-6">
                    <button type="button" class="btn btn-danger btn-block btn-sm delete" id="<?php echo $id; ?>">Delete</button>
                  </div>
                  <!-- <div class="col-6">
                    <button type="button" class="btn btn-warning btn-block btn-sm save" style="display: none;">Save</button>
                    <button type="button" class="btn btn-warning btn-block btn-sm add" style="display: none; margin-top:0px;">Add</button>
                  </div>
                  <div class="col-6">
                    <button type="button" class="btn btn-warning btn-block btn-sm cancel" style="display: none;">Cancel</button>
                  </div> -->
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