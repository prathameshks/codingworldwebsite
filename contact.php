<?php
session_start();

if (isset($_SESSION['status'])) {
  if ($_SESSION['status'] == 'loggedin') {
    $buttonlg="Logout";
$buttonlglink="/logout.php";
  }else{
    $buttonlg="Login/Signup";
$buttonlglink="/login.php";
  }
}else{
  $buttonlg="Login/Signup";
$buttonlglink="/login.php";
};
?> 
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>About&Contact | CodeWorld</title>
    <meta name="description" content="Official website of Code World.Get All video code information programs and Projects.">
    <meta name="author" content="Code World">
    <link rel="stylesheet" href="css/style.css">

    <link href="css/tstyle.css" rel="stylesheet">
    <style>
        #contact {
            text-shadow: 0 0 2px #fff;
            background-color: #bababa;
            padding: 5px 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php include('header.html'); ?>
    <br>

    <br>
    <?php include('footer.html'); ?>
</body>
<html>