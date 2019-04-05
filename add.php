<?php
/*
xcsoft版权所有!
博客http://blog.xsot.cn
*/
include('header.php');
if(!empty($_POST['domain'])){
$domain=$_POST['domain'];
}else{
$domain=$_GET['a'];
}
@$comd="SELECT * FROM `shorturlsql` WHERE `domain`='$domain'";
@$count=mysqli_query($conn,$comd);
@$arr1=mysqli_fetch_assoc($count);
@$shorturl=$arr1['shorturl'];
if(empty($domain)){
    //检测是否有输入
  echo('<center><h2>请输入你的网址后重试!</h2></center>');
  header("Refresh:2;url=\"./index.php\""); 
  goto pass;
}
else{
    //判断是包含http://或https://
    if(strpos($domain,'http://') !== false){ 
    }elseif(strpos($domain,'https://') !== false){ 
        }else{
        echo('<center><h2>请确认你输入了http://或https://</h2></center>');
        header("Refresh:2;url=\"./index.php\"");
        goto pass;
        }
    }
    if(strlen($domain) > 200){
    echo('<center><h2>对不起,最长只能输入200字符,请返回重试!</h2></center>');
    header("Refresh:2;url=\"./index.php\"");
    }
    else{
 //如果已存在则
  if(!empty($shorturl)){
  echo('<center><h2>网址缩短成功!</h2></center>');
  echo('<center><h2>短网址:' . $url . $shorturl . '</h2></center>');
  }
  else{
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
      echo('<center><h2>网址缩短成功!</h2></center>');
       echo('<center><h2>短网址:' . $url . $shorturl . '</h2></center>');
    }else{
        goto rese;
    }
    }
    }
?>

<?php
pass:
include('footer.php');
?>
