<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web học trực tuyến</title>
  <link rel="icon" href="/image/icon/dragon-removebg-preview.png">
  <link rel="stylesheet" type="text/css" href="/css/w3.css">
  <link rel="stylesheet" type="text/css" href="/css/dethi.css">
  <link rel="stylesheet" type="text/css" href="/css/navigation-bar.css">
</head>
<?php
session_start();
include("./config.php");
$subject_id = "T";
$test_id = "T1";
$sql = "SELECT * FROM question WHERE Test_id = '$test_id'";
$result = mysqli_query($db, $sql);
$sql1 = "SELECT Answer, Choice,Question_id FROM answer_sheet WHERE Test_id = '$test_id'";
$result1 = mysqli_query($db, $sql1);
$sql2 = "SELECT * FROM test WHERE Test_id = '$test_id'";
$result2 = mysqli_query($db, $sql2);
?>

<body style="background-color: white;">
  <div class="w3-bar" style="background-color: antiquewhite;">
    <a class="w3-bar-item w3-button" href="/html/menu.php"><img src="/image/icon/dragon-removebg-preview.png" class="logo"></a>
    <div class="w3-dropdown-click w3-hide-large w3-hide-medium ">
      <button onclick="menudropdown()" class="w3-button"><img src="/image/icon/menu-bar.png" height="31px"></button>
      <div id="sub-menu" class="w3-dropdown-content w3-bar-block dropdown-menu">
        <div class="w3-dropdown-hover w3-bar-item w3-padding-large">
          <span>Lớp học</span>
          <div class="w3-dropdown-content" style="left: 80px;">
            <div class="hover-drop-toan">
              <span class="w3-padding-large w3-bar-item">Toán</span>
              <div class="lop">
                <a class="w3-bar-item w3-button w3-padding-large" href="/html/lop-thuong-toan.html">Lớp thường</a>
                <a class="w3-bar-item w3-button w3-padding-large" href="#luyện đề">Luyện đề</a>
              </div>

            </div>
            <div class="hover-drop-ly">
              <span class="w3-padding-large w3-bar-item">Lý</span>
              <div class="lop">
                <a class="w3-bar-item w3-button w3-padding-large" href="/html/lop-thuong-ly.html">Lớp thường</a>
                <a class="w3-bar-item w3-button w3-padding-large" href="#luyện đề">Luyện đề</a>
              </div>
            </div>
          </div>
        </div>
        <a class="w3-bar-item w3-button w3-padding-large" href="/html/profile.php">Thông tin</a>
      </div>
    </div>
    <div class="w3-hide-small dropdown-menu-big">
      <div class="w3-dropdown-hover w3-bar-block w3-padding-large">
        <span>Lớp học</span>
        <div class="w3-dropdown-content" style="left: 100px; margin-top: 10px;">
          <div class="hover-drop-toan">
            <span class="w3-padding-large w3-bar-item">Toán</span>
            <div class="lop">
              <a class="w3-bar-item w3-button w3-padding-large" href="/html/lop-thuong-toan.html">Lớp thường</a>
              <a class="w3-bar-item w3-button w3-padding-large" href="/html/ki1-12-toan.php">Luyện đề</a>
            </div>
          </div>

          <div class="hover-drop-ly">
            <span class="w3-padding-large w3-bar-item">Lý</span>
            <div class="lop">
              <a class="w3-bar-item w3-button w3-padding-large" href="/html/lop-thuong-ly.html">Lớp thường</a>
              <a class="w3-bar-item w3-button w3-padding-large" href="#luyện đề">Luyện đề</a>
            </div>
          </div>
        </div>
      </div>
      <a class="w3-bar-item w3-button w3-padding-large" href="/html/about.html">Về chúng tôi</a>
    </div>
    <div class="authorize">
      <?php if (isset($_SESSION['login_user'])) : ?>
        <?php
        $user_check = $_SESSION['login_user'];
        $ses_sql = mysqli_query($db, "select Username from user where Username = '$user_check' ");
        $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
        $login_session = $row['Username'];
        echo '<a class="w3-bar-item w3-button w3-right w3-padding-large" href="/html/profile.php">Welcome,' . $login_session . '</a>';
        ?>
      <?php else : ?>
        <a class="w3-bar-item w3-button w3-right w3-padding-large" onclick="login()" href="/html/dang-nhap.php">Đăng
          nhập</a>
        <a class="w3-bar-item w3-button w3-right w3-padding-large" href="/html/dang-ky.php">Đăng Ký</a>
      <?php endif; ?>
    </div>
  </div>
  <div class="clock-wr">
    <p class="time-noti">Thời gian còn:
      <span id="tet"></span>
    </p>
  </div>
  <div class="pop-box">
    <div class="content">
      <p>Bài kiểm tra này gồm 40 câu hỏi về toán.</p>
      <p>Bạn có 90 phút để hoàn thành bài kiểm tra.</p>
      <p>Mỗi câu tương đương với 0,25 điểm với số điểm tối đa là 10.</p>
      <p1>Bắt đầu làm bài ?</p1>
      <div class="choice-wr">
        <button class="yes" onclick="begin()">Vô</button>
        <a href="/html/lop-thuong.html" class="no">Thôi</a>
      </div>
    </div>
  </div>
  <div id="noidung">
    <div class="header">
      <div class="header-content">
        <?php
        $row = mysqli_fetch_assoc($result2);
        echo '<p>' . $row['Test_name'] . '</p>';
        ?>
      </div>
    </div>
    <form action="/html/score.php" method="post">
      <input type="text" value="<?php echo ($test_id) ?>" name="test_id" style="display: none;">
      <input type="text" value="<?php echo ($subject_id) ?>" name="subject_id" style="display: none;">
      <div class="que-form">
        <?php
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
              echo '<li><input type="radio" required name=' . $row['Question_id'] . ' value="' . $row1['Choice'] . '"> \(' . $row1['Answer'] . '\).</li>';
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
        }
        $db->close();
        ?>
        <input type="submit" value="Nộp bài">
    </form>
  </div>
</body>
<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
<script src="/js/moment.js"></script>
<script>
  function begin() {
    // Đặt biến
    const han = 90;
    // Bắt đầu
    var start = moment();
    // Hạn
    var limit = start.add(han, 'minutes');
    // Lấy độ trễ
    var x = setInterval(function() {
      function time() {
        var now = moment();
        //Tính thời gian còn lại
        remaining = limit - now;
        //Đổi màu nếu còn ít hơn 5p
        if (remaining < 300000)
          document.querySelector(".clock-wr").style.backgroundColor = 'rgb(252, 39, 39)'
        //Thông báo hết giờ
        if (remaining < 1000) {
          document.querySelector(".time-noti").style.display = 'Hết giờ'
          document.getElementById("tet").style.display = 'none'
        }
        return remaining
      }
      //Tính thời gian
      var hours = Math.floor((time() % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((time() % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((time() % (1000 * 60)) / 1000);

      document.getElementById("tet").innerHTML = hours + "h" + minutes + "p" + seconds + "s"
    }, 1000);
    //Chỉnh display các element
    document.getElementById("noidung").style.display = 'block'
    document.querySelector(".clock-wr").style.display = 'block'
    document.querySelector(".pop-box").style.display = 'none'
  }
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