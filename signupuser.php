<?php
session_start();
//$sql = "CREATE TABLE `userdata`.`userdata` ( `userid` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `email` VARCHAR(60) NOT NULL UNIQUE, `pass` VARCHAR(60) NOT NULL ,`usertype` INT NOT NULL DEFAULT 0, `timestamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`userid`)) ENGINE = InnoDB";
//userdata create  tabel code
//userdata insert
//$sql = "INSERT INTO `userdata`(`name`, `email`, `pass`, `usertype`) VALUES (\'admin_name\',\'admin@codeworld\',\'admin\',1)";

$con = mysqli_connect("localhost","root","","userdata");
// Check connection
if (mysqli_connect_errno()) {
  $_SESSION['supstatus']= "confail";
  header('location:login.php');
  exit();
}

if(isset($_POST['semail'])){
    $semail=$_POST['semail'];

    $sqlcheck="SELECT * FROM `userdata` WHERE `email`='$semail'";
    $q1= mysqli_query($con,$sqlcheck);
    $nousers=mysqli_num_rows($q1);
    if($nousers==0){
    $sname=$_POST['sname'];
    $spass=$_POST['spassword'];
    $sqlinsert = "INSERT INTO `userdata`(`name`, `email`, `pass`) VALUES ('$sname','$semail','$spass')";
    $query=mysqli_query($con,$sqlinsert);
    $_SESSION['supstatus']= "signupsucess";
    header('location:login.php');
}else{
    $_SESSION['supstatus']= "alreadyuser";
    
    header('location:login.php');
}  
}else{
    $_SESSION['supstatus']= "wrongway";
    header('location:login.php');
}
?>