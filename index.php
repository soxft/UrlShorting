<?php
include('header.php');
include('delete.php');
if(strpos($_SERVER['HTTP_USER_AGENT'],'QQ/') !== false or strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false){
echo('<br/><center><h2>为了安全起见,请点击右上角的··· 并选择用浏览器打开!<br/><br/></h2></center>');
goto pass;
}
if(empty($id)){
}
else{
@$comd="SELECT * FROM `shorturlsql` WHERE shorturl='$id'";
@$count=mysqli_query($conn,$comd);
@$arr1=mysqli_fetch_assoc($count);
@$domain=$arr1['domain'];
    if(empty($domain)){
    echo("<center><img src=\"https://3gimg.qq.com/tele_safe/safeurl/img/notice.png\" widht=\"85\"  height=\"85\" alt=\"错误\"></center>");
    echo('<center><h2>你访问的页面不存在!</h2></center>');
    }
    else{
    echo('<center><h2>跳转中->' . $domain . '</h2></center>');
    echo('<center><h4>TIP:实际速度取决于你的实际网速和网站服务器速度!</h4></center>');
    header("Refresh:0;url=\"$domain\""); 
    }
goto pass;
}
?>
<?php 
//处理
if(isset($_POST['submit'])){
if(!empty($_POST['domain'])){
$domain=$_POST['domain'];
}else{
$domain=$_GET['a'];
}
$data=file_get_contents($url . 'api.php?a=' . $domain); //不养忘记改成你自己的网址!
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
}else{
    echo"
<form action=\"\" method=\"post\" enctype=\"multipart/form-data\">
<!-- 浮动标签 -->
<div class=\"mdui-textfield mdui-textfield-floating-label\">
  <label class=\"mdui-textfield-label\">请输入你想要缩短的网址</label>
  <input name=\"domain\" type=\"text\" class=\"mdui-textfield-input\">
  <div class=\"mdui-textfield-helper\">提示:请输入包括http(s)://的站点,最长可输入200字符</div>
</div>
<center>
<input class=\"mdui-btn mdui-btn-raised mdui-ripple\" type=\"submit\" name=\"submit\" value=\"缩短\" />
</center>
</form>
<br/>
<h4 class='font-weight: 300;'>API接口" . $url . "api.php?a=你要缩短的网址(需要加上http(s)://)</h4>
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
        <td>状态码:200->成功 | 1001->没有输入网址 | 1002->输入网址超出最大范围(小于200字符)。</td>
      </tr>
      <tr>
        <td>shorturl</td>
        <td>生成的短网址,只有在code为200时才会返回</td>
      </tr>
    </tbody>
  </table>
</div>
  <h5>TIP:xsot.tk为freenom免费域名,并将于2020年3月到期,到时将会更换域名,请勿商用!如有需求请联系我!</h5>
  ";
}
pass: include('footer.php'); ?>
