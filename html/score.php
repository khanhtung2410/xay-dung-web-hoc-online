<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="../css/navigation-bar.css">
  <link rel="stylesheet" type="text/css" href="../css/dethi.css">
  <link rel="stylesheet" type="text/css" type="text/css" href="../css/w3.css">

</head>
<?php
session_start();
include("./config.php");
$student_answer = array();
$answer = array();
$score = 0;

$subject_id = $_POST['subject_id'];
$test_id = $_POST['test_id'];

$sql1 = "SELECT Answer, Choice,Question_id FROM answer_sheet_true WHERE Test_id = '$test_id'";
$result1 = mysqli_query($db, $sql1);
while ($row1 = mysqli_fetch_assoc($result1)) {
  array_push($answer, $row1['Choice']);
  array_push($student_answer, $_POST['' . $row1['Question_id'] . '']);
}
for ($i = 0; $i < 40; $i++) {
  if ($answer[$i] == $student_answer[$i])
    $score += 0.25;
}
$sql = "SELECT * FROM question WHERE Test_id = '$test_id'";
$result = mysqli_query($db, $sql);

$sql1 = "SELECT Answer, Choice,Question_id FROM answer_sheet WHERE Test_id = '$test_id'";
$result1 = mysqli_query($db, $sql1);

$sql2 = "SELECT * FROM test WHERE Test_id = '$test_id'";
$result2 = mysqli_query($db, $sql2);
$row = mysqli_fetch_assoc($result2);
$test_name = $row['Test_name'];

?>

<body>
  <div class="w3-bar" style="background-color: antiquewhite;">
    <a class="w3-bar-item w3-button" href="/Btl/xay-dung-web-hoc-online/html/menu.php"><img src="/Btl/xay-dung-web-hoc-online/image/icon/dragon-removebg-preview.png" class="logo"></a>
    <div class="w3-dropdown-click w3-hide-large w3-hide-medium ">
      <button onclick="menudropdown()" class="w3-button"><img src="/image/icon/menu-bar.png" height="31px"></button>
      <div id="sub-menu" class="w3-dropdown-content w3-bar-block dropdown-menu">
        <div class="w3-dropdown-hover w3-bar-item w3-padding-large">
          <span>Lớp học</span>
          <div class="w3-dropdown-content" style="left: 80px;">
            <div class="hover-drop-toan">
              <span class="w3-padding-large w3-bar-item">Toán</span>
              <div class="lop">
                <a class="w3-bar-item w3-button w3-padding-large" href="/Btl/xay-dung-web-hoc-online/html/lop-thuong-toan.php">Lớp thường</a>
                <a class="w3-bar-item w3-button w3-padding-large" href="#luyện đề">Luyện đề</a>
              </div>

            </div>
            <div class="hover-drop-ly">
              <span class="w3-padding-large w3-bar-item">Lý</span>
              <div class="lop">
                <a class="w3-bar-item w3-button w3-padding-large" href="/Btl/xay-dung-web-hoc-online/html/lop-thuong-ly.php">Lớp thường</a>
                <a class="w3-bar-item w3-button w3-padding-large" href="#luyện đề">Luyện đề</a>
              </div>
            </div>
          </div>
        </div>
        <a class="w3-bar-item w3-button w3-padding-large" href="/Btl/xay-dung-web-hoc-online/html/profile.php">Thông tin</a>
      </div>
    </div>
    <div class="w3-hide-small dropdown-menu-big">
      <div class="w3-dropdown-hover w3-bar-block w3-padding-large">
        <span>Lớp học</span>
        <div class="w3-dropdown-content" style="left: 100px; margin-top: 10px;">
          <div class="hover-drop-toan">
            <span class="w3-padding-large w3-bar-item">Toán</span>
            <div class="lop">
              <a class="w3-bar-item w3-button w3-padding-large" href="/Btl/xay-dung-web-hoc-online/html/lop-thuong-toan.php">Lớp thường</a>
              <a class="w3-bar-item w3-button w3-padding-large" href="/Btl/xay-dung-web-hoc-online/html/ki1-12-toan.php">Luyện đề</a>
            </div>
          </div>

          <div class="hover-drop-ly">
            <span class="w3-padding-large w3-bar-item">Lý</span>
            <div class="lop">
              <a class="w3-bar-item w3-button w3-padding-large" href="/Btl/xay-dung-web-hoc-online/html/lop-thuong-ly.php">Lớp thường</a>
              <a class="w3-bar-item w3-button w3-padding-large" href="#luyện đề">Luyện đề</a>
            </div>
          </div>
        </div>
      </div>
      <a class="w3-bar-item w3-button w3-padding-large" href="/Btl/xay-dung-web-hoc-online/html/about.html">Về chúng tôi</a>
    </div>
    <div class="authorize">
      <?php if (isset($_SESSION['login_user'])) : ?>
        <?php
        $user_check = $_SESSION['login_user'];
        $ses_sql = mysqli_query($db, "select Username from user where Username = '$user_check' ");
        $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
        $login_session = $row['Username'];
        echo '<a class="w3-bar-item w3-button w3-right w3-padding-large" href="/Btl/xay-dung-web-hoc-online/html/profile.php">Welcome,' . $login_session . '</a>';
        ?>
      <?php else : ?>
        <a class="w3-bar-item w3-button w3-right w3-padding-large" onclick="login()" href="/Btl/xay-dung-web-hoc-online/html/dang-nhap.php">Đăng
          nhập</a>
        <a class="w3-bar-item w3-button w3-right w3-padding-large" href="/Btl/xay-dung-web-hoc-online/html/dang-ky.php">Đăng Ký</a>
      <?php endif; ?>
    </div>
  </div>
  <div class="score-wr">
    <p class="score-noti">Bạn được <?php echo ($score); ?> điểm</p>
  </div>
  <div id="noidung-answer">
    <div class="header">
      <div class="header-content">
        <?php
        echo '<p>' . $test_name . '</p>';
        ?>
      </div>
    </div>
    <form action="" method="post">
      <input type="text" value="<?php echo ($test_id) ?>" name="test_id" style="display: none;">
      <input type="text" value="<?php echo ($subject_id) ?>" name="subject_id" style="display: none;">
      <div class="que-form">
        <?php
        $sql3 = "INSERT INTO test_result  (`Test_id`, `Username`, `Test_name`, `Score`) VALUES ('$test_id', '$login_session', '$test_name', '$score')";
        $result3 = mysqli_query($db, $sql3);

        $test_answer_position = 0;
        $forty = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $four = 0;
          $forty += 1;
        ?>
          <?php echo '<p class="debai"><span>Câu ' . $row['Question_id'] . ':</span> ' . $row['Question'] . '</p>'; ?>
          <ol class="answer">
            <?php
            while ($row1 = mysqli_fetch_assoc($result1)) {
              $four += 1;
              if ($row1['Choice'] == $answer[$test_answer_position]) {
                if ($student_answer[$test_answer_position] == $answer[$test_answer_position])
                  echo '<li class="right" ><input type="radio" checked disabled name=' . $row['Question_id'] . ' value="' . $row1['Choice'] . '"> \(' . $row1['Answer'] . '\).</li>';
                elseif ($student_answer[$test_answer_position] != $answer[$test_answer_position])
                  echo '<li class="wrong" ><input type="radio" checked disabled name=' . $row['Question_id'] . ' value="' . $row1['Choice'] . '"> \(' . $row1['Answer'] . '\).</li>';
              } else
                echo '<li><input type="radio" disabled name=' . $row['Question_id'] . ' value="' . $row1['Choice'] . '"> \(' . $row1['Answer'] . '\).</li>';
              if ($four == 4) {
                break;
              }
            ?>
            <?php
            }
            ?>
          </ol>
        <?php
          if ($forty == 40) {
            break;
          }
          $test_answer_position += 1;
        }
        $db->close();
        ?>
    </form>
  </div>
</body>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
<script>
  //Thêm envent scroll
  window.addEventListener("scroll", setScrollvar)
  //Hàm lấy giá trị scroll
  function setScrollvar() {
    const htmlelement = document.documentElement
    //Pixel kéo xuống chia cho độ cao client (chỉ tính padding xem đc)
    const percentofScrYscrolled = htmlelement.scrollTop / htmlelement.clientHeight
    //Lấy giá trị tối đa scroll xuống là 9,2%
    htmlelement.style.setProperty("--scroll", Math.min(percentofScrYscrolled * 100, 9.2))
  }
  //Xác định scroll đến đâu r
  setScrollvar()
</script>

</html>