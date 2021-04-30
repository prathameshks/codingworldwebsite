<?php
include('db.php');
$vid = $_POST['vid'];
$userid = $_POST['userid'];
$cmt =mysqli_real_escape_string($con, $_POST['cmt']);

$query="INSERT INTO `comment`( `vid`, `userid`, `comment`) VALUES ($vid,$userid,'$cmt')";
$run = mysqli_query($con , $query);
header("location:/post.php?vid=$vid");
?>