<?php

include '../components/connect.php';

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_tutor = $conn->prepare("SELECT * FROM `tutors` WHERE email = ? AND password = ? LIMIT 1");
   $select_tutor->execute([$email, $pass]);
   $row = $select_tutor->fetch(PDO::FETCH_ASSOC);
   
   if($select_tutor->rowCount() > 0){
     setcookie('tutor_id', $row['id'], time() + 60*60*24*30, '/');
     header('location:dashboard.php');
   }else{
      $message[] = 'Email hoặc mật khẩu không chính xác!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

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

   <form action="" method="post" enctype="multipart/form-data" class="login">
      <h3>Đăng nhập!</h3>
      <p>Email <span>*</span></p>
      <input type="email" name="email" placeholder="Nhập email của bạn" maxlength="20" required class="box">
      <p>Mật khẩu <span>*</span></p>
      <input type="password" name="pass" placeholder="Nhập password" maxlength="20" required class="box">
      <p class="link">Chưa có tài khoản? <a href="register.php">Đăng kí ngay</a></p>
      <input type="submit" name="submit" value="Đăng nhập" class="btn">
   </form>

</section>
   
</body>
</html>