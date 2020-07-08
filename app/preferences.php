<?php
require_once("../config.php");
header('Content-type:text/json');
header('Access-Control-Allow-Origin:*');
session_start();
$pass = $_GET['password'];
if(md5($_SESSION['password']) !== $pass)
{
  $json = [
      'code' => '1001',
      'msg' => '非法的访问'
    ];
  exit(json_encode($json,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
}
$method = $_GET['method'];
$content = $_GET['content'];
$status = $_GET['status'];
switch ($method) {
  case "get":
    $QQ = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `config` WHERE `type` = 'QQ'"));
    $wechat = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `config` WHERE `type` = 'wechat'"));
    $jump = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `config` WHERE `type` = 'jump'")); //跳转时域名检测页面
    $json = [
      'code' => '200',
      'result' => [
        "QQ" => $QQ['content'],
        "wechat" => $wechat['content'],
        "jump" => $jump['content']
        ]
    ];
    exit(json_encode($json,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
    //原获取数据用，现已废弃
    break;
  case "set":
    mysqli_query($conn,"UPDATE `config` SET `content`='$status' WHERE `type` = '$content'");
    $json = [
      'code' => '200'
    ];
    exit(json_encode($json,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
  break;
}
//设置协议头