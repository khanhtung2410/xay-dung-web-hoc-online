<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/table.css">
    <link rel="stylesheet" type="text/css" href="../css/add-test.css">
</head>
<?php
include("./config.php");
if(isset($_GET["teid"]))
{
   $test_id = $_GET["teid"];
   $subject_id = $_GET["subid"];
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $exists = false;
    $subject_id = $_POST['subject_id'];
    $test_id = $_POST['test_id'];
    $test_name = $_POST['test_name'];

    $sql = "SELECT * from test where test_id = '$test_id'";

    $result = mysqli_query($db, $sql);

    $num = mysqli_num_rows($result);

    if ($num > 0) {
        if ($exists == false) {
            $sql = "UPDATE test SET `Test_name`= '$test_name' WHERE `Subject_id`='$subject_id' AND `Test_id`='$test_id'";
            $result = mysqli_query($db, $sql);
            echo ("Đã nhập thành công");
        }
    };

    if ($num == 0) {
        $exists = "ID KHÔNG TỒN TẠI";
    }
    header("location: add-test.php");
}
?>
<style>
    a {
        text-decoration: none;
        position: relative;
        color: rgb(85, 83, 83);
        font-size: 14px;
        display: table;
        padding: 10px;
    }

    .action {
        display: flex;
        text-decoration: none;
    }

    .fix {
        color: #fdbc24;
    }

    .delete {
        color: red;
    }
</style>

<body>
    <button class="nextpage"><a href="/html/admin.php">HOME</a></button>
    <div class="them-test">
        <h1>Sửa tên bài kiểm tra</h1>
        <form method="POST" id="overall" action="update_test.php">
            <label for="subject_id">Mã môn học : </label><br>
            <input type="text" class="input-box" id="subject_id" name="subject_id" required maxlength="1" placeholder="Toán = T , Lý = L" value="<?php echo($subject_id);?>"><br>
            <label for="test_id">Mã bài kiểm tra: </label><br>
            <input type="text" class="input-box" id="test_id" name="test_id" required maxlength="2" value="<?php echo($test_id);?>"><br>
            <label for="test_name">Tên bài kiểm tra: </label><br>
            <input type="text" class="input-box" name="test_name" id="test_name" required><br>
            <input type="submit" class="button" id="confirm" value="Nhập">
        </form>
    </div>

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
    var sub_id = document.getElementById("subject_id");
    document.getElementById("confirm").onmouseover = function() {
        //check value hop le hay khong
        if (sub_id.value == "T" || sub_id.value == "L") {
            return
        } else
            sub_id.value = "";
    }

</script>

</html>