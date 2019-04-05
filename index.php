<?php
include('header.php');
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
<form action="add.php" method="post" enctype="multipart/form-data">
<!-- 浮动标签 -->
<div class="mdui-textfield mdui-textfield-floating-label">
  <label class="mdui-textfield-label">请输入你想要缩短的网址</label>
  <input name="domain" type="text" class="mdui-textfield-input" type="email"/>
  <div class="mdui-textfield-helper">提示:请输入包括http(s)://的站点,最长可输入200字符</div>
</div>
<center>
<input class="mdui-btn mdui-btn-raised mdui-ripple" type="submit" name="submit" value="缩短" />
</center>
</form>
<?php
pass:
include('footer.php');
?>
