<!DOCTYPE html>
<html lang="en">
<?php
include("./config.php");

$exists = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Include file which makes the 
    // Database Connection.

    $username = $_POST["username"];
    $ho_ten = $_POST["yourname"];
    $CCCD = $_POST["CCCD"];
    $gender = $_POST["gender"];
    $gmail = $_POST["gmail"];
    $birth_day = $_POST["Date-of-birth"];
    $birth_month = $_POST["Month-of-birth"];
    $birth_year = $_POST["Year-of-birth"];
    $date_of_birth = $birth_year . "-" . str_pad($birth_month, 2, "0", STR_PAD_LEFT) . "-" . str_pad($birth_day, 2, "0", STR_PAD_LEFT);
    $password = $_POST["password"];
    $password_retype = $_POST["password-retype"];


    $sql = "Select * from user where username='$username'";

    $result = mysqli_query($db, $sql);

    $num = mysqli_num_rows($result);

    // This sql query is use to check if 
    // the username is already present  
    // or not in our Database 
    if ($num == 0) {
        if (($password == $password_retype) && $exists == false) {

            $sql = "INSERT INTO `user` ( `Username`,`Họ và tên`,`CCCD`,`Ngày sinh`,`Gmail`,`Password`,`Giới tính`, `Ngày đăng ký`) VALUES ('$username','$ho_ten' , '$CCCD','$date_of_birth','$gmail','$password','$gender', current_timestamp())";
            $result = mysqli_query($db, $sql);

            if ($result) {
                $showAlert = true;
            }
        } else {
            $showError = "Passwords do not match";
        }
    } // end if  

    if ($num > 0) {
        $exists = "Username not available";
    }
} //end if    

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web học trực tuyến</title>
    <link rel="icon" href="/image/icon/dragon-removebg-preview.png">
    <link rel="stylesheet" type="text/css" href="/css/dangky.css">
    <link rel="stylesheet" type="text/css" href="/css/navigation-bar.css">
    <link rel="stylesheet" type="text/css" href="/css/w3.css">
</head>

<body>
    <div class="w3-bar" style="background-color: antiquewhite;">
        <a class="w3-bar-item w3-button" href="/html/menu.html">
            <img src="../image/icon/dragon-removebg-preview.png" class="logo"></a>
        <a class="w3-bar-item w3-button hover-text w3-right" data-hover="Close" href="/html/menu.html">
            <img src="/image/icon/x-icon.png" style="width: 25px; height: 31px; opacity: 0.6;"></a>
    </div>
    <div class="sign-up-box-wrapper">
        <div>
            <h1>SIGN UP</h1>
        </div>
        <div class="sign-up-wrapper">
            <form id="signup" method="post" action="dang-ky.php">
                <label for="yourname">Họ tên<span class="need">*</span></label>
                <div class="input-boxes">
                    <input type="text" id="yourname" name="yourname" required maxlength="30">
                </div>
                <label for="username">Username<span class="need">*</span></label>
                <div class="input-boxes">
                    <input type="text" id="username" name="username" required minlength="8" maxlength="18">
                </div>
                <label for="CCCD">CCCD<span class="need">*</span><span id="CCCD-warning" style="visibility: hidden;">Sai
                        định dạng</span></label>
                <div class="input-boxes">
                    <input type="text" id="CCCD" name="CCCD" minlength="12" maxlength="12"  >
                </div>
                <label for="gender">Giới tính</label>
                <div class="input-boxes multichoice-box">
                    <input type="radio" id="gender1" name="gender" value="Nam"> Nam
                    <input type="radio" id="gender2" name="gender" value="Nữ"> Nữ
                    <input type="radio" id="gender3" name="gender" value="Không rõ" checked> Không rõ
                    <!-- neu khong tich thi mac dinh la khong ro -->
                </div>
                <label for="Date-of-birth">Ngày tháng năm sinh<span id="date-warning" style="visibility: hidden;">Không
                        hợp lệ</span></label>
                <div class="input-boxes date-select">
                    <select name="Date-of-birth" id="date" onchange="checkdatecondition(); this.blur()" onfocus="this.size=7" onblur="this.size=1">
                        <?php
                        for ($date = 1; $date <= 28; $date += +1) {
                            echo "<option value=$date >$date</option>";
                        }
                        ?>
                        <option class="feb-full" value="29">29</option>
                        <option class="not-feb" value="30">30</option>
                        <option class="not-feb" value="31">31</option>
                    </select><a> /</a>
                    <select name="Month-of-birth" id="month" onchange="checkdatecondition(); this.blur()" onfocus="this.size=7" onblur="this.size=1">
                        <?php
                        for ($month = 1; $month <= 28; $month += +1) {
                            echo "<option value=$month>$month</option>";
                        }
                        ?>
                    </select><a> /</a>
                    <select name="Year-of-birth" id="year" onchange="checkdatecondition(); this.blur()" onfocus="this.size=7" onblur="this.size=1">
                        <?php
                        $today = getdate();
                        $namhientai = $today["year"];
                        for ($nam = 1990; $nam <= $namhientai; $nam += +1) {
                            echo "<option value=$nam>$nam</option>";
                        }
                        ?>
                    </select>
                </div>
                <label for="gmail">Gmail<span class="need">*</span></label>
                <div class="input-boxes">
                    <input type="gmail" name="gmail" id="gmail">
                </div>
                <label for="password">Mật khẩu<span class="need">*</span></label>
                <div class="input-boxes">
                    <input type="password" name="password" id="Password" maxlength="32">
                    <img src="/image/icon/eye-slash 256-205.png" alt="not-show" id="secret">
                    <img src="/image/icon/eye 240 60.png" alt="show" id="show">
                </div>
                <div id="message">
                    <h6>Password must contain the following:</h6>
                    <p id="letter" class="invalid">Ít nhất <b>1</b> chữ <b>thường</b></p>
                    <p id="capital" class="invalid">Ít nhất <b>1</b> chữ <b>hoa</b></p>
                    <p id="number" class="invalid">Ít nhất <b>1 số</b></p>
                    <p id="special" class="invalid">Ít nhất <b>1 kí tự đặc biệt</b></p>
                    <p id="lengthchk" class="invalid">Tối thiểu <b>8 kí tự</b></p>
                </div>
                <label for="password-retype">Nhập lại mật khẩu<span class="need">*</span><span id="psw-check-warning" style="visibility: hidden;">Không khớp</span></label>
                <div class="input-boxes">
                    <input type="password" name="password-retype" id="Password-retype">
                    <img src="/image/icon/eye-slash 256-205.png" alt="not-show" id="secret1">
                    <img src="/image/icon/eye 240 60.png" alt="show" id="show1">
                </div>
                <input type="submit" id="confirm" value="Đăng ký">
            </form>
        </div>
    </div>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
    function checkdatecondition() {
        var date = document.getElementById("date");
        var month = document.getElementById("month");
        var year = document.getElementById("year");
        // nhung ngay invalid
        if (month.value == 2) {
            if (date.value == 30 || date.value == 31) {
                debugger
                document.getElementById("date-warning").style.visibility = "visible";
                resetselecteddate(date);
                resetselecteddate(month);
                resetselecteddate(year);
            }
            if (date.value == 29 && (year.value % 4) != 0) {
                document.getElementById("date-warning").style.visibility = "visible";
                resetselecteddate(date);
                resetselecteddate(month);
                resetselecteddate(year);
            }
        }
        if ((month.value == 4 || month.value == 6 || month.value == 9 || month.value == 11) && date.value == 31) {
            document.getElementById("date-warning").style.visibility = "visible";
            resetselecteddate(date);
            resetselecteddate(month);
            resetselecteddate(year);
        }
    }

    function resetselecteddate(string) {
        string.selectedIndex = null;
    }
    //check dk password
    document.addEventListener("DOMContentLoaded", function() {
        const psw = document.querySelector("#Password");
        const psw_chk = document.querySelector("#Password-retype");

        // Khi nhập vào passworđ-retype
        document.querySelector("#Password-retype").onkeyup = function() {

            //Hiện img khi nhập
            document.getElementById("secret1").style.display = "block";

            // Kiểm tra nếu độ dài 2 password đã bằng chưa
            if (psw.value.length == psw_chk.value.length) {

                // Nếu độ dài bằng + giá trị giống không hiện tb
                if (psw.value === psw_chk.value) {
                    document.getElementById("psw-check-warning").style.visibility = "hidden";
                    document.getElementById("confirm").style.pointerEvents = "auto";
                }
                // Ngược lại hiện tb
                else {
                    document.getElementById("psw-check-warning").style.visibility = "visible";
                    document.getElementById("confirm").style.pointerEvents = "none";
                }
            }
        }

            // Hiện box + img khi nhấn vào password
            document.getElementById("Password").onfocus = function() {
                document.getElementById("show").style.display = "none";
                document.getElementById("message").style.display = "block";
                if (psw.value.length != 0)
                    document.getElementById("secret").style.display = "block";
            }
            // Hiện img khi nhấn vào nhập lại mật khẩu
            document.getElementById("Password-retype").onfocus = function() {
                if (psw.value.length != 0)
                    document.getElementById("secret1").style.display = "block";
            }
            // Ẩn box + img khi ko nhấn vào password
            document.getElementById("Password").onblur = function() {
                if (click_img != 1) {
                    document.getElementById("message").style.display = "none";
                    document.getElementById("secret").style.display = "none";
                    document.getElementById("Password").type = "password";
                }
                click_img = 0;
            }

            // Ẩn img khi ko nhấn vào nhập lại mật khẩu
            document.getElementById("Password-retype").onblur = function() {
                document.getElementById("secret1").style.display = "none";
            }

            // Kiểm tra điều kiện input
            var upperCaseLetters = /[A-Z]/g;
            var lowerCaseLetters = /[a-z]/g;
            var numbers = /[0-9]/g;
            var specialchar = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;

        // Kiểm tra nếu nhấn vào toggle password
        var click_img;

        // Kiểm tra định dạng CCCD
        document.getElementById("CCCD").onkeyup = function() {
            var CCCD_val = document.getElementById("CCCD").value;
            if (CCCD_val.match(lowerCaseLetters) || CCCD_val.match(upperCaseLetters) || CCCD_val.match(specialchar)) {
                document.getElementById("CCCD-warning").style.visibility = "visible";
            }
        }

        // Khi nhập vào password
        document.getElementById("Password").onkeyup = function() {
            document.getElementById("secret").style.display = "block";
            // Kiểm tra chữ viết thường
            if (document.getElementById("Password").value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Kiểm tra chữ viết hoa
            if (document.getElementById("Password").value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Kiểm tra số
            if (document.getElementById("Password").value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            // Kiểm tra kí tự đặc biệt
            if (document.getElementById("Password").value.match(specialchar)) {
                special.classList.remove("invalid");
                special.classList.add("valid");
            } else {
                special.classList.remove("valid");
                special.classList.add("invalid");
            }

            //  Kiểm tra độ dài
            if (document.getElementById("Password").value.length >= 8) {
                lengthchk.classList.remove("invalid");
                lengthchk.classList.add("valid");
            } else {
                lengthchk.classList.remove("valid");
                lengthchk.classList.add("invalid");
            }
        }

        // Hiện-ẩn password

        document.getElementById("secret").onmousedown = function() {
            document.getElementById("message").style.display = "block";
            document.getElementById("secret").style.display = "none";
            document.getElementById("show").style.display = "block";
            document.getElementById("Password").type = "text";
            click_img = 1;
        }

        document.getElementById("show").onmousedown = function() {
            document.getElementById("secret").style.display = "block";
            document.getElementById("message").style.display = "block";
            document.getElementById("show").style.display = "none";
            document.getElementById("Password").type = "password";
            click_img = 1;
        }
    });
</script>

</html>