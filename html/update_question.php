<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="/css/table.css">
    <link rel="stylesheet" type="text/css" href="/css/add-test.css">
</head>
<?php
include("./config.php");
if (isset($_GET["qeid"])) {
    $test_id = $_GET["teid"];
    $question_id = $_GET["qeid"];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $exists = false;
    $question_id = $_POST['question_id'];
    $test_id = $_POST['test_id'];
    $question = $_POST['question'];
    $sql = "select * from question where question_id = '$question_id'";

    $result = mysqli_query($db, $sql);

    $num = mysqli_num_rows($result);

    if ($num > 0) {
        if ($exists == false) {
            $sql = "UPDATE question SET `Question`= '$question' WHERE `Question_id`='$question_id' AND `Test_id`='$test_id'";
            $result = mysqli_query($db, $sql);
        }
    };

    if ($num == 0) {
        $exists = "ID CÂU HỎI KHÔNG TỒN TẠI";
    }
    header("location: add-test-content.php");
}
?>

<body>
    <button class="nextpage"><a href="/html/admin.php">HOME</a></button>
    <div class="them-cauhoi">
        <h1>Sửa câu hỏi</h1>
        <form method="post" class="questions" action="add-test-content.php">
            <label for="test_id">Mã bài kiểm tra : </label><br>
            <input type="text" class="input-box" id="test_id" name="test_id" required maxlength="2" value="<?php echo ($test_id) ?>"><br>
            <label for="question_id">Câu hỏi thứ : </label><br>
            <input type="text" class="input-box" id="question_id" name="question_id" required maxlength="2" minlength="2" placeholder="VD: 01" value="<?php echo ($question_id) ?>"><br>
            <label for="test_name">Câu hỏi : </label><br>
            <input type="text" class="input-box" name="question" id="question" required><br>
            <input type="submit" id="confirm" value="Nhập">
        </form>

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