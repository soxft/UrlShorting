  <?php
include('config.php');
if(!empty($_POST['domain'])){
$domain=$_POST['domain'];
}else{
$domain=$_GET['a'];
}
if(empty($domain)){
    //检测是否有输入
  $data =array(
  'code'=>'1001'
  );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
  exit;
}
else{
    //判断是包含http://或https://
    if(strpos($domain,'http://') !== false){ 
    }elseif(strpos($domain,'https://') !== false){ 
        }else{
        $domain='http://' . $domain;
        }
    }
    if(strlen($domain) > 200){
      $data =array(
  'request'=>'1002',
  );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
     exit;
    }
    else{
 //如果已存在则
@$comd="SELECT * FROM `shorturlsql` WHERE `domain`='$domain'";
@$count=mysqli_query($conn,$comd);
@$arr1=mysqli_fetch_assoc($count);
@$shorturl=$arr1['shorturl'];
  if(!empty($shorturl)){
$data =array(
    'code'=>'200',
    'shorturl'=>$url . $shorturl,
    );
  $data_json = json_encode($data);
  header('Content-type:text/json');
  echo $data_json;
     exit;
   }else{
    //如果不存在则
    //随机生成大小写字母
           rese:
      $shorturl = null;
      $max = strlen($strPol)-1;
        for($i=0;$i<$pass;$i++){
          $shorturl.=$strPol[rand(0,$max)];
         }
    //检测随机生成的是否有重复
    @$comd1="SELECT * FROM `shorturlsql` WHERE shorturl='$shorturl'";
    @$count1=mysqli_query($conn,$comd1);
    @$arr2=mysqli_fetch_assoc($count1);
    @$domain1=$arr2['domain'];
    if(empty($domain1)){
      $comd1="insert into shorturlsql values('$domain','$shorturl');";
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
    }
?>
