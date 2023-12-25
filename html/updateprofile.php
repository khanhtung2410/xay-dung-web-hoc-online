<!DOCTYPE html>
<html>

<head>
    <title>Web học trực tuyến</title>

    <link rel="stylesheet" href="../css/navigation-bar.css">
    <link rel="icon" href="../image/icon/dragon-removebg-preview.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/profile.css">
    <link rel="stylesheet" type="text/css" type="text/css" href="../css/w3.css">
    <link rel="stylesheet" type="text/css" href="../css/navigation-bar.css">
    <link rel="stylesheet" type="text/css" href="../css/add-test.css">
</head>
<?php
session_start();
include("./config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_check = $_SESSION['login_user'];
    $ses_sql = mysqli_query($db, "select Username from user where Username = '$user_check' ");
    $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
    $login_session = $row['Username'];

    $exists = false;
    $name = $_POST['Hoten'];
    $gmail = $_POST['gmail'];
    $gender = $_POST['gender'];
    $sql = "SELECT * from user where username = '$login_session'";

    $result = mysqli_query($db, $sql);

    $num = mysqli_num_rows($result);
    $check = trim($name ?? '');
    if ("" != $check) {
        $sql = "UPDATE `user` SET `Name` = '$name' WHERE `username` = '$login_session' ";
        $result = mysqli_query($db, $sql);
    }
    $check1 = trim($gmail ?? '');
    if ("" != $check1) {
        $sql = "UPDATE `user` SET `Gmail` = '$gmail' WHERE `username` = '$login_session' ";
        $result = mysqli_query($db, $sql);
    }
    $check2 = trim($gender ?? '');
    if ("" != $check2) {
        $sql = "UPDATE `user` SET `Gender` = '$gender' WHERE `username` = '$login_session' ";
        $result = mysqli_query($db, $sql);
    }

    header("location: profile.php");
}

?>

<body>
    <div class="w3-bar" style="background-color: antiquewhite;">
        <a class="w3-bar-item w3-button" href="/Btl/xay-dung-web-hoc-online/html/menu.php"><img src="/Btl/xay-dung-web-hoc-online/image/icon/dragon-removebg-preview.png" class="logo"></a>
        <div class="w3-dropdown-click w3-hide-large w3-hide-medium ">
            <button onclick="menudropdown()" class="w3-button"><img src="/image/icon/menu-bar.png" height="31px"></button>
            <div id="sub-menu" class="w3-dropdown-content w3-bar-block dropdown-menu">
                <div class="w3-dropdown-hover w3-bar-item w3-padding-large">
                    <span>Lớp học</span>
                    <div class="w3-dropdown-content" style="left: 80px;">
                        <div class="hover-drop-toan">
                            <span class="w3-padding-large w3-bar-item">Toán</span>
                            <div class="lop">
                                <a class="w3-bar-item w3-button w3-padding-large" href="/Btl/xay-dung-web-hoc-online/html/lop-thuong-toan.html">Lớp thường</a>
                                <a class="w3-bar-item w3-button w3-padding-large" href="#luyện đề">Luyện đề</a>
                            </div>

                        </div>
                        <div class="hover-drop-ly">
                            <span class="w3-padding-large w3-bar-item">Lý</span>
                            <div class="lop">
                                <a class="w3-bar-item w3-button w3-padding-large" href="/Btl/xay-dung-web-hoc-online/html/lop-thuong-ly.html">Lớp thường</a>
                                <a class="w3-bar-item w3-button w3-padding-large" href="#luyện đề">Luyện đề</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="w3-bar-item w3-button w3-padding-large" href="/Btl/xay-dung-web-hoc-online/html/profile.php">Thông tin</a>
            </div>
        </div>
        <div class="w3-hide-small dropdown-menu-big">
            <div class="w3-dropdown-hover w3-bar-block w3-padding-large">
                <span>Lớp học</span>
                <div class="w3-dropdown-content" style="left: 100px; margin-top: 10px;">
                    <div class="hover-drop-toan">
                        <span class="w3-padding-large w3-bar-item">Toán</span>
                        <div class="lop">
                            <a class="w3-bar-item w3-button w3-padding-large" href="/Btl/xay-dung-web-hoc-online/html/lop-thuong-toan.html">Lớp thường</a>
                            <a class="w3-bar-item w3-button w3-padding-large" href="/Btl/xay-dung-web-hoc-online/html/ki1-12-toan.php">Luyện đề</a>
                        </div>
                    </div>

                    <div class="hover-drop-ly">
                        <span class="w3-padding-large w3-bar-item">Lý</span>
                        <div class="lop">
                            <a class="w3-bar-item w3-button w3-padding-large" href="/Btl/xay-dung-web-hoc-online/html/lop-thuong-ly.html">Lớp thường</a>
                            <a class="w3-bar-item w3-button w3-padding-large" href="#luyện đề">Luyện đề</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="w3-bar-item w3-button w3-padding-large" href="/Btl/xay-dung-web-hoc-online/html/about.html">Về chúng tôi</a>
        </div>
        <div class="authorize">
            <?php if (isset($_SESSION['login_user'])) : ?>
                <?php
                $user_check = $_SESSION['login_user'];
                $ses_sql = mysqli_query($db, "select Username from user where Username = '$user_check' ");
                $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
                $login_session = $row['Username'];
                echo '<a class="w3-bar-item w3-button w3-right w3-padding-large" href="/Btl/xay-dung-web-hoc-online/html/profile.php">Welcome,' . $login_session . '</a>';
                ?>
            <?php else : ?>
                <a class="w3-bar-item w3-button w3-right w3-padding-large" onclick="login()" href="/Btl/xay-dung-web-hoc-online/html/dang-nhap.php">Đăng
                    nhập</a>
                <a class="w3-bar-item w3-button w3-right w3-padding-large" href="/Btl/xay-dung-web-hoc-online/html/dang-ky.php">Đăng Ký</a>
            <?php endif; ?>
        </div>
    </div>

    <section class="user-profile">

        <h2 class="heading">Your profile</h2>

        <div class="info">

            <div class="user">
                <img src="/Btl/xay-dung-web-hoc-online/image/anh-bia/pic-1.jpg" alt="">
                <?php
                $sql = "SELECT * FROM user WHERE username='$login_session'";
                $result = mysqli_query($db, $sql);
                $row = mysqli_fetch_assoc($result);
                echo ('<h3>' . $login_session . '</h3>')
                ?>
                <p>student</p>
                <a href="./profile.php" class="inline-btn">return</a>
            </div>
            <div class="update-profile">
                <form action="/Btl/xay-dung-web-hoc-online/html/updateprofile.php" method="post">
                    <label for="Hoten">Họ tên:</label>
                    <input class="input-box" type="text" name="Hoten"><br>
                    <label for="gmail">Gmail:</label>
                    <input class="input-box" type="gmail" name="gmail"><br>
                    <label for="gender">Giới tính:</label><br>
                    <input class="input-box" type="text" name="gender" maxlength="10">
                    <input type="submit" value="Đổi">
                </form>
            </div>

        </div>

    </section>

</body>

</html>