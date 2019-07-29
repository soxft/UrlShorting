<?php
/*
  网址缩短核心服务
  Powered by xcsoft
  版权所有,盗版必究
*/
require_once('./app/record.php');
require_once('./app/time.php');
require_once('./config.php');
require_once('./app/ip.php');
function Urlshorting($content,$type) {
  global $ip;
  //ip
  global $conn;
  //数据库
  global $strPol;
  //短网址包含内容
  global $pass;
  //短网址长度
  global $url;
  //短网址域名
  global $time;
  //时间
  @$check1 = "SELECT *FROM `ban` where `content`='$ip';";
  @$count1 = mysqli_query($conn,$check1);
  @$arr1 = mysqli_fetch_assoc($count1);
  @$typex = $arr1['type'];
  @$check2 = "SELECT *FROM `ban` where `content`='$content';";
  @$count2 = mysqli_query($conn,$check2);
  @$arr2 = mysqli_fetch_assoc($count2);
  @$typex2 = $arr2['type'];
  if (!empty($typex) || !empty($typex2)) {
    //检索用户ip是否被封禁
    return array(1003);
    exit;
  }
  if (empty($content)) {
    //检测是否有输入
    return array(1001);
    exit;
  }
  //判断正式开始
  if ($type == "shorturl") {
    //判断为短域
    //判断是包含http://或https://
    if (strpos($content,'http://') !== false) {} elseif (strpos($content,'https://') !== false) {} else {
      $content = 'http://' . $content;
      //如果没有则手动给加上
    }
    if (strlen($content) > 500 || strlen($content) < 10) {
      return array(1002);
      exit;
    }
    @$comd = "SELECT * FROM `information` WHERE `information`='$content'";
    @$count = mysqli_query($conn,$comd);
    @$arr1 = mysqli_fetch_assoc($count);
    @$shorturl = $arr1['shorturl'];
    //如果已存在则
    if (!empty($shorturl)) {
      return array(200,$url . $shorturl);
      exit;
    }
    //如果不存在则
    //随机生成大小写字母
    rese:
    $shorturl = null;
    $max = strlen($strPol)-1;
    for ($i = 0;$i < $pass;$i++) {
      $shorturl.= $strPol[rand(0,$max)];
    }
    //检测随机生成的是否有重复
    @$comd1 = "SELECT * FROM `information` WHERE shorturl='$shorturl'";
    @$count1 = mysqli_query($conn,$comd1);
    @$arr2 = mysqli_fetch_assoc($count1);
    @$content1 = $arr2['information'];
    if (empty($content1)) {
      $comd1 = "insert into `information` values('$content','$shorturl','shorturl','$time','$ip');";
      $go = mysqli_query($conn,$comd1);
      return array(200,$url . $shorturl);
      exit;
    } else {
      goto rese;
  }
  }

  if ($type == "passmessage") {
    //判断为密语
    if (strlen($content) > 900 || strlen($content) < 3) {
      return array(1002);
      exit;
    }
    @$comd = "SELECT * FROM `information` WHERE `information`='$content'";
    @$count = mysqli_query($conn,$comd);
    @$arr1 = mysqli_fetch_assoc($count);
    @$shorturl = $arr1['shorturl'];
    //如果已存在则
    if (!empty($shorturl)) {
      return array(200,$url . $shorturl);
      exit;
    }
    //如果不存在则
    //随机生成大小写字母
    rese2:   //安全起见判断是否有重复短域名id
    $shorturl = null;
    $max = strlen($strPol)-1;
    for ($i = 0;$i < $pass;$i++) {
      $shorturl.= $strPol[rand(0,$max)];
    }
    //检测随机生成的是否有重复
    @$comd1 = "SELECT * FROM `information` WHERE shorturl='$shorturl'";
    @$count1 = mysqli_query($conn,$comd1);
    @$arr2 = mysqli_fetch_assoc($count1);
    @$information = $arr2['information'];
    if (empty($information)) {
      $comd1 = "insert into `information` values('$content','$shorturl','passmessage','$time','$ip');";
      $go = mysqli_query($conn,$comd1);
      return array(200,$url . $shorturl);
      exit;
    } else {
      goto rese2;
    }
  }
}