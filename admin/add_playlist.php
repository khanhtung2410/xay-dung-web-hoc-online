<?php

include '../components/connect.php';

if(isset($_COOKIE['tutor_id'])){
   $tutor_id = $_COOKIE['tutor_id'];
}else{
   $tutor_id = '';
   header('location:login.php');
}

if(isset($_POST['submit'])){

   $id = unique_id();
   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING);
   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   $subject = $_POST['subject'];
   $subject = filter_var($subject, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = unique_id().'.'.$ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_files/'.$rename;

   $add_playlist = $conn->prepare("INSERT INTO `playlist`(id, tutor_id, title, description, thumb, status, subject) VALUES(?,?,?,?,?,?,?)");
   $add_playlist->execute([$id, $tutor_id, $title, $description, $rename, "active", $subject]);

   move_uploaded_file($image_tmp_name, $image_folder);

   $message[] = 'playlist mới đã được tạo!';  
   
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message form">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Playlist</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>
<?php include '../components/admin_header.php'; ?>
   
<section class="playlist-form">

   <h1 class="heading">Tạo playlist</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <p>Môn học <span>*</span></p>
      <select name="subject" class="box" required>
         <option value="" selected disabled>-- chọn môn --</option>
         <option value="1">Toán</option>
         <option value="2">Lý</option>
      </select>
      <p>Tiêu đề <span>*</span></p>
      <input type="text" name="title" maxlength="100" required placeholder="nhập tiêu đề playlist" class="box">
      <p>Mô tả <span>*</span></p>
      <textarea name="description" class="box" required placeholder="viết mô tả" maxlength="1000" cols="30" rows="10"></textarea>
      <p>Ảnh playlist <span>*</span></p>
      <input type="file" name="image" accept="image/*" required class="box">
      <input type="submit" value="Tạo playlist" name="submit" class="btn">
   </form>

</section>


</body>
</html>