<?php
$conn=mysqli_connect("localhost","uu","uu","uu");
$conns=mysqli_connect("localhost","uu","uu","information_schema");
//你的数据库信息
function content($info)
{
global $conn;    //全局变量
$comd = "SELECT * FROM `config` where `type` = '$info';";
$sql = mysqli_query($conn,$comd);
$arr = mysqli_fetch_assoc($sql);
return $arr['content'];
}
$url = content("url");         
//你的网站地址,不要忘记最后的'/'
$title1 = content("title1");   
//网站标题(网页中所显示的)
$title = content("title");   
//网站标题(网页标签所显示的）
$pass = content("pass");       
//短网址后需要的字母或数字个数,推荐4个以上,最长20!(请填写数字)
$strPolchoice = content("strPolchoice");   
//短网址包含的内容,即短网址后会出现的字符
$passwd = content("passwd");   
//设置后台管理密码
$px = content("px");      
//后台短域管理页面一次显示的短域个数
$version = content("version");      
//当前版本号--请不要修改
?>