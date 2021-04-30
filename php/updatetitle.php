<?php
$con = mysqli_connect("localhost","root","","userdata");
// Check connection
if (mysqli_connect_errno()) {
}else{
    $sqlnullvid = "SELECT vytid FROM `video` WHERE vtitle is NULL OR vtitle='';";
    $nullresult = mysqli_query($con,$sqlnullvid);
    $videos = mysqli_fetch_all($nullresult);
    foreach($videos as $vid){
        try{
            $viddata = file_get_contents("https://youtube.com/oembed?url=https://www.youtube.com/watch?v=$vid[0]&format=json");
            $vtitleu = json_decode($viddata, true)['title'];
            $sqlupdateq = "UPDATE `video` SET `vtitle`='$vtitleu' WHERE `vytid`='$vid[0]'";
        }
        catch(Exception $e){
            $sqlupdateq = "UPDATE `video` SET `vtitle`=NULL WHERE `vytid`='$vid[0]'";
        }
            // $json_data = json_decode($viddata, true);
            mysqli_query($con,$sqlupdateq);
    }
}
?>