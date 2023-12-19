<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include("./config.php");
$student_answer= array();
$score = 0;
$row = mysqli_fetch_assoc($result);
$subject_id = $_POST['subject_id'];
$test_id = $_POST['test_id'];
echo ("$subject_id , $test_id");
$sql = "SELECT * FROM answer_sheet_true WHERE Subject_id = '$subject_id' AND Test_id = '$test_id'";
$result = mysqli_query($db, $sql);
// $sql1 = "SELECT Answer, Choice, Question_id FROM answer_sheet WHERE Test_id = '$test_id'";
// $result1 = mysqli_query($db, $sql1);
// while ($row = mysqli_fetch_assoc($result)) {

// }
$sql1 = "SELECT Answer, Choice,Question_id FROM answer_sheet WHERE Test_id = '$test_id'";
$result1 = mysqli_query($db, $sql1);
while ($row1 = mysqli_fetch_assoc($result1)) {
    array_push($student_answer,$_POST['Question_id']);
}
?>

<body>

</body>

</html>