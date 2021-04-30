<?php
session_start();
//$sql = "CREATE TABLE `userdata`.`userdata` ( `userid` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `email` VARCHAR(60) NOT NULL UNIQUE, `pass` VARCHAR(60) NOT NULL ,`usertype` INT NOT NULL DEFAULT 0, `timestamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`userid`)) ENGINE = InnoDB";
//userdata create  tabel code
//userdata insert
//$sql = "INSERT INTO `userdata`(`name`, `email`, `pass`, `usertype`) VALUES (\'admin_name\',\'admin@codeworld\',\'admin\',1)";

//CREATE TABLE `userdata`.`video` ( `vid` INT NOT NULL AUTO_INCREMENT , `vcourse` VARCHAR(100) NOT NULL , `vtitle` VARCHAR(100) NOT NULL , `vdesc` TEXT NOT NULL , `vdate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`vid`)) ENGINE = InnoDB;
//google api key AIzaSyA8ljSq8FzLj93qoVhSQ-awHxcM7VSE_JE
// https://www.googleapis.com/youtube/v3/videos?id=jwuDebBIUFg&key=AIzaSyA8ljSq8FzLj93qoVhSQ-awHxcM7VSE_JE&part=snippet
include('php/db.php');
// Check connection
if (mysqli_connect_errno()) {
  $_SESSION['status']= "confail";
  header('location:login.php');
  exit();
}
$_SESSION['openform']='login';
if(isset($_POST['lmail'])){
    $lmail= $_POST['lmail'];
    $lpass= $_POST['lpass'];
    $sql = "SELECT * FROM `userdata` WHERE `email`='$lmail';";
    // echo $sql;
    $query = mysqli_query($con,$sql);
    $numrow= mysqli_num_rows($query);
    if($numrow==0){
        $_SESSION['status']='nouser';
        header('location:login.php');
    }elseif($numrow==1){
        $data= mysqli_fetch_array($query);
        $pw= $data['pass'];
        // echo $data['gender'];
        if($lpass==$pw){
            $_SESSION['status']='loggedin';
            $_SESSION['userid']= $data['userid'];
            $_SESSION['name']= $data['name'];
            $_SESSION['email']= $data['email'];
            $_SESSION['pass']= $data['pass'];
            $_SESSION['usertype']= $data['usertype'];
            $_SESSION['gender']= $data['gender'];
            $_SESSION['tstamp']= $data['timestamp'];
            header('location:/');
        }else{
            $_SESSION['status']='wrongpw';
            header('location:login.php');
        }
    }else{
        $_SESSION['status']='dupliuser';
        header('location:login.php');
    } 
}else{
    $_SESSION['status']= "wrongway";
    header('location:login.php');
};

?>