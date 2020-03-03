<?php
require_once "./app/core.php";                         //require网址缩短核心文件
require_once "./app/qrcode.php";
//获取用户的ip
$domain = $_POST['d'];
$passmessage = $_POST['m'];
//替换原网址中的&&防止出错
if(empty($domain)&&empty($passmessage)){
    $data = array(
    'code' => '1001'
  );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
  exit;
}

if(empty($passmessage)&&!empty($domain)){         //如果判断为短域
$arr=Urlshorting($domain,"shorturl");
if($arr[0]!==200){
  $data = array(
    'code' => $arr[0]
  );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
  exit;
}elseif($arr[0]==200){
  $data = array(
    'code' => '200',
    'shorturl'=> $arr[1],
    'qrcode' => qrcode($arr[1])
  );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
  exit;
}
}  
if(!empty($passmessage)&&empty($domain)){          //如果判断为密语
$arr=Urlshorting($passmessage,"passmessage");
if($arr[0]!==200){
  $data = array(
    'code' => $arr[0]
  );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
  exit;
}elseif($arr[0]==200){
  $data = array(
    'code' => '200',
    'shorturl'=> $arr[1],
    'qrcode' => qrcode($arr[1])
  );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
  exit;
}
}
?>