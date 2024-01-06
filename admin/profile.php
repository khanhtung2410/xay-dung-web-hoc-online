<?php

   include '../components/connect.php';

   if(isset($_COOKIE['tutor_id'])){
      $tutor_id = $_COOKIE['tutor_id'];
   }else{
      $tutor_id = '';
      header('location:login.php');
   }

   $select_playlists = $conn->prepare("SELECT * FROM `playlist` WHERE tutor_id = ?");
   $select_playlists->execute([$tutor_id]);
   $total_playlists = $select_playlists->rowCount();

   $select_contents = $conn->prepare("SELECT * FROM `content` WHERE tutor_id = ?");
   $select_contents->execute([$tutor_id]);
   $total_contents = $select_contents->rowCount();


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
   <title>Profile</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>
<?php include '../components/admin_header.php'; ?>
<section class="tutor-profile" style="min-height: calc(100vh - 19rem);"> 

   <h1 class="heading">Chi tiết profile</h1>

   <div class="details">
      <div class="tutor">
         <img src="../uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
         <h3><?= $fetch_profile['name']; ?></h3>
         <a href="update.php" class="inline-btn">Cập nhật profile</a>
      </div>
      <div class="flex">
         <div class="box">
            <span><?= $total_playlists; ?></span>
            <p>Số playlists</p>
            <a href="playlists.php" class="btn">Xem playlists</a>
         </div>
         <div class="box">
            <span><?= $total_contents; ?></span>
            <p>Số videos</p>
            <a href="contents.php" class="btn">Xem video</a>
         </div>
         
      </div>
   </div>

</section>

</body>
</html>