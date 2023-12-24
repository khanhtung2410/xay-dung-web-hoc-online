<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web học trực tuyến</title>
  <link rel="stylesheet" type="text/css" href="../css/menu.css">
  <link rel="stylesheet" type="text/css" href="../css/navigation-bar.css">
  <link rel="icon" type="text/css" href="/image/icon/dragon-removebg-preview.png">
  <link rel="stylesheet" type="text/css" type="text/css" href="../css/w3.css">
</head>
<?php
session_start();
include ("./config.php")
?>

<body style="background-color: white;">
  <div class="w3-bar" style="background-color: antiquewhite;">
    <a class="w3-bar-item w3-button" href="/html/menu.php"><img src="../image/icon/dragon-removebg-preview.png" class="logo"></a>
    <div class="w3-dropdown-click w3-hide-large w3-hide-medium ">
      <button onclick="menudropdown()" class="w3-button"><img src="/image/icon/menu-bar.png" height="31px"></button>
      <div id="sub-menu" class="w3-dropdown-content w3-bar-block dropdown-menu">
        <div class="w3-dropdown-hover w3-bar-item w3-padding-large">
          <span>Lớp học</span>
          <div class="w3-dropdown-content" style="left: 80px;">
            <div class="hover-drop-toan">
              <span class="w3-padding-large w3-bar-item">Toán</span>
              <div class="lop">
                <a class="w3-bar-item w3-button w3-padding-large" href="/html/lopthuong.php?subject=1">Lớp thường</a>
                <a class="w3-bar-item w3-button w3-padding-large" href="#luyện đề">Luyện đề</a>
              </div>

            </div>
            <div class="hover-drop-ly">
              <span class="w3-padding-large w3-bar-item">Lý</span>
              <div class="lop">
                <a class="w3-bar-item w3-button w3-padding-large" href="/html/lopthuong.php?subject=2">Lớp thường</a>
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
              <a class="w3-bar-item w3-button w3-padding-large" href="/html/lopthuong.php?subject=1">Lớp thường</a>
              <a class="w3-bar-item w3-button w3-padding-large" href="/html/ki1-12-toan.php">Luyện đề</a>
            </div>
          </div>

          <div class="hover-drop-ly">
            <span class="w3-padding-large w3-bar-item">Lý</span>
            <div class="lop">
              <a class="w3-bar-item w3-button w3-padding-large" href="/html/lopthuong.php?subject=2">Lớp thường</a>
              <a class="w3-bar-item w3-button w3-padding-large" href="#luyện đề">Luyện đề</a>
            </div>
          </div>
        </div>
      </div>
      <a class="w3-bar-item w3-button w3-padding-large" href="/html/about.html">Về chúng tôi</a>
    </div>
    <div class="authorize">
      <?php if (isset($_SESSION['login_user'])) :?>
       <?php
        $user_check = $_SESSION['login_user'];
        $ses_sql = mysqli_query($db, "select Username from user where Username = '$user_check' ");
        $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
        $login_session = $row['Username']; 
        echo '<a class="w3-bar-item w3-button w3-right w3-padding-large" href="/html/profile.php">Welcome,'.$login_session.'</a>';
        ?>
      <?php else : ?>
        <a class="w3-bar-item w3-button w3-right w3-padding-large" onclick="login()" href="/html/dang-nhap.php">Đăng
          nhập</a>
        <a class="w3-bar-item w3-button w3-right w3-padding-large" href="/html/dang-ky.php">Đăng Ký</a>
      <?php endif; ?>
    </div>
  </div>
  <div class="content">
    <div class="slideshow-container">

      <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="../image/slide/buisness man.png" style="width:50%">
      </div>

      <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="../image/slide/blue mage.png" style="width:50%">
      </div>

      <div class="mySlides fade">
        <div class="numbertext">3 / 3</div>
        <img src="../image/slide/confuse.jpg" style="width:50%">
      </div>

      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <div class="card">
      <div class="card-content">
        <h3>Sơ bộ web</h3>
        <p>Website này được thiết kế để giúp các bạn đang học lớp 11, 12 có thể nắm vững kiến thức cơ bản trong nhứng năm cuối khóa trước kì thi đại học</p>
        <p>Trang web này hiện đang chứa nội dung học cơ bản của môn toán và lý của cả 2 lớp 11 và 12</p>
        <p>Các lớp học của web được chia ra làm 2 phần là lớp thường và luyện đề</p>
        <ul>
          <li>Lớp thường là những lớp có video dạy học để các bạn có thể ôn lại kiến thức</li>
          <li>Lớp luyện đề là tập hợp các đề thi đại học cho những bạn muốn luyện đề có thể thử sức</li>
        </ul>
      </div>
    </div>
  </div>
</body>
<script src="../js/so-luoc.js"></script>
<script src="../js/dropdown.js"></script>

</html>