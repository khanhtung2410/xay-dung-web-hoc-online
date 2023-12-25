<?php

include '../components/connect.php';

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
}

if (isset($_GET['get_id'])) {
   $get_id = $_GET['get_id'];
} else {
   $get_id = '';
   header('location:menu.php');
}

session_start();
include ("./config.php")

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>playlist</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="../css/navigation-bar.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="../css/playlist.css">

</head>

<body>
<div class="w3-bar" style="background-color: antiquewhite;">
      <a class="w3-bar-item w3-button" href="/html/menu.php"><img src="/image/icon/dragon-removebg-preview.png" class="logo"></a>
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

   <section class="playlist">

      <h1 class="heading">Playlist</h1>

      <div class="row">

         <?php
         $select_playlist = $conn->prepare("SELECT * FROM `playlist` WHERE id = ? LIMIT 1");
         $select_playlist->execute([$get_id]);
         if ($select_playlist->rowCount() > 0) {
            $fetch_playlist = $select_playlist->fetch(PDO::FETCH_ASSOC);

            $playlist_id = $fetch_playlist['id'];

            $count_videos = $conn->prepare("SELECT * FROM `content` WHERE playlist_id = ?");
            $count_videos->execute([$playlist_id]);
            $total_videos = $count_videos->rowCount();

            $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE id = ? LIMIT 1");
            $select_tutor->execute([$fetch_playlist['tutor_id']]);
            $fetch_tutor = $select_tutor->fetch(PDO::FETCH_ASSOC);

         ?>

            <div class="col">
               
               <div class="thumb">
                  <span><?= $total_videos; ?> videos</span>
                  <img src="../uploaded_files/<?= $fetch_playlist['thumb']; ?>" alt="">
               </div>
            </div>

            <div class="col">
               <div class="tutor">
                  <img src="../uploaded_files/<?= $fetch_tutor['image']; ?>" alt="">
                  <div>
                     <h3><?= $fetch_tutor['name']; ?></h3>
                  </div>
               </div>
               <div class="details">
                  <h3><?= $fetch_playlist['title']; ?></h3>
                  <div class="date"><i class="fas fa-calendar"></i><span><?= $fetch_playlist['date']; ?></span></div>
               </div>
            </div>

         <?php
         } else {
            echo '<p class="empty">Không tìm thấy playlist!</p>';
         }
         ?>

      </div>

   </section>


   <section class="videos-container">

      <h1 class="heading">playlist videos</h1>

      <div class="box-container">

         <?php
         $select_content = $conn->prepare("SELECT * FROM `content` WHERE playlist_id = ?  ORDER BY date DESC");
         $select_content->execute([$get_id]);
         if ($select_content->rowCount() > 0) {
            while ($fetch_content = $select_content->fetch(PDO::FETCH_ASSOC)) {
         ?>
               <a href="watch_video.php?get_id=<?= $fetch_content['id']; ?>" class="box">
                  <i class="fas fa-play"></i>
                  <img src="../uploaded_files/<?= $fetch_content['thumb']; ?>" alt="">
                  <h3><?= $fetch_content['title']; ?></h3>
               </a>
         <?php
            }
         } else {
            echo '<p class="empty">Chưa có video!</p>';
         }
         ?>

      </div>

   </section>

</body>

</html>