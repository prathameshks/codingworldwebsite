<?php
session_start();

if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 'loggedin') {
        $buttonlg = "Logout";
        $buttonlglink = "/logout.php";
    } else {
        $buttonlg = "Login/Signup";
        $buttonlglink = "/login.php";
    }
} else {
    $buttonlg = "Login/Signup";
    $buttonlglink = "/login.php";
};
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Projects | CodeWorld</title>
    <meta name="description" content="Official website of Code World.Get All video code information programs and Projects.">
    <meta name="author" content="Code World">
    <link rel="stylesheet" href="css/style.css">

    <link href="css/tstyle.css" rel="stylesheet">
    <style>
        #projects {
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
    <form>
        <label>password :
            <input name="password" id="password" type="password"/>
        </label>
        <br>
        <label>confirm password:
            <input type="password" name="confirm_password" id="confirm_password" onkeyup=check() />
            <span id='message'></span>
        </label>
        <input id="submit" type="submit">
    </form>
    <script>
        function check() {
            if (document.getElementById('password').value == document.getElementById('confirm_password').value){
                document.getElementById('submit').disabled = false;
                // document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'matching';
            } else {
                document.getElementById('submit').disabled = true;
                // document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'not matching';
            }
        }
    </script>

    <br>
    <?php include('footer.html'); ?>
</body>
<html>