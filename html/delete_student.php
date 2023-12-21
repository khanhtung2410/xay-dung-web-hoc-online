<?php
require "config.php";
if(isset($_GET["id"]))
{
   $ID = $_GET["id"];
}
?>
<?php
  $sql1 = "SELECT * FROM user WHERE `ID`='$ID'";
  $result1 = mysqli_query($db, $sql1);

  while ($row = mysqli_fetch_assoc($result1)) {
      $user = $row['Username'];
      $sql1 =  "DELETE FROM test_result WHERE `Username` = '$user'";
      $result = mysqli_query($db, $sql1);

  }

$sql = "DELETE FROM user WHERE ID = $ID";
$result = mysqli_query($db,$sql);
header("location: hienthi_ds_hocsinh.php");
?>