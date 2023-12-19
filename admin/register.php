<?php

include '../components/connect.php';

if(isset($_POST['submit'])){

   $id = unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $profession = $_POST['profession'];
   $profession = filter_var($profession, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $ext = pathinfo($image, PATHINFO_EXTENSION);
   $rename = unique_id().'.'.$ext;
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_files/'.$rename;

   $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE email = ?");
   $select_tutor->execute([$email]);
   
   if($select_tutor->rowCount() > 0){
      $message[] = 'email already taken!';
   }else{
      if($pass != $cpass){
         $message[] = 'Mật khẩu không khớp!';
      }else{
         $insert_tutor = $conn->prepare("INSERT INTO `tutors`(id, name, profession, email, password, image) VALUES(?,?,?,?,?,?)");
         $insert_tutor->execute([$id, $name, $profession, $email, $cpass, $rename]);
         move_uploaded_file($image_tmp_name, $image_folder);
         $message[] = 'Đăng kí thành công! Đăng nhập ngay';
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
   <title>register</title>

   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body style="padding-left: 0;">

<?php
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
?>


<section class="form-container">

   <form class="register" action="" method="post" enctype="multipart/form-data">
      <h3>Đăng kí</h3>
      <div class="flex">
         <div class="col">
            <p>Họ và Tên <span>*</span></p>
            <input type="text" name="name" placeholder="nhập tên" maxlength="50" required class="box">
            <!-- // them sdt o sql neu them o day-->
            <p>Email <span>*</span></p>
            <input type="email" name="email" placeholder="nhập email" maxlength="20" required class="box">
         </div>
         <div class="col">
            <p>Mật khẩu <span>*</span></p>
            <input type="password" name="pass" placeholder="nhập mật khẩu" maxlength="20" required class="box">
            <p>Xác nhận mật khẩu <span>*</span></p>
            <input type="password" name="cpass" placeholder="xác nhận mật khẩu" maxlength="20" required class="box">
            <p>Chọn ảnh đại diện <span>*</span></p>
            <input type="file" name="image" accept="image/*" required class="box">
         </div>
      </div>
      <p class="link">Đã có tài khoản? <a href="login.php">Đăng nhập ngay</a></p>
      <input type="submit" name="submit" value="Đăng kí" class="btn">
   </form>

</section>
   
</body>
</html>