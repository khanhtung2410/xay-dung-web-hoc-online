<?php
session_start();
include ("./config.php")
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= $title; ?></title>
   <link rel="stylesheet" href="../css/navigation-bar.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="/css/lop-thuong.css">
   <link rel="icon" href="/image/icon/dragon-removebg-preview.png">

</head>

<body>
   <div class="w3-bar" style="background-color: antiquewhite;">
      <a class="w3-bar-item w3-button" href="/Btl/xay-dung-web-hoc-online/html/menu.php"><img src="/image/icon/dragon-removebg-preview.png" class="logo"></a>
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

   <section class=lopthuong>

      <h1 class="heading">Các khóa học</h1>

      <div class="box-container">
         <?php
         include("../components/connect.php");
         
         $select_courses = $conn->prepare("SELECT * FROM `playlist` WHERE status = ? AND subject = ? ORDER BY date DESC");
         $select_courses->execute(['active', $subject]);
         if ($select_courses->rowCount() > 0) {
            while ($fetch_course = $select_courses->fetch(PDO::FETCH_ASSOC)) {
               $course_id = $fetch_course['id'];

               $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
               $select_tutor->execute([$fetch_course['tutor_id']]);
               $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);
         ?>
               <div class="box">
                  <div class="tutor">
                     <img src="../uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
                     <div>
                        <h3><?= $fetch_tutor['name']; ?></h3>
                        <span><?= $fetch_course['date']; ?></span>
                     </div>
                  </div>
                  <div class="thumb">
                     <img src="../uploaded_files/<?= $fetch_course['thumb']; ?>" alt="">
                  </div>
                  <h3 class="title"><?= $fetch_course['title']; ?></h3>
                  <a href="playlist.php?get_id=<?= $course_id; ?>" class="inline-btn">view playlist</a>
               </div>
         <?php
            }
         } else {
            echo '<p class="empty">no courses added yet!</p>';
         }
         ?>

      </div>
   </section>

</body>

</html>