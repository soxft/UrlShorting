<?php
/*
  第三方登录回调地址
*/
  require_once "../config.php";
  define('CLIENT_ID','8us3lhiuyiOlyT3KitpWvtIwGindm5');
  session_start();
  $code = $_GET['code'];
  if(empty($code))
  {
    echo "<h2>非法访问</h2>";
    header("Refresh:2;URL='../admin/login.php'");
  }
  
  $arr = json_decode(file_get_contents('https://oauth.xsot.cn/api/token.php?code='. $code . "&client_id=".CLIENT_ID),true);

  if($arr['code'] == '200')
  {
    $url = 'https://oauth.xsot.cn/api/resourse.php?access_token=' . $arr['access_token'];
    $return = json_decode(file_get_contents($url),true);
    $username = $return['username']; 
    $arr = explode(",",mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `config` WHERE type='xoauth'"))['content']);
    if(empty($arr[0]))
    {
      //防止数据为空的问题
      $arr = array();
    }
    if(array_search($username,$arr) !== false){
      //已有存在的用户
      $_SESSION['password'] = $passwd;
      header("Refresh:0;URL='../admin'");
    } else {
      echo "<h2>未知的用户,请先在后台->第三方登录添加该用户!</h2>";
      header("Refresh:2;URL='../admin/login.php'");
    }
  } else{
    echo "<h2>出现未知错误!错误代码:" . $arr['code']."</h2>";
    header("Refresh:2;URL='../admin/login.php'");
  }