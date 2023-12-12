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
  $subject_id = $_POST['subject_id'];
  $test_id = $_POST['test_id'];
  $test_name = $_POST['test_name'];

  $sql = "select * from test where test_id = '$test_id'";

  $result = mysqli_query($db, $sql);

  $num = mysqli_num_rows($result);

  if ($num == 0) {
    if ($exists == false) {
      $sql = "INSERT INTO `test` (`Subject_id`,`Test_id`,`Test_name`) VALUES ('$subject_id','$test_id','$test_name')";
      $result = mysqli_query($db, $sql);
    }
  };

  if ($num > 0) {
    $exists = "ID ĐÃ TỒN TẠI";
  }
}
?>

<body>
  <form method="post" id="overall" action="add-test.php">
    <label for="subject_id">Nhập mã môn học (Toán = T , Lý = L) : </label><br>
    <input type="text" id="subject_id" name="subject_id" required maxlength="1"><br>
    <label for="test_id">Nhập mã bài kiểm tra: </label><br>
    <input type="text" id="test_id" name="test_id" required maxlength="2"><br>
    <label for="test_name">Nhập tên bài kiểm tra: </label><br>
    <input type="text" name="test_name" id="test_name" required><br>
    <input type="submit" id="confirm" value="Nhập">
  </form>
</body>
<script>
  var sub_id = document.getElementById("subject_id");
  document.getElementById("confirm").onmouseover = function() {
    debugger
    if (sub_id.value == "T" || sub_id.value == "L") {
      return
    } else
      sub_id.value = "";
  }
</script>

</html>