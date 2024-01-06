<?php

include '../components/connect.php';

if(isset($_COOKIE['tutor_id'])){
   $tutor_id = $_COOKIE['tutor_id'];
}else{
   $tutor_id = '';
   header('location:login.php');
}

if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}else{
   $get_id = '';
   header('location:contents.php');
}

// if(isset($_POST['delete_video'])){

//    $delete_id = $_POST['video_id'];
//    $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

//    $delete_video_thumb = $conn->prepare("SELECT thumb FROM `content` WHERE id = ? LIMIT 1");
//    $delete_video_thumb->execute([$delete_id]);
//    $fetch_thumb = $delete_video_thumb->fetch(PDO::FETCH_ASSOC);
//    unlink('../uploaded_files/'.$fetch_thumb['thumb']);

//    $delete_video = $conn->prepare("SELECT video FROM `content` WHERE id = ? LIMIT 1");
//    $delete_video->execute([$delete_id]);
//    $fetch_video = $delete_video->fetch(PDO::FETCH_ASSOC);
//    unlink('../uploaded_files/'.$fetch_video['video']);
    
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>view content</title>

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>
<?php include '../components/admin_header.php'; ?>

<section class="view-content">

   <?php
      $select_content = $conn->prepare("SELECT * FROM `content` WHERE id = ? AND tutor_id = ?");
      $select_content->execute([$get_id, $tutor_id]);
      if($select_content->rowCount() > 0){
         while($fetch_content = $select_content->fetch(PDO::FETCH_ASSOC)){
            $video_id = $fetch_content['id'];
   ?>
   <div class="container">
      <video src="../uploaded_files/<?= $fetch_content['video']; ?>" autoplay controls poster="../uploaded_files/<?= $fetch_content['thumb']; ?>" class="video"></video>
      <div class="date"><i class="fas fa-calendar"></i><span><?= $fetch_content['date']; ?></span></div>
      <h3 class="title"><?= $fetch_content['title']; ?></h3>

      <form action="" method="post">
         <div class="flex-btn">
            <input type="hidden" name="video_id" value="<?= $video_id; ?>">
            <a href="update_content.php?get_id=<?= $video_id; ?>" class="option-btn">Cập nhật</a>
            <!-- <input type="submit" value="Xóa" class="delete-btn" onclick="return confirm('Xóa video này?');" name="delete_video"> -->
         </div>
      </form>
   </div>
   <?php
    }
   }else{
      echo '<p class="empty">Chưa có video! <a href="add_content.php" class="btn" style="margin-top: 1.5rem;">Thêm videos</a></p>';
   }    
   ?>
</section>

</body>
</html>