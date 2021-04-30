<?php
session_start();

$con = mysqli_connect("localhost","root","","userdata");
// Check connection
if (mysqli_connect_errno()) {
  $_SESSION['pwstatus']= "confail";
  header('location:login.php');
  exit();
}

if(isset($_SESSION['userid']) && isset($_POST['passold'])){
    $oldpass = $_POST['passold'];
    $newpass = $_POST['passnew'];
    $cnewpass = $_POST['passnewc'];
    $userid= $_SESSION['userid'];
    if($oldpass==$_SESSION['pass']){
        if($newpass==$cnewpass){
            $sqlrp = "UPDATE `userdata` SET `pass`='$newpass' WHERE `userid`='$userid'";
            $query=mysqli_query($con,$sqlrp); 
            $_SESSION['pwstatus']= "sucess";
            header('location:profile.php');       
        }else{
            $_SESSION['pwstatus']= "nomatch";
            header('location:profile.php?action=updatepass');
        }
    }else{
        $_SESSION['pwstatus']= "wrongpass";
        header('location:profile.php?action=updatepass');
    }
   
}else{
    $_SESSION['pwstatus']= "wrongway";
    header('location:passwordreset.php');
    
}




?>