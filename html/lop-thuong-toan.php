<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Web học trực tuyến</title>
   <link rel="stylesheet" href="../css/navigation-bar.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="/css/lop-thuong.css">
   <link rel="icon" href="/image/icon/dragon-removebg-preview.png">

</head>

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
                <a class="w3-bar-item w3-button w3-padding-large" href="/html/lop-thuong-toan.php">Lớp thường</a>
                <a class="w3-bar-item w3-button w3-padding-large" href="#luyện đề">Luyện đề</a>
              </div>

            </div>
            <div class="hover-drop-ly">
              <span class="w3-padding-large w3-bar-item">Lý</span>
              <div class="lop">
                <a class="w3-bar-item w3-button w3-padding-large" href="/html/lop-thuong-ly.php">Lớp thường</a>
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
              <a class="w3-bar-item w3-button w3-padding-large" href="/html/lop-thuong-toan.php">Lớp thường</a>
              <a class="w3-bar-item w3-button w3-padding-large" href="/html/ki1-12-toan.php">Luyện đề</a>
            </div>
          </div>

          <div class="hover-drop-ly">
            <span class="w3-padding-large w3-bar-item">Lý</span>
            <div class="lop">
              <a class="w3-bar-item w3-button w3-padding-large" href="/html/lop-thuong-ly.php">Lớp thường</a>
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

   <section class="lopthuong">

      <h1 class="heading">Các khóa học</h1>

      <div class="box-container">

         <div class="box">
            <div class="tutor">
               <img src="/image/anh-bia/pic-1.jpg" alt="">
               <div class="info">
                  <h3>Vũ Văn Ngọc</h3>
                  <span>21-10-2023</span>
               </div>
            </div>
            <div class="thumb">
               <img src="/image/anh-playlist/toan-chuong-1.png" alt="">
               <span>17 videos</span>
            </div>
            <h3 class="title">Ứng dụng đạo hàm để khảo sát và vẽ đồ thị của hàm số</h3>
            <a href="playlist.html" class="inline-btn">Xem tất cả</a>
         </div>

         <div class="box">
            <div class="tutor">
               <img src="/image/anh-bia/pic-3.jpg" alt="">
               <div class="info">
                  <h3>Trần Xuân Trường</h3>
                  <span>21-10-2023</span>
               </div>
            </div>
            <div class="thumb">
               <img src="/image/anh-playlist/toan-chuong-2.png" alt="">
               <span>10 videos</span>
            </div>
            <h3 class="title">Hàm số lũy thừa - Hàm số mũ và Hàm số logarit</h3>
            <a href="playlist.html" class="inline-btn">Xem tất cả</a>
         </div>

         <div class="box">
            <div class="tutor">
               <img src="/image/anh-bia/pic-4.jpg" alt="">
               <div class="info">
                  <h3>Trần Thế Mạnh</h3>
                  <span>21-10-2023</span>
               </div>
            </div>
            <div class="thumb">
               <img src="/image/anh-playlist/toan-chuong-3.png" alt="">
               <span>10 videos</span>
            </div>
            <h3 class="title">Nguyên hàm - Tích phân và Ứng dụng</h3>
            <a href="playlist.html" class="inline-btn">Xem tất cả</a>
         </div>

         <div class="box">
            <div class="tutor">
               <img src="/image/anh-bia/pic-6.jpg" alt="">
               <div class="info">
                  <h3>Nguyễn Quý Huy</h3>
                  <span>21-10-2023</span>
               </div>
            </div>
            <div class="thumb">
               <img src="/image/anh-playlist/toan-chuong-4.png" alt="">
               <span>10 videos</span>
            </div>
            <h3 class="title">Số phức</h3>
            <a href="playlist.html" class="inline-btn">Xem tất cả</a>
         </div>

         <div class="box">
            <div class="tutor">
               <img src="/image/anh-bia/pic-8.jpg" alt="">
               <div class="info">
                  <h3>Vũ Văn Ngọc</h3>
                  <span>21-10-2023</span>
               </div>
            </div>
            <div class="thumb">
               <img src="/image/anh-playlist/toan-chuong-5.png" alt="">
               <span>10 videos</span>
            </div>
            <h3 class="title">Khối đa diện</h3>
            <a href="playlist.html" class="inline-btn">Xem tất cả</a>
         </div>

         <div class="box">
            <div class="tutor">
               <img src="/image/anh-bia/pic-2.jpg" alt="">
               <div class="info">
                  <h3>Nguyễn Phương Anh</h3>
                  <span>21-10-2023</span>
               </div>
            </div>
            <div class="thumb">
               <img src="/image/anh-playlist/toan-chuong-6.png" alt="">
               <span>10 videos</span>
            </div>
            <h3 class="title">Mặt nón, Mặt trụ, Mặt cầu</h3>
            <a href="playlist.html" class="inline-btn">Xem tất cả</a>
         </div>

         <div class="box">
            <div class="tutor">
               <img src="/image/anh-bia/pic-9.jpg" alt="">
               <div class="info">
                  <h3>Nguyễn Phan Tiến</h3>
                  <span>21-10-2023</span>
               </div>
            </div>
            <div class="thumb">
               <img src="/image/anh-playlist/toan-chuong-7.png" alt="">
               <span>10 videos</span>
            </div>
            <h3 class="title">Phương pháp tọa độ trong không gian</h3>
            <a href="playlist.html" class="inline-btn">Xem tất cả</a>
         </div>

      </div>

   </section>

</body>

</html>