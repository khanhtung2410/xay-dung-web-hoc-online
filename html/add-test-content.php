<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="/css/add-test.css">
  <link rel="stylesheet" type="text/css" href="/css/table.css">
</head>
<?php
include("./config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $exists = false;  
  $question_id = $_POST['question_id'];
  $test_id = $_POST['test_id'];
  $question = $_POST['question'];
  $sql = "select * from question where question_id = '$question_id'";

  $result = mysqli_query($db, $sql);

  $num = mysqli_num_rows($result);

  if ($num == 0) {
    if ($exists == false) {
      $sql = "INSERT INTO `question` (`Question_id`,`Test_id`,`Question`) VALUES ('$question_id','$test_id','$question')";
      $result = mysqli_query($db, $sql);
    }
  };

  if ($num > 0) {
    $exists = "ID CÂU HỎI ĐÃ TỒN TẠI";
  }
}

?>

<body>
  <div class="them-cauhoi">
    <h1>Nhập câu hỏi</h1>
    <form method="post" class="questions" action="add-test-content.php">
      <label for="test_id">Mã bài kiểm tra : </label><br>
      <input type="text" class="input-box" id="test_id" name="test_id" required maxlength="2"><br>
      <label for="question_id">Câu hỏi thứ : </label><br>
      <input type="text" class="input-box" id="question_id" name="question_id" required maxlength="2"><br>
      <label for="test_name">Câu hỏi : </label><br>
      <input type="text" class="input-box" name="question" id="question" required><br>
      <input type="submit" id="confirm" value="Nhập">
    </form>
    <button class="nextpage"><a href="/html/add-question-answer.php">Thêm câu trả lời</a></button>
  </div>
  <div class="listing">
    <h1>Danh sách câu hỏi</h1>
    <div class="search-bar-container">
      <form method="GET" id="" action="add-test-content.php">
        <label for="search_subject">ID môn</label>
        <select name="search_subject" id="">
          <option value="T">Toán</option>
          <option value="L">Lý</option>
        </select><br>
        <label for="search_test">Mã bài kiểm tra : </label>
        <input type="text" name="search_test" required maxlength="2">
        <input type="submit" name="begin_search" value="Tìm ">
      </form>
    </div>
    <div class="container">
      <table>
        <thead>
          <tr class="table_header">
            <th class="hd"><a href="#" class="filter__link filter__link--number" id="question_id_list">Câu hỏi thứ</a></th>
            <th class="hd"><a href="#" class="filter__link filter__link--number" id="">Câu hỏi</a></th>
            <th class="hd"><a href="#" class="filter__link filter__link--number">Có câu trả lời ?</a></th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_GET['begin_search'])) {
            $search_subject = $_GET['search_subject'];
            $search_test_id = $_GET['search_test'];
            $sql1 = "SELECT Question_id, Question, Have_answer FROM question_status WHERE `Subject_id`='$search_subject' AND `Test_id` = '$search_test_id'";
            $result = mysqli_query($db, $sql1);
            while ($row = mysqli_fetch_assoc($result)) {
          ?>
              <tr>
                <td><?php echo $row['Question_id']; ?></td>
                <td><?php echo $row['Question']; ?></td>
                <td><?php echo $row['Have_answer']; ?></td>
              </tr>
          <?php
            }
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
    'question_id_list',
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