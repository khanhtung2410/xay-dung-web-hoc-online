<?php
   include('./config.php');
   session_start();
 
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($db,"select Username from user where Username = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['Username'];

?>