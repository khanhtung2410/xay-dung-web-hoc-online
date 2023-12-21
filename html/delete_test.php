<?php
require "config.php";

if ($_GET["status"] == 'que') {
    $Question_id = $_GET["qeid"];
    $Test_id = $_GET["teid"];
    $sql = "DELETE FROM answer_map WHERE `Question_id`='$Question_id'";
    $result = mysqli_query($db, $sql);

    $sql1 = "DELETE FROM answer WHERE `Question_id`='$Question_id'";
    $result = mysqli_query($db, $sql1);

    $sql2 = "DELETE FROM question WHERE `Question_id`='$Question_id'";
    $result = mysqli_query($db, $sql2);
    header("location: add-test-content.php");
}
if ($_GET["status"] == 'test') {
    $test_id = $_GET["teid"];

    $sql1 = "SELECT * FROM question WHERE `Test_id`='$test_id'";
    $result1 = mysqli_query($db, $sql1);

    while ($row = mysqli_fetch_assoc($result1)) {
        $question_id = $row['Question_id'];
        $sql = "DELETE FROM answer_map WHERE `Question_id`='$question_id'";
        $result = mysqli_query($db, $sql);

        $sql2 = "DELETE FROM answer WHERE `Question_id`='$question_id'";
        $result = mysqli_query($db, $sql2);
    }

    $sql3 = "DELETE FROM question WHERE `Test_id`='$test_id'";
    $result = mysqli_query($db, $sql3);

    $sql = "DELETE FROM test WHERE `Test_id`='$test_id'";
    $result = mysqli_query($db, $sql);
    header("location: add-test.php");
}
