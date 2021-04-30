<?php
session_start();

include('php/whichbtn.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Profile | CodeWorld</title>
    <meta name="description" content="Official website of Code World.Get All video code information programs and Projects.">
    <meta name="author" content="Code World">
    <link rel="stylesheet" href="css/style.css">
    <link href="css/tstyle.css" rel="stylesheet">
    <link rel="stylesheet" href="css/editpstyle.css">
    <style>
        .btndiv {
            justify-content: center;
            display: flex;
        }
    </style>
</head>

<body>
    <?php include('header.html'); ?>
    <br>
        <?php
        $showdiv=false;
        if(isset($_SESSION['pustatus'])){
            if($_SESSION['pustatus']=='sucess'){
                $alert_title = 'Sucess';
                $alert_message = "You have sucessfully Updated Profile.";
                $alert_bg = 'bg-green-200';
                $showdiv=true;
                $alert_fg = 'text-green-500';
                $alert_logo = '<svg class="svg-inline--fa fa-exclamation-circle fa-w-16 rounded-full fill-current text-4xl" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 650 650" data-fa-i2svg="">
                <path fill="currentColor" d="M562,396c0-141.4-114.6-256-256-256S50,254.6,50,396s114.6,256,256,256S562,537.4,562,396L562,396z    M501.7,296.3l-241,241l0,0l-17.2,17.2L110.3,421.3l58.8-58.8l74.5,74.5l199.4-199.4L501.7,296.3L501.7,296.3z"></path></svg>';
            }elseif($_SESSION['pustatus']=='confail' && $_GET['action']=='edit'){
                $alert_title = 'Sorry ! ';
                $alert_message = "Can't Connect to server now.";
                $alert_bg = 'bg-yellow-200';
                $showdiv=true;
                $alert_fg = 'text-yellow-600';
                $alert_logo = '<svg class="svg-inline--fa fa-exclamation-circle fa-w-16 rounded-full fill-current text-4xl" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>';
            }elseif($_SESSION['pustatus']=='emailother' && $_GET['action']=='edit'){
                $alert_title = 'Error ! ';
                $alert_message = "This email is linked with another account.";
                $alert_bg = 'bg-red-200';
                $showdiv=true;
                $alert_fg = 'text-red-500';
                $alert_logo = '<svg class="svg-inline--fa fa-exclamation-circle fa-w-16 rounded-full fill-current text-4xl" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>';
            }elseif($_SESSION['pustatus']=='wrongway' && $_GET['action']=='edit'){
                $alert_title = 'Wait ? ';
                $alert_message = "You can't Cheat us !";
                $alert_bg = 'bg-red-200';
                $showdiv=true;
                $alert_fg = 'text-red-500';
                $alert_logo = '<svg class="svg-inline--fa fa-exclamation-circle fa-w-16 rounded-full fill-current text-4xl" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>';
            }
        }
        if(isset($_SESSION['pwstatus'])){
            if($_SESSION['pwstatus']=='sucess'){
                $alert_title = 'Sucess';
                $alert_message = "You have sucessfully Updated Password.";
                $alert_bg = 'bg-green-200';
                $showdiv=true;
                $alert_fg = 'text-green-500';
                $alert_logo = '<svg class="svg-inline--fa fa-exclamation-circle fa-w-16 rounded-full fill-current text-4xl" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 650 650" data-fa-i2svg="">
                <path fill="currentColor" d="M562,396c0-141.4-114.6-256-256-256S50,254.6,50,396s114.6,256,256,256S562,537.4,562,396L562,396z    M501.7,296.3l-241,241l0,0l-17.2,17.2L110.3,421.3l58.8-58.8l74.5,74.5l199.4-199.4L501.7,296.3L501.7,296.3z"></path></svg>';
            }elseif($_SESSION['pwstatus']=='wrongway' && $_GET['action']=='updatepass'){
                $alert_title = 'Wait ? ';
                $alert_message = "You can't Cheat us !";
                $alert_bg = 'bg-red-200';
                $showdiv=true;
                $alert_fg = 'text-red-500';
                $alert_logo = '<svg class="svg-inline--fa fa-exclamation-circle fa-w-16 rounded-full fill-current text-4xl" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>';
            }elseif($_SESSION['pwstatus']=='wrongpass' && $_GET['action']=='updatepass'){
                $alert_title = 'Error';
                $alert_message = "Your old password is wrong !";
                $alert_bg = 'bg-red-200';
                $showdiv=true;
                $alert_fg = 'text-red-500';
                $alert_logo = '<svg class="svg-inline--fa fa-exclamation-circle fa-w-16 rounded-full fill-current text-4xl" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>';
            }elseif($_SESSION['pwstatus']=='nomatch' && $_GET['action']=='updatepass'){
                $alert_title = 'Error';
                $alert_message = "Your New password and Conferm new password didn't match !";
                $alert_bg = 'bg-red-200';
                $showdiv=true;
                $alert_fg = 'text-red-500';
                $alert_logo = '<svg class="svg-inline--fa fa-exclamation-circle fa-w-16 rounded-full fill-current text-4xl" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zm-248 50c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path></svg>';
            }
        }
        unset($_SESSION['pustatus']);
        unset($_SESSION['pwstatus']);
        if($showdiv==true){
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

    <?php
    if (isset($_GET['action']) && isset($_SESSION['userid']) && $_GET['action'] == 'edit') {
    ?>
        <div class="flex justify-center h-80vh m-auto items-center">
            <div class='flex max-w-sm w-full h-auto justify-center bg-white shadow-md rounded-lg overflow-hidden mx-auto flex flex-col p-5'>
                <h3 class="text-2xl font-bold mb-4">Edit Profile</h3>
                <!-- This is the input component -->
                <form action="updateprofile.php" method="POST">
                    <div class="relative h-10 input-component mb-5 flex">
                        <input disabled id="name" type="text" name="name" value="<?= $_SESSION['name'] ?>" class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm" />
                        <label for="name" class="absolute left-2 transition-all bg-white px-1">
                            Name
                        </label>
                        <div onclick="enableinput('name')" class=" edit w-1/12 p-1 m-1">
                            <svg class="text-blue-500" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <g>
                                    <path d="M495.807,66.962L444.696,15.85c-21.136-21.134-55.53-21.134-76.666,0.001l-29.815,29.815L31.926,351.956L0.341,512 l159.396-32.304l336.069-336.069C516.943,122.49,516.943,88.099,495.807,66.962z M338.215,96.776l25.557,25.556l-264.07,264.07 l-25.557-25.555L338.215,96.776z M46.294,465.811l13.468-68.239l54.471,54.471L46.294,465.811z M150.812,437.512l-25.555-25.555 l264.07-264.07l25.555,25.555L150.812,437.512z M470.252,118.072l-29.815,29.815L363.77,71.221l29.813-29.814 c7.05-7.047,18.514-7.045,25.559-0.001l51.11,51.111C477.296,99.562,477.296,111.027,470.252,118.072z" />
                                </g>
                            </svg>

                        </div>
                    </div>
                    <!-- This is the input component -->
                    <div class="relative h-10 input-component mb-5 flex">
                        <input disabled id="email" type="email" name="email" value="<?= $_SESSION['email'] ?>" class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm" />
                        <label for="email" class="absolute left-2 transition-all bg-white px-1">
                            E-mail
                        </label>
                        <div onclick="enableinput('email')" class=" edit w-1/12 p-1 m-1">
                            <svg class="text-blue-500" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <g>
                                    <path d="M495.807,66.962L444.696,15.85c-21.136-21.134-55.53-21.134-76.666,0.001l-29.815,29.815L31.926,351.956L0.341,512 l159.396-32.304l336.069-336.069C516.943,122.49,516.943,88.099,495.807,66.962z M338.215,96.776l25.557,25.556l-264.07,264.07 l-25.557-25.555L338.215,96.776z M46.294,465.811l13.468-68.239l54.471,54.471L46.294,465.811z M150.812,437.512l-25.555-25.555 l264.07-264.07l25.555,25.555L150.812,437.512z M470.252,118.072l-29.815,29.815L363.77,71.221l29.813-29.814 c7.05-7.047,18.514-7.045,25.559-0.001l51.11,51.111C477.296,99.562,477.296,111.027,470.252,118.072z" />
                                </g>
                            </svg>

                        </div>
                    </div>
                    <!-- This is the input component -->
                    <div onclick="makeblue()" class="flex relative h-10 input-component empty">
                        <select disabled name="gender" id="gender" type="text" class="h-full w-full border border-gray-300 px-2 transition-all rounded-sm">
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                            <option value="N">Prefer not to Say</option>
                        </select>
                        <!-- <input id="address" type="text" class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm" /> -->
                        <label id='genderlabel' for="gender" class="absolute text-gray-600 left-2 transition-all bg-white px-1">
                            Gender
                        </label>
                        <div onclick="enableinput('gender')" class=" edit w-1/12 p-1 m-1">
                            <svg class="text-blue-500" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <g>
                                    <path d="M495.807,66.962L444.696,15.85c-21.136-21.134-55.53-21.134-76.666,0.001l-29.815,29.815L31.926,351.956L0.341,512 l159.396-32.304l336.069-336.069C516.943,122.49,516.943,88.099,495.807,66.962z M338.215,96.776l25.557,25.556l-264.07,264.07 l-25.557-25.555L338.215,96.776z M46.294,465.811l13.468-68.239l54.471,54.471L46.294,465.811z M150.812,437.512l-25.555-25.555 l264.07-264.07l25.555,25.555L150.812,437.512z M470.252,118.072l-29.815,29.815L363.77,71.221l29.813-29.814 c7.05-7.047,18.514-7.045,25.559-0.001l51.11,51.111C477.296,99.562,477.296,111.027,470.252,118.072z" />
                                </g>
                            </svg>

                        </div>
                    </div>


                    <div class="justify-between content-between p-5 w-full flex">
                        <button onclick="enableall()" type="submit" class="bg-blue-900 submitbtn hover:bg-blue-500 text-white font-bold py-2 px-4 rounded">Update</button>
                        <a href="/profile.php?action=updatepass" class="bg-blue-900 submitbtn hover:bg-blue-500 text-white font-bold py-2 px-4 rounded">Update Password</a>
                    </div>


                </form>
            </div>
        </div>
        <script>
            function enableinput(inputid) {
                ein = document.getElementById(inputid);
                ein.removeAttribute('disabled');
            }

            function enableall() {
                enableinput('name');
                enableinput('email');
                enableinput('gender');
            }
        </script>
        <script type="text/javascript" src="js/editprofile.js"></script>
        <script src="js/validation.js"></script>
    <?php
    } elseif (isset($_GET['action']) && isset($_SESSION['userid']) && $_GET['action'] == 'updatepass') {
    ?>
        <div class="flex justify-center h-80vh m-auto items-center">
            <div class='flex max-w-sm w-full h-auto justify-center bg-white shadow-md rounded-lg overflow-hidden mx-auto flex flex-col p-5'>
                <h3 class="text-2xl font-bold mb-4">Update Password</h3>
                <!-- This is the input component -->
                <form action="updatepass.php" method="POST">
                    <div class="relative h-10 input-component mb-5 field flex" id="passolddiv">
                        <input id="passold" onkeyup="checkpass('passold','mpassold','passolddiv')" type="password" name="passold" class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm" />
                        <label for="passold" class="absolute left-2 transition-all bg-white px-1">
                            Current Password
                        </label>
                        <span class="m-2 align-middle	tooltip" id='mpassold'></span>
                        
                    </div>
                    <!-- This is the input component -->
                    <div class="relative h-10 input-component mb-5 field flex" id='passnewdiv'>
                        <input id="passnew" onkeyup="checkpass('passnew','mpassnew','passnewdiv')" type="password" name="passnew" class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm" />
                        <label for="passnew" class="absolute left-2 transition-all bg-white px-1">
                            New Password
                        </label>
                        <span class="m-2 align-middle tooltip" id='mpassnew'></span>
                        
                    </div>
                    <div class="relative h-10 input-component mb-5 field flex" id='passnewcdiv'>
                        <input id="passnewc" onkeyup=check() type="password" name="passnewc" class="h-full w-full border-gray-300 px-2 transition-all border-blue rounded-sm" />
                        <label for="passnewc" class="absolute left-2 transition-all bg-white px-1">
                            Conform New Password
                        </label>
                        <span class="m-2 align-middle	tooltip" id='matchmessage'></span>
                        
                    </div>
                    

                    <div class=" p-5 w-full btndiv">
                        <button id='submit' type="submit" class="bg-blue-900 submitbtn hover:bg-blue-500 text-white font-bold py-2 px-4 rounded">Update Password</button>
                    </div>


                </form>
            </div>
        </div>
    <?php
    } elseif (isset($_SESSION['userid'])) {
    ?>
        <div class="flex items-center h-screen w-full justify-center">

            <div class="max-w-xl w-1/5">
                <div class="bg-white shadow-xl rounded-lg py-3">
                    <div class="photo-wrapper p-2">
                        <?php
                        // echo $_SESSION['gender'];
                        // echo $_SESSION['tstamp'];
                        if ($_SESSION['gender'] == 'M') {
                            echo '<img class="w-32 h-32 rounded-full mx-auto" src="images/male.svg" alt="IMG">';
                        } elseif ($_SESSION['gender'] == 'F') {
                            echo '<img class="w-32 h-32 rounded-full mx-auto" src="images/female.svg" alt="IMG">';
                        } else {
                            echo '<img class="w-32 h-32 rounded-full mx-auto" src="images/other.svg" alt="IMG">';
                        }
                        ?>

                    </div>
                    <div class="p-2">
                        <h3 class="text-center text-xl text-gray-900 font-medium leading-8"><?= $_SESSION['name'] ?></h3>
                        <div class="text-center text-gray-400 text-xs font-semibold">
                            <p></p>
                        </div>
                        <table class="text-xs my-3">
                            <tbody>
                                <tr>
                                    <td class="px-2 py-2 text-gray-500 font-semibold">Email Address</td>
                                    <td class="px-2 py-2"><?= $_SESSION['email'] ?></td>
                                </tr>
                                <tr>
                                    <td class="px-2 py-2 text-gray-500 font-semibold">Gender</td>
                                    <td class="px-2 py-2"><?php if($_SESSION['gender']=='M'){echo 'Male';}elseif($_SESSION['gender']=='F'){echo 'Female';}else{echo 'Not Decalered';} ?></td>
                                </tr>
                                <!-- <tr>
                    <td class="px-2 py-2 text-gray-500 font-semibold"></td>
                    <td class="px-2 py-2"></td>
                </tr> -->
                                <tr>
                                    <td class="px-2 py-2 text-gray-500 font-semibold">Joined On</td>
                                    <td class="px-2 py-2"><?= $_SESSION['tstamp'] ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="text-center my-3 flex w-full justify-evenly ">
                            <a class="text-xs text-indigo-500 italic hover:underline hover:text-indigo-600 font-medium float-left" href="/profile.php?action=edit">Edit Profile</a>
                            <a class="text-xs text-indigo-500 italic hover:underline hover:text-indigo-600 font-medium float-left" href="/profile.php?action=updatepass">Update Password</a>
                        </div>

                    </div>
                </div>
            </div>

        </div>




    <?php
    } else {
        echo "<center><div class=\"m-auto font-bold text-3xl \"><h1>Please <a href='/login.php' class='text-blue-500'>Login</a> To access Profile Page.</h1></div></center>";
    }
    ?>
    <br>
    <?php include('footer.html'); ?>
</body>
<html>