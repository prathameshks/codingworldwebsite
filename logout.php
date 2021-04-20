<?php
session_start();
session_destroy();
session_start();
$_SESSION['messagefresh']='out';
header('location:/');

?>
