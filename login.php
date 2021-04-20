<?php
session_start();

if (isset($_SESSION['status'])) {
  if ($_SESSION['status'] == 'loggedin') {
    $buttonlg="Logout";
$buttonlglink="/logout.php";
echo 'You Are already Logged In';
header('location:/');

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
  <?php include('header.html'); ?>
  <br>
<?php
if(isset($_SESSION['status'])){
  $alert_logo='<svg class="svg-inline--fa fa-exclamation-circle fa-w-16 rounded-full fill-current text-4xl" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>';
if($_SESSION['status']=='confail'){
  $alert_title='Sorry ! ';
  $alert_message="Can't Connect to server now.";
  $alert_bg='bg-yellow-200';
  $alert_fg='text-yellow-600';
}elseif($_SESSION['status']=='nouser'){
  $alert_title='No User ! ';
  $alert_message="Sorry No such user found, Please Sign Up.";
  $alert_bg='bg-red-200';
  $alert_fg='text-red-500';
}elseif($_SESSION['status']=='wrongpw'){
  $alert_title='Wrong Password ! ';
  $alert_message="You have entered Wrong Password, Click on forgot password to reset it.";
  $alert_bg='bg-red-200';
  $alert_fg='text-red-500';
}elseif($_SESSION['status']=='dupliuser'){
  $alert_title='Error ! ';
  $alert_message="Duplicate user dected.";
  $alert_bg='bg-red-200';
  $alert_fg='text-red-500';
}elseif($_SESSION['status']=='wrongway'){
  $alert_title='Wait ? ';
  $alert_message="You can't Cheat us !";
  $alert_bg='bg-red-200';
  $alert_fg='text-red-500';
}
echo <<<EOL
<div id="alertwarn"  class="bg-opacity-70 m-auto md:w-3/5 bg-white my-2 rounded-lg px-4 $alert_bg">
<div class="flex items-center py-4 justify-evenly">
<div class="leavethis $alert_fg  logoalert">
$alert_logo
</div>
<div class="leavethis ml-5">
        <h1 class="text-lg font-bold $alert_fg">$alert_title</h1>
        <p class="$alert_fg my-0">$alert_message</p>
    </div>
    <div>
        <button type="button"  onClick="hide('alertwarn')"  class="leavethis $alert_fg">
            <span class="text-2xl">&times;</span>
        </button>
    </div>
</div>
</div>
EOL;
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
            <input name="lpass" type="password" placeholder="Password" required>
          </div>
          <div class="pass-link">
            <a href="#">Forgot password?</a>
          </div>
          <div class="field btn">
            <div class="btn-layer">
            </div>
            <input name="lsubmit" type="submit" value="Login">
          </div>
          <div class="signup-link">
            Not a member?<a href=""> Signup now</a></div>
        </form>
        <form action="#" class="signup">
        <div class="field">
            <input type="text" placeholder="Name" required>
          </div>
          <div class="field">
            <input type="text" placeholder="Email Address" required>
          </div>

          <div class="field">
            <input type="password" placeholder="Password" required>
          </div>
          <div class="field">
            <input type="password" placeholder="Confirm password" required>
          </div>
          <div class="field btn">
            <div class="btn-layer">
            </div>
            <input type="submit" value="Signup">
          </div>
          <div class="login-link">
            Already a member?<a href=""> Login now</a></div>
        </form>
      </div>
    </div>
  </div>
  <br>
  <?php include('footer.html'); ?>

  <script>
    const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.signup");
    const signupLink = document.querySelector("form .signup-link a");
    const loginLink = document.querySelector("form .login-link a");
    signupBtn.onclick = (() => {
      loginForm.style.marginLeft = "-50%";
      loginText.style.marginLeft = "-50%";
    });
    loginBtn.onclick = (() => {
      loginForm.style.marginLeft = "0%";
      loginText.style.marginLeft = "0%";
    });
    signupLink.onclick = (() => {
      signupBtn.click();
      return false;
    });
    loginLink.onclick = (() => {
      loginBtn.click();
      return false;
    });
  </script>


<script src="js/message.js">
  </script>


</body>
<html>