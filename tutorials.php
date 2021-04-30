<?php
session_start();
include('php/whichbtn.php');
$con = mysqli_connect("localhost","root","","userdata");
require("php/showvideo.php");
$videoperpage
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Tutorials | CodeWorld</title>
    <meta name="description" content="Official website of Code World.Get All video code information programs and Projects.">
    <meta name="author" content="Code World">
    <link rel="stylesheet" href="css/style.css">

    <link href="css/tstyle.css" rel="stylesheet">
    <style>
        #tutorials {
            text-shadow: 0 0 2px #fff;
            background-color: #bababa;
            padding: 5px 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php include('header.html'); ?>
    <br>
    <?php
    if(isset($_GET['query'])){
        $query = $_GET['query'];
        $datagetquery = "SELECT * FROM `video` where `ytitle` LIKE '%$query%' ORDER BY `vid`";
        $vresult = mysqli_query($con,$datagetquery);
        $vdata = mysqli_fetch_all($vresult,MYSQLI_ASSOC);
        foreach($vdata as $video){
            showvideo($video['vytid'],$con);
        }
    }elseif(isset($_GET['course'])){
        $course = $_GET['course'];
        $datagetquery = "SELECT * FROM `video` where `vcourse`='$course' ORDER BY `vid`";
        $vresult = mysqli_query($con,$datagetquery);
        $vdata = mysqli_fetch_all($vresult,MYSQLI_ASSOC);
        foreach($vdata as $video){
            showvideo($video['vytid'],$con);
        }
    }else{
        $datagetquery = "SELECT * FROM `video` ORDER BY `vid`";
        $vresult = mysqli_query($con,$datagetquery);
        $vdata = mysqli_fetch_all($vresult,MYSQLI_ASSOC);
        foreach($vdata as $video){
            showvideo($video['vytid'],$con);
        }
    }
    // echo $_GET['query'];
    ?>
    <br>
    <?php include('footer.html'); ?>
</body>
<html>