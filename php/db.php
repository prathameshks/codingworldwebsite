<?php
// Connection to MySQL server without database name.
$con = new mysqli('sql308.epizy.com', 'epiz_33223741', 'AJPbujk6tjBi8Q');

// Set the desired charset after establishing a connection
$con->set_charset('utf8mb4');


// FOR DATABASE
$databaseName = "epiz_33223741_localhost	";
$command = "SHOW DATABASES LIKE '{$databaseName}';";
$command2 = "CREATE DATABASE IF NOT EXISTS `{$databaseName}`;";

// Create database if not exists.
// echo $command;
$query = mysqli_query($con, $command);
$result = mysqli_num_rows($query);

if($result <=0){
$create = mysqli_query($con, $command2);
//echo "Database created successifully";
}

// USE DATABASE
mysqli_select_db($con, $databaseName);


//FOR ADMIN TABLE
$query = mysqli_query($con, "SHOW TABLES LIKE 'admin'");
$result = mysqli_num_rows($query);

if($result <=0){
$create = mysqli_query($con, "CREATE TABLE IF NOT EXISTS `admin` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user` varchar(30) NOT NULL,
    `pass` varchar(20) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
  ");
//echo "ADmin table created successifully";
}

//FOR ADMIN RECORD
$query = mysqli_query($con, "SELECT * FROM admin");
$result = mysqli_num_rows($query);

if($result <=0){
$create = mysqli_query($con, "INSERT INTO `admin` (`id`, `user`, `pass`) VALUES (1, 'admin@cw', 'admin');");
//echo "ADmin rec added successifully";
}


//for tables

//code table
mysqli_query($con, "CREATE TABLE IF NOT EXISTS `code` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `vid` int(11) NOT NULL,
    `code` text NOT NULL,
    `language` varchar(30) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
  ");

//comment
mysqli_query($con, "CREATE TABLE IF NOT EXISTS `comment` (
    `cid` int(11) NOT NULL AUTO_INCREMENT,
    `vid` int(11) NOT NULL,
    `userid` int(11) NOT NULL,
    `comment` text NOT NULL,
    `time` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`cid`)
  ) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
  ");

//user data
mysqli_query($con, "CREATE TABLE IF NOT EXISTS `userdata` (
    `userid` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `email` varchar(60) NOT NULL,
    `pass` varchar(60) NOT NULL,
    `usertype` int(11) NOT NULL DEFAULT 0,
    `gender` text DEFAULT 'N',
    `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`userid`),
    UNIQUE KEY `email` (`email`)
  ) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
  ");

//video table
mysqli_query($con, "CREATE TABLE IF NOT EXISTS `video` (
    `vid` int(11) NOT NULL AUTO_INCREMENT,
    `vcourse` varchar(100) NOT NULL,
    `vytid` varchar(100) NOT NULL,
    `vnotes` varchar(255) DEFAULT 'NULL',
    `vdate` datetime NOT NULL DEFAULT current_timestamp(),
    `ytitle` mediumtext DEFAULT NULL,
    `ydesc` mediumtext DEFAULT NULL,
    `ypubat` varchar(20) DEFAULT NULL,
    `yimg` varchar(100) DEFAULT NULL,
    `views` int(11) DEFAULT 0,
    PRIMARY KEY (`vid`)
  ) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
  ");

//commit
mysqli_query($con, "COMMIT;");

?>