<!DOCTYPE html>
<html lang="en">
<?php
include("./config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);
    if ($myusername != 'Admin') {
        $sql = "SELECT ID FROM user WHERE Username = '$myusername' and Password = '$mypassword'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $active = $row['Active'];

        $count = mysqli_num_rows($result);

        // If result matched $myusername and $mypassword, table row must be 1 row

        if ($count == 1) {

            $_SESSION['login_user'] = $myusername;

            header("location: menu.php");
        } else {

            $error = "Your Login Name or Password is invalid";
        }
    }
    $sql = "SELECT Username FROM `admin` WHERE Username = '$myusername' and Password = '$mypassword'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {

        $_SESSION['login_user'] = $myusername;

        header("location: admin.php");
    } else {

        $error = "Your Login Name or Password is invalid";
    }
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web học trực tuyến</title>
    <link rel="icon" href="/image/icon/dragon-removebg-preview.png">
    <link rel="stylesheet" type="text/css" href="/css/dangnhap.css">
    <link rel="stylesheet" type="text/css" href="/css/navigation-bar.css">
    <link rel="stylesheet" type="text/css" href="/css/w3.css">
</head>

<body>
    <div class="w3-bar" style="background-color: antiquewhite;">
        <a class="w3-bar-item w3-button" href="./menu.php">
            <img src="../image/icon/dragon-removebg-preview.png" class="logo"></a>
        <a class="w3-bar-item w3-button hover-text w3-right" data-hover="Close" href="/html/menu.php">
            <img src="/image/icon/x-icon.png" style="width: 25px; height: 31px; opacity: 0.6;"></a>
    </div>
    <!-- Cần chỉnh cái title tooltip -->

    <div class="login-box-wrapper">
        <div>
            <h1>LOGIN</h1>
        </div>
        <div class="login-warpper">
            <form id="login" method="post" action="">
                <div class="username-input">
                    <div class="username-input-lable">
                        <label for="username">Username </label>
                        <span>
                            <span id="acc-Q">No account ? </span>
                            <a id="change-form" href="./dang-ky.php">Sign up</a>
                        </span>
                    </div>
                    <div class="input-boxes">
                        <input type="text" id="username" name="username" required>
                    </div>
                </div>
                <label for="password">Password </label>
                <div class="input-boxes">
                    <input type="password" id="password" name="password" required>
                </div>
                <input type="submit" id="confirm" value="Log in">
            </form>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector("#login").onsubmit = function() {
                const username = document.querySelector("#username").value;

            };

            function wrong(string) {
                alert("Sai " + string);
            }
        });
    </script>
</body>

</html>