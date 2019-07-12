<?php
require_once('header.php');
require_once('./app/record.php');
require_once('./app/delete.php');
require_once('./app/detection.php');
$check1 = "SELECT *FROM `ban` where `content`='$ip' or `content`='$id';";
$count1 = mysqli_query($conn,$check1);
$arr1 = mysqli_fetch_assoc($count1);
$type = $arr1['type'];
if(!empty($type)){
        echo("<center><img src=\"https://3gimg.qq.com/tele_safe/safeurl/img/notice.png\" widht=\"85\"  height=\"85\" alt=\"错误\"></center>");
    echo('<center><h1>对不起,您输入的域名或您的IP已被封禁,请联系网站管理员进行处理!</h1></center>');
    exit;
}   //检索用户ip是否被封禁
del("./qrcode/");
if(empty($id)){//如果没有id就跳过判断
}
else{          //如果有id则搜索数据库
@$comd="SELECT * FROM `information` WHERE binary shorturl='$id'";
@$count=mysqli_query($conn,$comd);
@$arr1=mysqli_fetch_assoc($count);
@$type=$arr1['type'];
@$information=$arr1['information'];
@$timemessage=$arr1['time'];
    if(empty($type)){
    echo("<center><img src=\"https://3gimg.qq.com/tele_safe/safeurl/img/notice.png\" widht=\"85\"  height=\"85\" alt=\"错误\"></center>");
    echo('<center><h2>你访问的页面不存在!</h2></center>');
    }
    else{
if($type=='shorturl'){          //如果数据库type读取为短域
if(strpos($_SERVER['HTTP_USER_AGENT'],'QQ/') !== false or strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false){
echo('<br/><center><h2>为了安全起见,请点击右上角的 ··· 并选择用浏览器打开!<br/><br/></h2></center>'); //判断打开浏览器UA是否为微信或者QQ
goto pass;
}else{
    if($access=='on'){
access($id,$information,'shorturl');
}
    echo('<center><h2>跳转中->' . $information . '</h2></center>');
    echo('<center><h4>TIP:实际速度取决于你的实际网速和网站服务器速度!</h4></center>');
    header("Refresh:0;url=\"$information\""); 
    }
}
if($type=='passmessage'){        //如果数据库type读取为密语
if($access=='on'){
access($id,$information,'passmessage');
}
echo "<div class=\"mdui-card\">
      <div class=\"mdui-card-primary\">
        <div class=\"mdui-card-primary-subtitle\">$timemessage</div>
        <div class=\"mdui-card-primary-title\">「" . $information . "」</div>
      </div>
  </div>
</div>
<br/>
<h4>Q:这是什么?</h4>
<h5>A:这是别人发给你的一条密语!</h5><br/>
<h4>Q:我也想写密语怎么办?</h4>
<h5>A:访问<a href=\"https://xsot.tk\">xsot.tk</a>平台你可以免费进行密语缩短</h5>
";
      }
}
goto pass;          //跳至footer
}
?>
<?php              //生成短域或者密语
/*
xcsoft版权所有!
博客http://blog.xsot.cn
*/
if(isset($_POST['submit'])){  
$password=$_POST['password'];
$information=$_POST['information'];       //获取一大堆post
$information = str_replace("&","||",$information);
$choice=$_POST['choice'];
                                        //如果用户选择了短域
if($choice=='shorturl'){
$data=file_get_contents($url . 'api.php?d=' . $information . "&&ip=" . $ip); //不养忘记改成你自己的网址!
$arr=$data_new=json_decode($data,true);
if($arr['code']=='200'){
  echo('<center><h2>网址缩短成功!</h2></center>');
  echo('<center><h2>短网址:' . $arr['shorturl'] . '</h2></center>');
  include('qrcode.php'); 
}
if($arr['code']=='1001'){
    echo('<center><h2>请输入你的网址后重试!</h2></center>');
  header("Refresh:2;url=\"./index.php\""); 
  goto pass;
}
if($arr['code']=='1002'){
echo('<center><h2>对不起,最长只能输入200字符,请返回重试!</h2></center>');
    header("Refresh:2;url=\"./index.php\"");
}
if($arr['code']=='1003'){
        echo("<center><img src=\"https://3gimg.qq.com/tele_safe/safeurl/img/notice.png\" widht=\"85\"  height=\"85\" alt=\"错误\"></center>");
    echo('<center><h1>对不起,您输入的域名或您的IP已被封禁,请联系网站管理员进行处理!</h1></center>');
    header("Refresh:2;url=\"./index.php\"");
}
}
                                        //如果用户选择了密语
if($choice=='passmessage'){
$data=file_get_contents($url . 'api.php?m=' . $information . "&&ip=" . $ip); //不养忘记改成你自己的网址!
$arr=$data_new=json_decode($data,true);
if($arr['code']=='200'){
  echo('<center><h2>密语上传成功!</h2></center>');
  echo('<center><h2>短网址:' . $arr['shorturl'] . '</h2></center>');
  include('qrcode.php'); 
}
if($arr['code']=='1001'){
    echo('<center><h2>请输入你的密语后重试!</h2></center>');
  header("Refresh:2;url=\"./index.php\""); 
  goto pass;
}
if($arr['code']=='1002'){
echo('<center><h2>对不起,最长只能输入200字符,请返回重试!</h2></center>');
    header("Refresh:2;url=\"./index.php\"");
}
if($arr['code']=='1003'){
        echo("<center><img src=\"https://3gimg.qq.com/tele_safe/safeurl/img/notice.png\" widht=\"85\"  height=\"85\" alt=\"错误\"></center>");
    echo('<center><h1>对不起,您输入的域名或您的IP已被封禁,请联系网站管理员进行处理!</h1></center>');
    header("Refresh:2;url=\"./index.php\"");
}
}
}else{
    echo"
<form action=\"\" method=\"post\" enctype=\"multipart/form-data\">
<div class=\"mdui-textfield mdui-textfield-floating-label\">
  <label class=\"mdui-textfield-label\">请输入你想要缩短的网址或密语</label>
  <input name=\"information\" type=\"text\" class=\"mdui-textfield-input\">
  <div class=\"mdui-textfield-helper\">请输入长网址或密语,最长可输入200字符</div>
</div>
&nbsp;&nbsp;
<label class=\"mdui-radio\">
    <input type=\"radio\"  name=\"choice\"  value=\"shorturl\"checked/>
    <i class=\"mdui-radio-icon\"></i>短域
</label>   
&nbsp;&nbsp;&nbsp;&nbsp;
<label class=\"mdui-radio\">
    <input type=\"radio\" name=\"choice\"  value=\"passmessage\"/>
    <i class=\"mdui-radio-icon\"></i>密语
</label>
<center>
<input class=\"mdui-btn mdui-btn-raised mdui-ripple\" type=\"submit\" name=\"submit\" value=\"缩短\" />
</center>
</form>
<br/>
<p class='font-weight: 300;'>API短域接口:" . $url . "api.php?d=你要缩短的网址</p>
<p class='font-weight: 300;'>API密语接口:" . $url . "api.php?m=你的密语</p>
<div class=\"mdui-table-fluid\">
  <table class=\"mdui-table mdui-table-hoverable\">
    <thead>
      <tr>
        <th>返回值(json)</th>
        <th>含义</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>code</td>
        <td>状态码:200->成功 | 1001->没有输入网址或密语 | 1002->输入网址或密语超出最大范围 | 1003->访问者的IP或该短域已被封禁</td>
      </tr>
      <tr>
        <td>shorturl</td>
        <td>生成的短网址,只有在code为200时才会返回</td>
      </tr>
    </tbody>
  </table>
</div>
<h5>TIP:xsot.tk为freenom免费域名,并将于2020年3月到期,到时将会更换域名,请勿商用!如有需求请联系我!</h5>";
}
?>
<?php
pass:
include('footer.php');
?>
