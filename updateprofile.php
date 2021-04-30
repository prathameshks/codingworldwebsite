<?php
session_start();
//$sql = "CREATE TABLE `userdata`.`userdata` ( `userid` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `email` VARCHAR(60) NOT NULL UNIQUE, `pass` VARCHAR(60) NOT NULL ,`usertype` INT NOT NULL DEFAULT 0, `timestamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`userid`)) ENGINE = InnoDB";
//userdata create  tabel code
//userdata insert
//$sql = "INSERT INTO `userdata`(`name`, `email`, `pass`, `usertype`) VALUES (\'admin_name\',\'admin@codeworld\',\'admin\',1)";

$con = mysqli_connect("localhost","root","","userdata");
// Check connection
if (mysqli_connect_errno()) {
  $_SESSION['pustatus']= "confail";
  header('location:profile.php?action=edit');
  exit();
}

if(isset($_SESSION['userid'])){
    //echo 'gotdata<br>';
    $email=$_POST['email'];
    $sqlcheck="SELECT * FROM `userdata` WHERE `email`='$email'";
    $q1= mysqli_query($con,$sqlcheck);
    $nousers=mysqli_num_rows($q1);
    if($nousers==1){
            //echo 'oneuser ';
        $userid= $_SESSION['userid'];
        //echo $data[1];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $gender=$_POST['gender'];
        $sqlrp = "UPDATE `userdata` SET `name`='$name',`email`='$email',`gender`='$gender' WHERE `userid`=$userid";
        echo $sqlrp;
        $qupdate = mysqli_query($con,$sqlrp);
        $_SESSION['pustatus']= "sucess";
        header('location:profile.php');
        
    }else{
        $_SESSION['pustatus']= "emailother";
        header('location:profile.php?action=edit');
}  
}else{
    $_SESSION['pustatus']= "wrongway";
    header('location:profile.php?action=edit');
    
}
