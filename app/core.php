<?php
/*
  网址缩短核心服务
  Powered by xcsoft
  版权所有,盗版必究
  时间2020/02/24
  Version:1.7.0
*/
require_once('./config.php');
require_once('./app/record.php');
require_once('./app/time.php');
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
  //网址域名
  global $time;
  //时间
  @$check1 = "SELECT *FROM `ban` where `content`='$ip';";
  @$count1 = mysqli_query($conn,$check1);
  @$arr1 = mysqli_fetch_assoc($count1);
  if (!empty($arr1)) {
    //检索用户ip或短域是否被封禁
    return array(1002);
    exit();
  }
  if (empty($content)) {
    //检测是否有输入
    return array(1001);
    exit();
  }
  //判断正式开始
  if ($type == "shorturl") {
    //判断为短域
    if (!preg_match('#(http|https)://(.*\.)?.*\..*#i',$content) || strlen($content) > 1000 || strlen($content) < 10) {
      return array(1001);
      exit();
    }
    //网址真实性判断
    @$comd = "SELECT * FROM `information` WHERE `information`='$content' AND `type`='shorturl'";
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


    while (true) {
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
        exit();
      }
    }
  }

  if ($type == "passmessage") {
    //判断为密语
    if (strlen($content) > 3000 || strlen($content) < 3) {
      return array(1001);
      exit();
    }
    @$comd = "SELECT * FROM `information` WHERE `information`='$content' AND `type`='passmessage'";
    @$count = mysqli_query($conn,$comd);
    @$arr1 = mysqli_fetch_assoc($count);
    @$shorturl = $arr1['shorturl'];
    //如果已存在则
    if (!empty($shorturl)) {
      return array(200,$url . $shorturl);
      exit();
    }
    //如果不存在则
    //随机生成大小写字母


    while (true) {
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
      }
    }
  }
}
