<?php
session_start();
include('db.php');

// $con=mysqli_connect("localhost","root","","userdata");
if(isset($_POST['submit'])){
    $vid=$_POST['vid'];
    $language=$_POST['language'];
    $code= mysqli_real_escape_string($con, $_POST['code']);
    $query = "INSERT INTO `code`(`vid`, `code`, `language`) VALUES ($vid,'$code','$language');";
    $result = mysqli_query($con,$query);
    $_SESSION['addcodes']="sucess";
    header('location:/admin/?s=addcode');

}


?>