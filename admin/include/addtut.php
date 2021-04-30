<?php
session_start();
$con = mysqli_connect("localhost","root","","userdata");
if(isset($_POST['submit'])){
    $course = $_POST['course'];
    $ytid = $_POST['ytid'];
    $notes = $_POST['notes'];
    $apilink = "https://www.googleapis.com/youtube/v3/videos?id=$ytid&key=AIzaSyA8ljSq8FzLj93qoVhSQ-awHxcM7VSE_JE&part=snippet";
    $viddata = file_get_contents($apilink);
    $vdata = json_decode($viddata, true)['items'][0]['snippet']  ;
	$ytitle = mysqli_real_escape_string($con ,$vdata['title']);
    $ydesc = mysqli_real_escape_string($con ,$vdata['description']);
    $ypubat = $vdata['publishedAt'];
    $yimg = $vdata['thumbnails']['standard']['url'];
    $sqlupdateq = "INSERT INTO `video`(`vcourse`, `vytid`, `vnotes`, `ytitle`, `ydesc`, `ypubat`, `yimg`) VALUES ('$course','$ytid','$notes','$ytitle','$ydesc','$ypubat','$yimg')";
    $query = mysqli_query($con,$sqlupdateq);
    $_SESSION['tutadd']="sucess";
    header('location:/admin/?s=addcode');
}

?>