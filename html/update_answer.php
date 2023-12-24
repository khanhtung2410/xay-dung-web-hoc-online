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
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $exists = false;
    $question_id = $_POST['question_id'];
    $choice1 = "A";
    $choice2 = "B";
    $choice3 = "C";
    $choice4 = "D";
    $answer1 = $_POST['Answer1'];
    $answer2 = $_POST['Answer2'];
    $answer3 = $_POST['Answer3'];
    $answer4 = $_POST['Answer4'];
    $right_choice = $_POST["right_answer"];
    $sql = "select * from answer where question_id = '$question_id'";
    $sql1 = "select * from answer where question_id = '$question_id'";
    $sql2 = "select * from answer where question_id = '$question_id'";
    $sql3 = "select * from answer where question_id = '$question_id'";
    $sql4 = "select * from answer_map";
    $result = mysqli_query($db, $sql);
    $yes = "Có";
    $num = mysqli_num_rows($result);

    if ($num > 0) {

        if ($exists == false) {
            $sql = "UPDATE answer SET `Answer`= '$answer1' WHERE `Choice`='$choice1' AND `Question_id`='$question_id'"; 
            $result = mysqli_query($db, $sql);
            
            $sql1 = "UPDATE answer SET `Answer`= '$answer2' WHERE `Choice`='$choice2' AND `Question_id`='$question_id'"; 
            $result = mysqli_query($db, $sql1);
            
            $sql2 = "UPDATE answer SET `Answer`= '$answer3' WHERE `Choice`='$choice3' AND `Question_id`='$question_id'";
            $result = mysqli_query($db, $sql2);
            
            $sql3 = "UPDATE answer SET `Answer`= '$answer4' WHERE `Choice`='$choice4' AND `Question_id`='$question_id'";
            $result = mysqli_query($db, $sql3);
            echo($right_choice);
            $sql4 = "UPDATE answer_map SET `Choice`= '$right_choice' WHERE `Question_id`='$question_id'";
            $result = mysqli_query($db, $sql4);
            echo("UPDATE THÀNH CÔNG");
        }
    };

    if ($num == 0) {
        $exists = "ID CÂU HỎI KHÔNG TỒN TẠI";
        echo ($exists);
    }
    header("location: /Btl/xay-dung-web-hoc-online/html/add-question-answer.php");
}
?>

<body>
    <?php
    $sql = "SELECT * FROM answer WHERE `Question_id`='$question_id' AND `Choice`='A'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $sql1 = "SELECT * FROM answer WHERE `Question_id`='$question_id' AND `Choice`='B'";
    $result1 = mysqli_query($db, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
    $sql2 = "SELECT * FROM answer WHERE `Question_id`='$question_id' AND `Choice`='C'";
    $result2 = mysqli_query($db, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $sql3 = "SELECT * FROM answer WHERE `Question_id`='$question_id' AND `Choice`='D'";
    $result3 = mysqli_query($db, $sql3);
    $row3 = mysqli_fetch_assoc($result3);
    $sql4 = "SELECT * from answer_map WHERE `Question_id`='$question_id'";
    $result4 = mysqli_query($db, $sql4);
    $row4 = mysqli_fetch_assoc($result4);
    ?>
    <button class="nextpage"><a href="/Btl/xay-dung-web-hoc-online/html/admin.php">HOME</a></button>
    <div class="them-answer">
        <h1>Sửa câu trả lời</h1>
        <form method="post" id="questions" action="update_answer.php">
            <label for="question_id">Câu hỏi thứ : </label><br>
            <input type="text" class="input-box" id="question_id" name="question_id" required maxlength="2" minlength="2" value="<?php echo ($question_id) ?>"><br>
            <label for="Answer1">Nhập đáp án A:</label><br>
            <input type="text" class="input-box" name="Answer1" id="Answer1" required value="<?php echo ($row['Answer']) ?>"><br>
            <label for="Answer1">Nhập đáp án B:</label><br>
            <input type="text" class="input-box" name="Answer2" id="Answer2" required value="<?php echo ($row1['Answer']) ?>"><br>
            <label for="Answer1">Nhập đáp án C:</label><br>
            <input type="text" class="input-box" name="Answer3" id="Answer3" required value="<?php echo ($row2['Answer']) ?>"><br>
            <label for="Answer1">Nhập đáp án D:</label><br>
            <input type="text" class="input-box" name="Answer4" id="Answer4" required value="<?php echo ($row3['Answer']) ?>"><br>
            <label for="right_answer">Đáp án đúng:</label><br>
            <input type="text" class="input-box" name="right_answer" id="right_answer" maxlength="1" required placeholder="A, B, C hoặc D" value="<?php echo ($row4['Choice']) ?>"><br>
            <input type="submit" id="confirm" value="Nhập">
        </form>
    </div>

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>


</html>