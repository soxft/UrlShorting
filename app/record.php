<?php
include('./config.php');
include('./app/ip.php');
include('./app/time.php');
function access($shorturl,$domain,$type){
global $conn;
global $ip;
global $time;
$access="insert into access values('$shorturl','$domain','$type','$ip','$time');";
$go=mysqli_query($conn,$access);
}
?>