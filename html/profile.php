<!DOCTYPE html>
<html>

<head>
  <title>Web học trực tuyến</title>

  <link rel="stylesheet" href="/css/navigation-bar.css">
  <link rel="icon" href="/image/icon/dragon-removebg-preview.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="/css/profile.css">
  <link rel="stylesheet" type="text/css" type="text/css" href="/css/w3.css">
  <link rel="stylesheet" type="text/css" href="/css/navigation-bar.css">
  <link rel="stylesheet" type="text/css" href="/css/table.css">
</head>
<?php
session_start();
include("./config.php")
?>

<body>
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

  <section class="user-profile">

    <h1 class="heading">Your profile</h1>

    <div class="info">

      <div class="user">
        <img src="/image/anh-bia/pic-1.jpg" alt="">
        <?php
        $sql = "SELECT * FROM user WHERE username='$login_session'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($result);
        echo ('<h3>' . $login_session . '</h3>')
        ?>
        <p>student</p>
        <a href="./updateprofile.php" class="inline-btn">update profile</a>
      </div>
      <div class="profile">
        <?php
        echo ('<p class:"info">Họ và tên: ' . $row['Name'] . '</p>');
        echo ('<p class:"info">CCCD: ' . $row['CCCD'] . '</p>');
        echo ('<p class:"info">Ngày sinh: ' . $row['Date_of_birth'] . '</p>');
        echo ('<p class:"info">Gmail: ' . $row['Gmail'] . '</p>');
        echo ('<p class:"info">Giới tính: ' . $row['Gender'] . '</p>');
        ?>
      </div>
      <h3>Bảng điểm:</h3>
    </div>
   
    <div class="container">
      <table>
        <thead>
          <tr class="table_header">
            <th class="hd"><a href="#" class="filter__link filter__link--number" id="question_id_list">Mã bài kiểm tra</a></th>
            <th class="hd"><a href="#" class="filter__link filter__link--number" id="">Tên bài kiểm tra</a></th>
            <th class="hd"><a href="#" class="filter__link filter__link--number">Điểm</a></th>
          </tr>
        </thead>
        <tbody>
          <?php

          $sql1 = "SELECT * FROM test_result WHERE `Username`='$login_session'";
          $result = mysqli_query($db, $sql1);
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?php echo $row['Test_id']; ?></td>
              <td><?php echo $row['Test_name']; ?></td>
              <td><?php echo $row['Score']; ?></td>
            </tr>
          <?php
          }

          $db->close();
          ?>
        </tbody>
      </table>
    </div>
  </section>

</body>

</html>