<?php
session_start();
// echo $_SESSION['supfstatus'];
include('php/whichbtn.php');
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Password Reset | CodeWorld</title>
  <meta name="description" content="Official website of Code World.Get All video code information programs and Projects.">
  <meta name="author" content="Code World">
  <link rel="stylesheet" href="css/style.css">
  <link href="css/tstyle.css" rel="stylesheet">
  <link href="css/loginstyle.css" rel="stylesheet">
  <style>
  </style>
</head>

<body>
<script type="text/javascript" src="js/validation.js"></script>

  <?php include('header.html'); ?>
  <br>
  <?php
  $alert_logo = '<svg class="svg-inline--fa fa-exclamation-circle fa-w-16 rounded-full fill-current text-4xl" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>';
  if (isset($_SESSION['fstatus'])) {
    if ($_SESSION['fstatus'] == 'confail') {
      $alert_title = 'Sorry ! ';
      $alert_message = "Can't Connect to server now.";
      $alert_bg = 'bg-yellow-200';
      $alert_fg = 'text-yellow-600';
    } elseif ($_SESSION['fstatus'] == 'wrongdetails') {
      $alert_title = 'Wrong Details ! ';
      $alert_message = "Email or name is incorrect. Please renter";
      $alert_bg = 'bg-red-200';
      $alert_fg = 'text-red-500';
    } elseif ($_SESSION['fstatus'] == 'wrongway') {
      $alert_title = 'Wait ? ';
      $alert_message = "You can't Cheat us !";
      $alert_bg = 'bg-red-200';
      $alert_fg = 'text-red-500';
    }else{
      $showdiv=false;
    };
  
    $showdiv=true;
    unset($_SESSION['fstatus']);

  }else{
    // echo 'first';
    $showdiv=false;
    // $divdata = '';
  }
  if ($showdiv==true){
    ?>
      <div id="alertwarn"  class="bg-opacity-70 m-auto md:w-3/5 bg-white my-2 rounded-lg px-4 <?=$alert_bg?>">
      <div class="flex items-center py-4 justify-evenly">
      <div class="leavethis <?=$alert_fg?>  logoalert">
      <?=$alert_logo?>
      </div>
      <div class="leavethis ml-5">
              <h1 class="text-lg font-bold <?=$alert_fg?>"><?=$alert_title?></h1>
              <p class="<?=$alert_fg?> my-0"><?=$alert_message?></p>
          </div>
          <div>
              <button type="button"  onClick="hide(\'alertwarn\')"  class="leavethis <?=$alert_fg?>">
                  <span class="text-2xl">&times;</span>
              </button>
          </div>
      </div>
      </div>
    <?php
  }
  ?>
  
  
  <div class="wrapper">
    <div class="title-text">
        Reset Password
    </div>
    <div class="form-container">
      <div class="form-inner">
        <form action="forgotpass.php" method="POST" class="signup">
          <div class="field">
            <input id="name" name="fname" type="text" placeholder="Name" required>
          </div>
          <div class="field">
            <input id="email" name="femail" type="email" placeholder="Email Address" required>
          </div>

          <div class="field flex" id="passdiv">
            <input id="password" name="fpassword" type="password" onkeyup=checkpass() placeholder="Enter New Password" required>
            <span class="m-2 align-middle	tooltip" id='validmessage'></span>
            <!-- <span class="tooltiptext">Tooltip text</span> -->
          </div>
          <div class="field flex" id="cpassdiv">
            <input id="confirm_password" name="fconfpass" onkeyup=check() type="password" placeholder="Confirm password" required>
            <span class="m-2 align-middle	" id='matchmessage'></span>
          </div>
          <div class="field btn">
            <div class="btn-layer">
            </div>
            <input type="submit" id="submit" value="Reset Password">
          </div>
          <div class="login-link">
            Remember Password?<a href="/login.php"> Login now</a></div>
        </form>
      </div>
    </div>
  </div>
  <br>
  <?php include('footer.html'); ?>


  <script src="js/loginjs.js"></script>
<script src="js/validation.js"></script>

</body>
<html>