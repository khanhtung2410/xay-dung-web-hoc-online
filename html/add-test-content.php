<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="../css/add-test.css">
  <link rel="stylesheet" type="text/css" href="../css/table.css">
</head>
<?php
include("./config.php");
if (isset($_GET["search_test"])) {
  $test_id = $_GET["search_test"];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $exists = false;
  $question_diff = $_POST['question_diff'];
  $test_id = $_POST['test_id'];
  $question = $_POST['question'];

  $sql = "INSERT INTO `question` (`Question_id`,`Test_id`,`Question`,`Difficulty`) VALUES ('$question_id','$test_id','$question','$question_diff')";
  $result = mysqli_query($db, $sql);
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

  @media only screen and (min-width: 576px) {

    .listing {
      max-width: 600px;
    }

    .nextpage {
      left: 75%;
    }
  }

  @media only screen and (min-width: 768px) {

    .listing {
      max-width: 920px;
    }
  }
</style>

<body>
  <button class="nextpage"><a href="/html/admin.php">HOME</a></button>
  <div class="them-cauhoi">
    <h1>Nhập câu hỏi</h1>
    <form method="post" class="questions" action="add-test-content.php">
      <label for="test_id">Mã bài kiểm tra : </label><br>
      <input type="text" class="input-box" id="test_id" name="test_id" required maxlength="2"><br>
      <label for="question_id">Độ khó : </label><br>
      <input type="text" class="input-box" id="question_diff" name="question_diff" required maxlength="5" minlength="2" placeholder="VD: Ez or Med or Hard"><br>
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
            <th class="hd"><a href="#" class="filter__link filter__link--number" id="">Độ khó</a></th>
            <th class="hd"><a href="#" class="filter__link filter__link--number">Có câu trả lời ?</a></th>
            <th class="hd"><a href="#" class="filter__link filter__link--number">Thao tác</a></th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_GET['begin_search'])) {
            $search_subject = $_GET['search_subject'];
            $search_test_id = $_GET['search_test'];
            $sql1 = "SELECT Question_id, Question, Have_answer, Difficulty FROM question_status WHERE `Subject_id`='$search_subject' AND `Test_id` = '$search_test_id'";
            $result = mysqli_query($db, $sql1);
            while ($row = mysqli_fetch_assoc($result)) {
          ?>
              <tr>
                <td><?php echo $row['Question_id']; ?></td>
                <td><?php echo $row['Question']; ?></td>
                <td><?php echo $row['Difficulty']; ?></td>
                <td><?php echo $row['Have_answer']; ?></td>
                <td class="action"><a class="fix" href="update_question.php?qeid=<?php echo $row['Question_id']; ?>&teid=<?php echo ($test_id); ?>" class="btn">Sửa</a>
                  <a class="delete" onclick="return confirm('Bạn có muốn xóa không?');" href="delete_test.php?qeid=<?php echo $row['Question_id']; ?>&teid=<?php echo ($test_id); ?>&status=que" class="btn">Xóa</a>
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
  var question_diff = document.getElementById("question_diff");
  document.getElementById("confirm").onmouseover = function() {
    //check value hop le hay khong
    if (question_diff.value == "T" || question_diff.value == "L") {
      return
    } else
      question_diff.value = "";
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