<?php
session_start();
// echo $_SESSION['supstatus'];
include('php/whichbtn.php');
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Login | CodeWorld</title>
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
    $showdiv=false;

  $alert_logo = '<svg class="svg-inline--fa fa-exclamation-circle fa-w-16 rounded-full fill-current text-4xl" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>';
  if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 'confail') {
      $alert_title = 'Sorry ! ';
      $alert_message = "Can't Connect to server now.";
      $alert_bg = 'bg-yellow-200';
      $alert_fg = 'text-yellow-600';
    $showdiv=true;

    } elseif ($_SESSION['status'] == 'nouser') {
      $alert_title = 'No User ! ';
      $alert_message = "Sorry No such user found, Please Sign Up.";
      $alert_bg = 'bg-red-200';
    $showdiv=true;
    $alert_fg = 'text-red-500';
    } elseif ($_SESSION['status'] == 'wrongpw') {
      $alert_title = 'Wrong Password ! ';
      $alert_message = "You have entered Wrong Password, Click on forgot password to reset it.";
      $alert_bg = 'bg-red-200';
    $showdiv=true;
    $alert_fg = 'text-red-500';
    } elseif ($_SESSION['status'] == 'dupliuser') {
      $alert_title = 'Error ! ';
      $alert_message = "Duplicate user dected.";
      $alert_bg = 'bg-red-200';
    $showdiv=true;
    $alert_fg = 'text-red-500';
    } elseif ($_SESSION['status'] == 'wrongway') {
      $alert_title = 'Wait ? ';
      $alert_message = "You can't Cheat us !";
      $alert_bg = 'bg-red-200';
    $showdiv=true;
    $alert_fg = 'text-red-500';
    }else{
      $showdiv=false;
    };
  };
  if(isset($_SESSION['supstatus'])){
    if($_SESSION['supstatus'] == 'confail'){
      $alert_title = 'Sorry ! ';
      $alert_message = "Can't Connect to server now.";
      $alert_bg = 'bg-yellow-200';
    $showdiv=true;
    $alert_fg = 'text-yellow-600';
    } elseif ($_SESSION['supstatus'] == 'signupsucess') {
      $alert_title = 'You have sucessfully signed up';
      $alert_message = "Welcome to our community! Now login with your details.";
      $alert_bg = 'bg-green-200';
    $showdiv=true;
    $alert_fg = 'text-green-500';
      // <path class="st0" d=""/>
      $alert_logo = '<svg class="svg-inline--fa fa-exclamation-circle fa-w-16 rounded-full fill-current text-4xl" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 650 650" data-fa-i2svg="">
      <path fill="currentColor" d="M562,396c0-141.4-114.6-256-256-256S50,254.6,50,396s114.6,256,256,256S562,537.4,562,396L562,396z    M501.7,296.3l-241,241l0,0l-17.2,17.2L110.3,421.3l58.8-58.8l74.5,74.5l199.4-199.4L501.7,296.3L501.7,296.3z"></path>
      </svg>';
    }elseif ($_SESSION['supstatus'] == 'alreadyuser') {
      $alert_title = 'Wait ! ';
      $alert_message = "This Email already exists. You can login. Click on forgot password link if you have forgotten the password.";
      $alert_bg = 'bg-red-200';
      $alert_fg = 'text-red-500';
      $showdiv=true;

    }elseif ($_SESSION['supstatus'] == 'wrongway') {
      $alert_title = 'Wait ? ';
      $alert_message = "You can't Cheat us !";
      $alert_bg = 'bg-red-200';
      $alert_fg = 'text-red-500';
      $showdiv=true;

    }else{
      $alert_title = 'Error ? ';
      $alert_message = "Something went wrong Try again!";
      $alert_bg = 'bg-red-200';
      $alert_fg = 'text-red-500';
      $showdiv=true;

    };
  }
  if (isset($_SESSION['fstatus'])){
    if ($_SESSION['fstatus'] == "fsucess"){
      $alert_title = 'Sucess ';
      $alert_message = "You have Reseted your account password! Now login with your details.";
    $showdiv=true;
    $alert_bg = 'bg-green-200';
      $alert_fg = 'text-green-500';
      $alert_logo = '<svg class="svg-inline--fa fa-exclamation-circle fa-w-16 rounded-full fill-current text-4xl" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 650 650" data-fa-i2svg="">
      <path fill="currentColor" d="M562,396c0-141.4-114.6-256-256-256S50,254.6,50,396s114.6,256,256,256S562,537.4,562,396L562,396z    M501.7,296.3l-241,241l0,0l-17.2,17.2L110.3,421.3l58.8-58.8l74.5,74.5l199.4-199.4L501.7,296.3L501.7,296.3z"></path>
      </svg>';
    }

  }
  if(isset($_SESSION['status'])){
    unset($_SESSION['status']);
  }elseif(isset($_SESSION['supstatus'])){
    unset($_SESSION['supstatus']);
  }elseif(isset($_SESSION['fstatus']) and ($_SESSION['fstatus'] == "fsucess")){
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
              <button type="button"  onClick="hide('alertwarn')"  class="leavethis <?=$alert_fg?>">
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
      <div class="title login">
        Login Form</div>
      <div class="title signup">
        Signup Form</div>
    </div>
    <div class="form-container">
      <div class="slide-controls">
        <input type="radio" name="slide" id="login" checked>
        <input type="radio" name="slide" id="signup">
        <label for="login" class="slide login">Login</label>
        <label for="signup" class="slide signup">Signup</label>
        <div class="slider-tab">
        </div>
      </div>
      <div class="form-inner">
        <form action="loginuser.php" method="POST" class="login">
          <div class="field">
            <input name="lmail" type="email" placeholder="Email Address" required>
          </div>
          <div class="field">
            <input name="lpass" type="password"  placeholder="Password" required>
          </div>
          <div class="pass-link">
            <a href="/passwordreset.php">Forgot password?</a>
          </div>
          <div class="field btn">
            <div class="btn-layer">
            </div>
            <input name="lsubmit" type="submit" value="Login">
          </div>
          <div class="signup-link">
            Not a member?<a href=""> Signup now</a></div>
        </form>
        <form action="signupuser.php" method="POST" class="signup">
          <div class="field">
            <input id="name" name="sname" type="text" placeholder="Name" required>
          </div>
          <div class="field">
            <input id="email" name="semail" type="email" placeholder="Email Address" required>
          </div>

          <div class="field flex" id="passdiv">
            <input id="password" name="spassword" type="password" onkeyup=checkpass() placeholder="Password" required>
            <span class="m-2 align-middle	tooltip" id='validmessage'></span>
            <!-- <span class="tooltiptext">Tooltip text</span> -->
          </div>
          <div class="field flex" id="cpassdiv">
            <input id="confirm_password" name="sconfpass" onkeyup=check() type="password" placeholder="Confirm password" required>
            <span class="m-2 align-middle	" id='matchmessage'></span>
          </div>
          <div class="field btn">
            <div class="btn-layer">
            </div>
            <input type="submit" id="submit" value="Signup">
          </div>
          <div class="login-link">
            Already a member?<a href=""> Login now</a></div>
        </form>
      </div>
    </div>
  </div>
  <br>
  <?php include('footer.html'); ?>


  <script src="js/loginjs.js"></script>
<script src="js/validation.js"></script>
<script type="text/javascript">
whichform = sessionStorage.getItem('openform');
if(whichform=='login'){
  document.querySelector('label.login').click()
}else if(whichform=='signup'){
  document.querySelector('label.signup').click()
}else{
  document.querySelector('label.login').click()
}
    
  </script>
</body>
<html>