<?php
include('./app/record.php');
include('./app/time.php');
include('./config.php');
if(empty($_GET['ip'])){
include('./app/ip.php');
}else{
    $ip=$_GET['ip'];
}
$domain=$_GET['d'];
$passmessage=$_GET['m'];
if(empty($domain)&&empty($passmessage)){
    //检测是否有输入
  $data =array(
  'code'=>'1001',
  );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
  exit;    
  }                                             
                                                 //判断正式开始
if(!empty($domain)&&empty($passmessage)){       //判断为短域
    //判断是包含http://或https://
    if(strpos($domain,'http://') !== false){ 
    }elseif(strpos($domain,'https://') !== false){ 
        }else{
  $domain='http://' . $domain;
        }
    if(strlen($domain) > 200){
      $data =array(
  'code'=>'1002',
  );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
     exit;
    }
@$comd="SELECT * FROM `information` WHERE `information`='$domain'";
@$count=mysqli_query($conn,$comd);
@$arr1=mysqli_fetch_assoc($count);
@$shorturl=$arr1['shorturl'];
 //如果已存在则
  if(!empty($shorturl)){
$data =array(
    'code'=>'200',
    'shorturl'=>$url . $shorturl,
    );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
     exit;
  }
    //如果不存在则
    //随机生成大小写字母
           rese:
      $shorturl = null;
      $max = strlen($strPol)-1;
        for($i=0;$i<$pass;$i++){
          $shorturl.=$strPol[rand(0,$max)];
         }
    //检测随机生成的是否有重复
    @$comd1="SELECT * FROM `information` WHERE shorturl='$shorturl'";
    @$count1=mysqli_query($conn,$comd1);
    @$arr2=mysqli_fetch_assoc($count1);
    @$domain1=$arr2['information'];
    if(empty($domain1)){
      $comd1="insert into `information` values('$domain','$shorturl','shorturl','$time','$ip');";
      $go=mysqli_query($conn,$comd1);
    $data =array(
    'code'=>'200',
    'shorturl'=>$url . $shorturl,
    );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
     exit;
    }else{
        goto rese;
    }
}
if(empty($domain)&&!empty($passmessage)){       //判断为密语
    if(strlen($passmessage) > 200){
      $data =array(
  'code'=>'1002',
  );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
     exit;
    }
@$comd="SELECT * FROM `information` WHERE `information`='$passmessage'";
@$count=mysqli_query($conn,$comd);
@$arr1=mysqli_fetch_assoc($count);
@$shorturl=$arr1['shorturl'];
 //如果已存在则
  if(!empty($shorturl)){
$data =array(
    'code'=>'200',
    'shorturl'=>$url . $shorturl,
    );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
     exit;
   }
    //如果不存在则
    //随机生成大小写字母
           rese2:   //安全起见判断是否有重复短域名id
      $shorturl = null;
      $max = strlen($strPol)-1;
        for($i=0;$i<$pass;$i++){
          $shorturl.=$strPol[rand(0,$max)];
         }
    //检测随机生成的是否有重复
    @$comd1="SELECT * FROM `information` WHERE shorturl='$shorturl'";
    @$count1=mysqli_query($conn,$comd1);
    @$arr2=mysqli_fetch_assoc($count1);
    @$information=$arr2['information'];
    if(empty($information)){
      $comd1="insert into `information` values('$passmessage','$shorturl','passmessage','$time','$ip');";
      $go=mysqli_query($conn,$comd1);
    $data =array(
    'code'=>'200',
    'shorturl'=>$url . $shorturl,
    );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
     exit;
    }else{
        goto rese2;
    }
}else{
    $data =array(
    'code'=>'1003',
    );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
}
?>
