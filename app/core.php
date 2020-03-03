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
        $patern = '/^http[s]?:\/\/'.  
        '(([0-9]{1,3}\.){3}[0-9]{1,3}'.             // IP形式的URL- 199.194.52.184  
        '|'.                                        // 允许IP和DOMAIN（域名）  
        '([0-9a-z_!~*\'()-]+\.)*'.                  // 三级域验证- www.  
        '([0-9a-z][0-9a-z-]{0,61})?[0-9a-z]\.'.     // 二级域验证  
        '[a-z]{2,6})'.                              // 顶级域验证.com or .museum  
        '(:[0-9]{1,4})?'.                           // 端口- :80  
        '((\/\?)|'.                                 // 如果含有文件对文件部分进行校验  
        '(\/[0-9a-zA-Z_!~\*\'\(\)\.;\?:@&=\+\$,%#-\/]*)?)$/';
        
    if (!preg_match($patern,$content) || strlen($content) > 1000 || strlen($content) < 10) {
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