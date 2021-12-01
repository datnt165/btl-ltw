<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông tin đơn hàng</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css" />
  <link rel="stylesheet" href="../style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#back').on('click', function() {
        window.history.back();
      })
    });
  </script>
</head>

<body>
  <div class="container-fluid back-ground">
    <div class="head">
      <h1>Thông tin đơn hàng</h1>
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
            <th>ID sách</th>
            <th>Tài khoản</th>
            <th>Tên sách</th>
            <th>Số lượng</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include $_SERVER['DOCUMENT_ROOT'] . '/BTL/php/conn.php';
          $sql = "SELECT c.id, c.id_book, c.email, b.name, c.many FROM cart c, books b WHERE c.id_book = b.id ";
          $result = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $id_book = $row['id_book'];
            $email = $row['email'];
            $book_name = $row['name'];
            $many = $row['many'];
          ?>
            <tr>
              <td><?php echo $id ?></td>
              <td><?php echo $id_book ?></td>
              <td><?php echo $email ?></td>
              <td><?php echo $book_name ?></td>
              <td><?php echo $many ?></td>
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