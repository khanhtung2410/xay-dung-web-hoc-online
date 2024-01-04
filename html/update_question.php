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
if (isset($_GET["qeid"])) {
    $test_id = $_GET["teid"];
    $question_id = $_GET["qeid"];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $question_id = $_POST['question_id'];
    $test_id = $_POST['test_id'];
    $question = $_POST['question'];
    $diff = $_POST['question_diff'];
    $sql = "select * from question where question_id = '$question_id'";

    $result = mysqli_query($db, $sql);

    $num = mysqli_num_rows($result);

    if ($num > 0) {
        $sql = "UPDATE question SET `Question`= '$question',`Difficulty`='$diff' WHERE `Question_id`='$question_id' AND `Test_id`='$test_id'";
        $result = mysqli_query($db, $sql);
        echo ('Thanh cong');
    };

    if ($num == 0) {
        $exists = "ID CÂU HỎI KHÔNG TỒN TẠI";
    }
    header("location: add-test-content.php");
}
?>

<body>
    <?php
    $sql = "SELECT * from question where question_id = '$question_id'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <button class="nextpage"><a href="/html/admin.php">HOME</a></button>
    <div class="them-cauhoi">
        <h1>Sửa câu hỏi</h1>
        <form method="post" class="questions" action="update_question.php">
            <label for="test_id">Mã bài kiểm tra : </label><br>
            <input type="text" class="input-box" id="test_id" name="test_id" required maxlength="2" value="<?php echo ($test_id) ?>"><br>
            <label for="question_id">ID câu hỏi : </label><br>
            <input type="text" class="input-box" id="question_id" name="question_id" required maxlength="2" minlength="2" placeholder="VD: 01" value="<?php echo ($question_id) ?>" readonly><br>
            <label for="test_name">Câu hỏi : </label><br>
            <input type="text" class="input-box" name="question" id="question" required value="<?php echo $row['Question'] ?>"><br>
            <label for="question_id">Độ khó : </label><br>
            <input type="text" class="input-box" id="question_diff" name="question_diff" required maxlength="5" minlength="2" placeholder="VD: Ez or Med or Hard" value="<?php echo $row['Difficulty'] ?>"><br>
            <input type="submit" id="confirm" value="Nhập">
        </form>

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
    var question_diff = document.getElementById("question_diff");
    document.getElementById("confirm").onmouseover = function() {
        //check value hop le hay khong
        if (question_diff.value == "Ez" || question_diff.value == "Med" || question_diff.value == "Hard") {
            return
        } else
            question_diff.value = "";
    }
</script>

</html>