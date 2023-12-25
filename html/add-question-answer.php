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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $exists = false;
  $question_id = $_POST['question_id'];
  $choice1 = "A";
  $choice2 = "B";
  $choice3 = "C";
  $choice4 = "D";
  $answer1 = $_POST['Answer1'];
  $answer2 = $_POST['Answer2'];
  $answer3 = $_POST['Answer3'];
  $answer4 = $_POST['Answer4'];
  $right_choice = $_POST["right_answer"];
  $sql = "select * from answer where question_id = '$question_id'";
  $sql1 = "select * from answer where question_id = '$question_id'";
  $sql2 = "select * from answer where question_id = '$question_id'";
  $sql3 = "select * from answer where question_id = '$question_id'";
  $sql4 = "select * from answer_map";
  $result = mysqli_query($db, $sql);
  $yes = "Có";
  $num = mysqli_num_rows($result);

  if ($num == 0) {
    // do if chạy trc insert 
    // nên để if sau lệnh insert thứ 2 thì nó sẽ nhận id của insert đầu
    if ($exists == false) {
      $sql = "INSERT INTO `answer` (`Question_id`,`Choice`,`Answer`) VALUES ('$question_id','$choice1','$answer1')";
      $result = mysqli_query($db, $sql);
      $sql1 = "INSERT INTO `answer` (`Question_id`,`Choice`,`Answer`) VALUES ('$question_id','$choice2','$answer2')";

      if ($right_choice == "A") {
        $right_answer_id = mysqli_insert_id($db);
      }
      $result = mysqli_query($db, $sql1);
      $sql2 = "INSERT INTO `answer` (`Question_id`,`Choice`,`Answer`) VALUES ('$question_id','$choice3','$answer3')";

      if ($right_choice == "B") {
        $right_answer_id = mysqli_insert_id($db);
      }
      $result = mysqli_query($db, $sql2);
      $sql3 = "INSERT INTO `answer` (`Question_id`,`Choice`,`Answer`) VALUES ('$question_id','$choice4','$answer4')";

      if ($right_choice == "C") {
        $right_answer_id = mysqli_insert_id($db);
      }

      if ($right_choice == "D") {
        $right_answer_id = mysqli_insert_id($db);
      }
      $result = mysqli_query($db, $sql3);

      $sql4 = "INSERT INTO `answer_map` (`Answer_id`,`Choice`,`Question_id`) VALUES ('$right_answer_id','$right_choice','$question_id')";
      $result = mysqli_query($db, $sql4);
      $sql5 = "UPDATE question SET Have_answer='$yes' WHERE Question_id =$question_id ";
      $result = mysqli_query($db, $sql5);
    }
  };

  if ($num > 0) {
    $exists = "ID CÂU HỎI ĐÃ CÓ CÂU TRẢ LỜI";
    echo ($exists);
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
  <div class="them-answer">
    <h1>Thêm câu trả lời</h1>
    <form method="post" id="questions" action="add-question-answer.php">
      <label for="question_id">Câu hỏi thứ : </label><br>
      <input type="text" class="input-box" id="question_id" name="question_id" required maxlength="2" minlength="2"><br>
      <label for="Answer1">Nhập đáp án A:</label><br>
      <input type="text" class="input-box" name="Answer1" id="Answer1" required><br>
      <label for="Answer1">Nhập đáp án B:</label><br>
      <input type="text" class="input-box" name="Answer2" id="Answer2" required><br>
      <label for="Answer1">Nhập đáp án C:</label><br>
      <input type="text" class="input-box" name="Answer3" id="Answer3" required><br>
      <label for="Answer1">Nhập đáp án D:</label><br>
      <input type="text" class="input-box" name="Answer4" id="Answer4" required><br>
      <label for="right_answer">Đáp án đúng:</label><br>
      <input type="text" class="input-box" name="right_answer" id="right_answer" maxlength="1" required placeholder="A, B, C hoặc D"><br>
      <input type="submit" id="confirm" value="Nhập">
    </form>
  </div>
  <div class="listing">
    <h1>Danh sách câu trả lời</h1>
    <div class="search-bar-container">
      <form method="GET" id="" action="add-question-answer.php">
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
            <th class="hd"><a href="#" class="filter__link filter__link--number" id="">Câu trả lời</a></th>
            <th class="hd"><a href="#" class="filter__link filter__link--number">Đáp án</a></th>
            <th class="hd"><a href="#" class="filter__link filter__link--number">Thao tác</a></th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_GET['begin_search'])) {
            $search_subject = $_GET['search_subject'];
            $search_test_id = $_GET['search_test'];
            $sql1 = "SELECT Question_id, Answer, Choice FROM answer_sheet WHERE `Subject_id`='$search_subject' AND `Test_id` = '$search_test_id'";
            $result = mysqli_query($db, $sql1);
            while ($row = mysqli_fetch_assoc($result)) {
          ?>
              <tr>
                <td><?php echo $row['Question_id']; ?></td>
                <td><?php echo $row['Answer']; ?></td>
                <td><?php echo $row['Choice']; ?></td>
                <td class="action"><a class="fix" href="update_answer.php?qeid=<?php echo $row['Question_id']; ?>&teid=<?php echo ($search_test_id) ?>" class="btn">Sửa</a>
                </td>
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