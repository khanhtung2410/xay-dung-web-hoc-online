<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="../css/table.css">
  <link rel="stylesheet" type="text/css" href="../css/add-test.css">
</head>
<?php
include("./config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $exists = false;
  $subject_id = $_POST['subject_id'];
  $test_id = $_POST['test_id'];
  $test_name = $_POST['test_name'];

  $sql = "SELECT * from test where test_id = '$test_id'";

  $result = mysqli_query($db, $sql);

  $num = mysqli_num_rows($result);

  if ($num == 0) {
    if ($exists == false) {
      $sql = "INSERT INTO `test` (`Subject_id`,`Test_id`,`Test_name`) VALUES ('$subject_id','$test_id','$test_name')";
      $result = mysqli_query($db, $sql);
      echo ("Đã nhập thành công");
    }
  };

  if ($num > 0) {
    $exists = "ID ĐÃ TỒN TẠI";
  }
}
?>
<style>
  a {
    text-decoration: none;
    position: relative;
    color: rgb(85, 83, 83);
    font-size: 14px;
    display: table;
    padding: 10px;
  }

  .action {
    display: flex;
    text-decoration: none;
  }

  .fix {
    color: #fdbc24;
  }

  .delete {
    color: red;
  }
</style>

<body>
  <button class="nextpage"><a href="/Btl/xay-dung-web-hoc-online/html/admin.php">HOME</a></button>
  <div class="them-test">
    <h1>Thêm bài kiểm tra</h1>
    <form method="POST" id="overall" action="add-test.php">
      <label for="subject_id">Mã môn học : </label><br>
      <input type="text" class="input-box" id="subject_id" name="subject_id" required maxlength="1" placeholder="Toán = T , Lý = L"><br>
      <label for="test_id">Mã bài kiểm tra: </label><br>
      <input type="text" class="input-box" id="test_id" name="test_id" required maxlength="2"><br>
      <label for="test_name">Tên bài kiểm tra: </label><br>
      <input type="text" class="input-box" name="test_name" id="test_name" required><br>
      <input type="submit" class="button" id="confirm" value="Nhập">
    </form>
    <button class="nextpage"><a href="/Btl/xay-dung-web-hoc-online/html/add-test-content.php">Thêm câu hỏi</a></button>
  </div>
  <div class="listing">
    <h1>Danh sách bài kiểm tra</h1>
    <div class="search-bar-container">
      <form method="GET" id="" action="add-test.php">
        <label for="search">Bài kiểm tra môn</label>
        <select name="search_subject" id="">
          <option value="T">Toán</option>
          <option value="L">Lý</option>
          <option value="All">All</option>
        </select>
        <input type="submit" name="begin_search" value="Tìm ">
      </form>
    </div>
    <div class="container">
      <table>
        <thead>
          <tr class="table_header">
            <th class="hd"><a href="#" class="filter__link filter__link--number" id="Subject_id_list">ID môn</a></th>
            <th class="hd"><a href="#" class="filter__link filter__link--number" id="Test_id_list">ID bài kiểm tra</a></th>
            <th class="hd"><a href="#" class="filter__link filter__link--number">Tên bài kiểm tra</a></th>
            <th class="hd"><a href="#" class="filter__link filter__link--number">Thao tác</a></th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_GET['begin_search'])) {
            $search_subject = $_GET['search_subject'];
            if ($search_subject == "All")
              $sql = "SELECT * FROM test ";
            else
              $sql = "SELECT * FROM test where Subject_id = '$search_subject'";
          } else
            $sql = "SELECT * FROM test ";
          $result = mysqli_query($db, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?php echo $row['Subject_id']; ?></td>
              <td><?php echo $row['Test_id']; ?></td>
              <td><?php echo $row['Test_name']; ?></td>
              <td class="action "><a class="fix btn" href="update_test.php?teid=<?php echo $row['Test_id']; ?>&subid=<?php echo $row['Subject_id'] ?>">Sửa</a>
                <a class="delete btn" onclick="return confirm('Bạn có muốn xóa không?');" href="delete_test.php?teid=<?php echo $row['Test_id']; ?>&status=test">Xóa</a>
              </td>
            </tr>
          <?php
          }

          $db->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
  var sub_id = document.getElementById("subject_id");
  document.getElementById("confirm").onmouseover = function() {
    //check value hop le hay khong
    if (sub_id.value == "T" || sub_id.value == "L") {
      return
    } else
      sub_id.value = "";
  }
  var properties = [
    'Test_id_list',
  ];

  $.each(properties, function(i, val) {

    var orderClass = '';

    $("#" + val).click(function(e) {
      e.preventDefault();
      $('.filter__link.filter__link--active').not(this).removeClass('filter__link--active');
      $(this).toggleClass('filter__link--active');
      $('.filter__link').removeClass('asc desc');

      if (orderClass == 'desc' || orderClass == '') {
        $(this).addClass('asc');
        orderClass = 'asc';
      } else {
        $(this).addClass('desc');
        orderClass = 'desc';
      }

      var parent = $(this).closest('.hd');
      var index = $(".hd").index(parent);
      var $table = $('tbody');
      var rows = $table.find('tr').get();
      var isSelected = $(this).hasClass('filter__link--active');
      var isNumber = $(this).hasClass('filter__link--number');

      rows.sort(function(a, b) {

        var x = $(a).find('td').eq(index).text();
        var y = $(b).find('td').eq(index).text();

        if (isNumber == true) {

          if (isSelected) {
            return x - y;
          } else {
            return y - x;
          }

        } else {

          if (isSelected) {
            if (x < y) return -1;
            if (x > y) return 1;
            return 0;
          } else {
            if (x > y) return -1;
            if (x < y) return 1;
            return 0;
          }
        }
      });

      $.each(rows, function(index, row) {
        $table.append(row);
      });

      return false;
    });

  });
</script>

</html>