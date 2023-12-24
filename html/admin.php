<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="../css/admin.css" type="text/css" rel="stylesheet">

</head>
<?php
session_start();
include("./config.php")
?>

<body>
  <?php if (isset($_SESSION['login_user'])) {
    $user_check = $_SESSION['login_user'];
    $ses_sql = mysqli_query($db, "select Username from admin where Username = '$user_check' ");
    $row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
    $login_session = $row['Username'];
    echo '<p class="w3-bar-item w3-button w3-right w3-padding-large">Welcome,' . $login_session . '</p>';
  }
  ?>

  <div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
            </svg>
            <span class="nav-item">Chức năng</span>
          </a></li>
        <li><a href="hienthi_ds_hocsinh.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
              <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z" />
            </svg>
            <i class="fas fa-home"></i>
            <span class="nav-item">Hiển thị danh sách học sinh</span>

          </a></li>
        <!-- <li><a href="./add-test.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
              <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z" />
            </svg>
            <i class="fas fa-user"></i>
            <span class="nav-item">Bài kiểm tra</span>
          </a></li> -->
        <li><a href="nhapbang_diem.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet-fill" viewBox="0 0 16 16">
              <path d="M6 12v-2h3v2z" />
              <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M3 9h10v1h-3v2h3v1h-3v2H9v-2H6v2H5v-2H3v-1h2v-2H3z" />
            </svg>
            <i class="fas fa-tasks"></i>
            <span class="nav-item">Nhập câu hỏi bài kiểm tra</span>
          </a>
          <ul>
            <li class="inner_list"><a href="./add-test.php">Nhập/Xem bài kiểm tra</a></li>
            <li class="inner_list"><a href="./add-test-content.php">Nhập/Xem câu hỏi</a></li>
            <li class="inner_list"><a href="./add-question-answer.php">Nhập/Xem câu trả lời</a></li>
          </ul>
        </li>

      </ul>
    </nav>
  </div>

</body>

</html>