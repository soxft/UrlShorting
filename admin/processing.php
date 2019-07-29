<?php
require_once('header.php');
require_once('../app/time.php');
$type = $_GET['type'];
$shorturl = $_GET['shorturl'];
$ip = $_GET['ip'];
$content = $_GET['content'];
$from=$_GET['from'];
if ($type == "del") {
    $comd1 = "delete from `information` WHERE shorturl='$shorturl'";
    //确认账号所有者是否为admin
    $go = mysqli_query($conn,$comd1);
    echo("<center><h2>删除成功!</h2></center>");
    header("Refresh:1;url=\"./control.php\"");
} elseif ($type == "domain") {
    $comd = "SELECT * FROM `ban` WHERE content='$shorturl'";
    $count = mysqli_query($conn,$comd);
    $arr = mysqli_fetch_assoc($count);
    if (!empty($arr['type'])) {
        echo("<center><h2> 已存在,跳转中...</h2></center>");
        header("Refresh:1;url=\"./control.php\"");
    } else {
        $comd1 = "insert into `ban` values('domain','$shorturl','$time');";
        $go = mysqli_query($conn,$comd1);
        echo("<center><h2>添加成功!</h2></center>");
        header("Refresh:1;url=\"./control.php\"");
    }
} elseif ($type == "ip") {
    $comd1 = "SELECT * FROM `ban` WHERE content='$ip'";
    $count1 = mysqli_query($conn,$comd1);
    $arr1 = mysqli_fetch_assoc($count1);
    if (!empty($arr1['type'])) {
        echo("<center><h2> 已存在,跳转中...</h2></center>");
        header("Refresh:1;url=\"./control.php\"");
    } else {
        $comd1 = "insert into `ban` values('ip','$ip','$time');";
        $go = mysqli_query($conn,$comd1);
        echo("<center><h2>添加成功!</h2></center>");
        header("Refresh:1;url=\"./control.php\"");
    }
} elseif ($type == "cancel") {
    $comd1 = "delete from `ban` where `content`='$content';";
    $go = mysqli_query($conn,$comd1);
    echo("<center><h2>解BAN成功!</h2></center>");
    if($from == "ban"){
    header("Refresh:1;url=\"./ban.php\"");
    }elseif($from == "control"){
       header("Refresh:1;url=\"./control.php\"");
    }
} else {
    echo "<h1><center>ERROR!</center></h1>";
}
require_once('../footer.php');
?>