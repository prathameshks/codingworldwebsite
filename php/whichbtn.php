<?php
if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 'loggedin') {
      $buttonlg = "Logout";
      $buttonlglink = "/logout.php";
      $messagefresh = "in";
    }
  } elseif (isset($_SESSION['messagefresh'])) {
    $buttonlg = "Login";
    $buttonlglink = "/login.php";
    $messagefresh = "out";
  } else {
    $buttonlg = "Login";
    $buttonlglink = "/login.php";
  }
?>