<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include("./config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $exists = false;
    $question_id = $_POST['question_id'];
    $test_id = $_POST['test_id'];
    $question = $_POST['question'];
    $sql = "select * from question where question_id = '$question_id'";

    $result = mysqli_query($db, $sql);

    $num = mysqli_num_rows($result);

    if ($num == 0) {
        if ($exists == false) {
            $sql = "INSERT INTO `question` (`Question_id`,`Test_id`,`Question`) VALUES ('$question_id','$test_id','$question')";
            $result = mysqli_query($db, $sql);
        }
    };

    if ($num > 0) {
        $exists = "ID CÂU HỎI ĐÃ TỒN TẠI";
    }
}

?>

<body>
    <form method="post" id="questions" action="add-test-content.php">
        <label for="test_id">Nhập mã bài kiểm tra : </label><br>
        <input type="text" id="test_id" name="test_id" required maxlength="2"><br>
        <label for="question_id">Câu hỏi thứ : </label><br>
        <input type="text" id="question_id" name="question_id" required maxlength="2"><br>
        <label for="test_name">Nhập câu hỏi : </label><br>
        <input type="text" name="question" id="question" required><br>
        <input type="submit" id="confirm" value="Nhập">
    </form>
</body>

</html>