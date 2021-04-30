<?php
$con = mysqli_connect("localhost", "root", "", "userdata");
$old = "<div id=\"just-line-break\"></div>

<br/>

<div id=\"line-break-and-tab\"></div>";

$code = mysqli_real_escape_string($con,$old);

$q="UPDATE video SET vcode='$code' where vid=6";
$run =mysqli_query($con,$q);


?>