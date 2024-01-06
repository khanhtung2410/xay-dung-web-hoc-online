<?php

include '../components/connect.php';

if(isset($_COOKIE['tutor_id'])){
   $tutor_id = $_COOKIE['tutor_id'];
}else{
   $tutor_id = '';
   header('location:login.php');
}

$select_contents = $conn->prepare("SELECT * FROM `content` WHERE tutor_id = ?");
$select_contents->execute([$tutor_id]);
$total_contents = $select_contents->rowCount();

$select_playlists = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ?");
$select_playlists->execute([$tutor_id]);
$total_playlists = $select_playlists->rowCount();

$select_profile = $conn->prepare("SELECT * FROM `tutors` WHERE id = ?");
$select_profile->execute([$tutor_id]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <title>Dashboard</title>
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<?php include '../components/admin_header.php'; ?>

   
<section class="dashboard">

   <h1 class="heading">Trang chính</h1>

   <div class="box-container">

      <div class="box">
         <h3>Xin chào!</h3>
         <p><?= $fetch_profile['name']; ?></p>
         <a href="profile.php" class="btn">Xem profile</a>
      </div>

      <div class="box">
         <h3><?= $total_contents; ?></h3>
         <p>Số video</p>
         <a href="add_content.php" class="btn">Thêm video mới</a>
      </div>

      <div class="box">
         <h3><?= $total_playlists; ?></h3>
         <p>Số playlists</p>
         <a href="add_playlist.php" class="btn">Thêm playlist mới</a>
      </div>

      <div class="box">
         <a href="contents.php" class="btn">Danh sách video</a>
      </div>

      <div class="box">
         <a href="comments.php" class="btn">Xem comment</a>
      </div>

      <div class="box">         
         <h3>Danh sách playlist</h3>
         <div class="flex-btn">
            <a href="playlists.php?subject=1" class="option-btn">Toán</a>
            <a href="playlists.php?subject=2" class="option-btn">Lý</a>
         </div>
      </div>
      <div class="box">
         <h3>Lựa chọn nhanh</h3>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">Đăng nhập</a>
            <a href="register.php" class="option-btn">Đăng kí</a>
         </div>
      </div>

   </div>

</section>


</body>
</html>