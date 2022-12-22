<?php
session_start();
include('db.php');

// $con = mysqli_connect("localhost","root","","userdata");
if(!$con){
    $_SESSION['loginstatus']="connfail";
    header("location:/admin/login.php");
    exit();
}
if(isset($_POST['user'])){
    $user = $_POST['user'];
    $pass=$_POST['pass'];

    $query = "SELECT * FROM `admin` WHERE `user`='$user';";
    $run = mysqli_query($con,$query);
    $data = mysqli_fetch_assoc($run);
    if ($pass==$data['pass']){
        $_SESSION['loginstatus']="sucess";
        $_SESSION['userid']=$data['id'];
        $_SESSION['user']=$data['user'];
        header("location:/admin/");
    }else{
        $_SESSION['loginstatus']="incorrect";
        header("location:/admin/login.php");
    }


}


?>