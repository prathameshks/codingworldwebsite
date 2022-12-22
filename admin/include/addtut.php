<?php
session_start();
include('db.php');

// $con = mysqli_connect("localhost","root","","userdata");
if(isset($_POST['submit'])){
    $course = $_POST['course'];
    $ytid = $_POST['ytid'];
    $notes = $_POST['notes'];
    $apilink = "https://www.googleapis.com/youtube/v3/videos?id=$ytid&key=AIzaSyAgsBYazhOVZq-ydDZizfjd5Vtjr9xPtPE&part=snippet";
    $viddata = file_get_contents($apilink);
    if (json_decode($viddata, true)['error']["code"]) {
        $ytitle = "Not Found";
        $ydesc = "Not Found";
        $ypubat = "0001-01-01T00:00:00Z";
        $yimg = "/admin/assets/img/error-404-monochrome.svg";
    }else {
        $vdata = json_decode($viddata, true)['items'][0]['snippet'] ;
        $ytitle = mysqli_real_escape_string($con ,$vdata['title']);
        $ydesc = mysqli_real_escape_string($con ,$vdata['description']);
        $ypubat = $vdata['publishedAt'];
        $yimg = $vdata['thumbnails']['standard']['url'];
    }
    $sqlupdateq = "INSERT INTO `video`(`vcourse`, `vytid`, `vnotes`, `ytitle`, `ydesc`, `ypubat`, `yimg`) VALUES ('$course','$ytid','$notes','$ytitle','$ydesc','$ypubat','$yimg')";
    $query = mysqli_query($con,$sqlupdateq);
    $_SESSION['tutadd']="sucess";
    header('location:/admin/?s=addcode');
}

?>