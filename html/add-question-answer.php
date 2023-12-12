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

    $num = mysqli_num_rows($result);

    if ($num == 0) {
        // do if chạy trc insert 
        // nên để if sau lệnh insert thứ 2 thì nó sẽ nhận id của insert đầu
        if ($exists == false) {
            $sql = "INSERT INTO `answer` (`Question_id`,`Choice`,`Answer`) VALUES ('$question_id','$choice1','$answer1')";
            $result = mysqli_query($db, $sql);
            $sql1 = "INSERT INTO `answer` (`Question_id`,`Choice`,`Answer`) VALUES ('$question_id','$choice2','$answer2')";
            
            if ($right_choice == "A"){
                $right_answer_id = mysqli_insert_id($db);
            }
            $result = mysqli_query($db, $sql1);
            $sql2 = "INSERT INTO `answer` (`Question_id`,`Choice`,`Answer`) VALUES ('$question_id','$choice3','$answer3')";
            
            if ($right_choice == "B"){
                $right_answer_id = mysqli_insert_id($db);
            }
            $result = mysqli_query($db, $sql2);
            $sql3 = "INSERT INTO `answer` (`Question_id`,`Choice`,`Answer`) VALUES ('$question_id','$choice4','$answer4')";
            
            if ($right_choice == "C"){
                $right_answer_id = mysqli_insert_id($db);
            }

            if ($right_choice == "D"){
                $right_answer_id = mysqli_insert_id($db);
            }
            $result = mysqli_query($db, $sql3);

            $sql4 = "INSERT INTO `answer_map` (`Answer_id`,`Choice`,`Question_id`) VALUES ('$right_answer_id','$right_choice','$question_id')";
            $result = mysqli_query($db, $sql4);
            echo ($right_answer_id);
        }
    };

    if ($num > 0) {
        $exists = "ID CÂU HỎI ĐÃ CÓ CÂU TRẢ LỜI";
        echo ("bggggggggggggggg");
    }
}
?>


<body>
    <form method="post" id="questions" action="add-question-answer.php">
        <label for="question_id">Câu hỏi thứ : </label><br>
        <input type="text" id="question_id" name="question_id" required maxlength="2"><br>
        <label for="Answer1">Nhập đáp án A:</label><br>
        <input type="text" name="Answer1" id="Answer1" required><br>
        <label for="Answer1">Nhập đáp án B:</label><br>
        <input type="text" name="Answer2" id="Answer2" required><br>
        <label for="Answer1">Nhập đáp án C:</label><br>
        <input type="text" name="Answer3" id="Answer3" required><br>
        <label for="Answer1">Nhập đáp án D:</label><br>
        <input type="text" name="Answer4" id="Answer4" required><br>
        <label for="right_answer">Đáp án đúng (1 trong 4 đáp án A,B,C,D):</label><br>
        <input type="text" name="right_answer" id="right_answer" maxlength="1" required ><br>
        <input type="submit" id="confirm" value="Nhập">
    </form>
</body>

</html>