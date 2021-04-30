<?php
session_start();
//$sql = "CREATE TABLE `userdata`.`userdata` ( `userid` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `email` VARCHAR(60) NOT NULL UNIQUE, `pass` VARCHAR(60) NOT NULL ,`usertype` INT NOT NULL DEFAULT 0, `timestamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`userid`)) ENGINE = InnoDB";
//userdata create  tabel code
//userdata insert
//$sql = "INSERT INTO `userdata`(`name`, `email`, `pass`, `usertype`) VALUES (\'admin_name\',\'admin@codeworld\',\'admin\',1)";

$con = mysqli_connect("localhost","root","","userdata");
// Check connection
if (mysqli_connect_errno()) {
  $_SESSION['fstatus']= "confail";
  header('location:login.php');
  exit();
}

if(isset($_POST['femail'])){
    //echo 'gotdata<br>';
    $femail=$_POST['femail'];
    $sqlcheck="SELECT * FROM `userdata` WHERE `email`='$femail'";
    $q1= mysqli_query($con,$sqlcheck);
    $nousers=mysqli_num_rows($q1);
    if($nousers==1){
        //echo 'oneuser ';
    $data= mysqli_fetch_row($q1);
    //echo $data[1];
    $fname=$_POST['fname'];
    $fpass=$_POST['fpassword'];
    if($fname==$data[1]){
        //echo 'name mathed ';
    $sqlrp = "UPDATE `userdata` SET `pass`='$fpass' WHERE `email`='$femail'";
    //echo $sqlrp;
    $query=mysqli_query($con,$sqlrp);
    //echo $query;
    $_SESSION['fstatus']= "fsucess";
    header('location:login.php');
    }else{
    $_SESSION['fstatus']= "wrongdetails";
    header('location:passwordreset.php');
}
    }else{
        $_SESSION['fstatus']= "wrongdetails";
        header('location:passwordreset.php');
}  
}else{
    $_SESSION['fstatus']= "wrongway";
    header('location:passwordreset.php');
    
}
