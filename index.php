<?php
if (!file_exists("install.lock")) {
    header("Refresh:0;url=\"./install.php\"");
    ob_end_flush();
    exit("正在跳转到安装界面...");
} else {}
require_once('header.php');
require_once('./app/delete.php');
$check1 = "SELECT *FROM `ban` where `content`='$ip' or `content`='$id';";
$count1 = mysqli_query($conn,$check1);
$arr1 = mysqli_fetch_assoc($count1);
$type = $arr1['type'];
if (!empty($type)) {
    echo("<br / ><div class=\"mdui-card\"><center><img src=\"https://3gimg.qq.com/tele_safe/safeurl/img/notice.png\" widht=\"85\"  height=\"85\" alt=\"错误\"></center>");
    echo('<center><h1>对不起,您输入的域名或您的IP已被封禁,请联系网站管理员进行处理!</h1></center></div>');
    goto pass;
}
//检索用户ip是否被封禁

if (date("i") == 00 || date("i") == 10 || date("i") == 20 || date("i") == 30 || date("i") == 40 || date("i") == 50) {
    del("./qrcode/");
}
//清除二维码缓存
/**********************开始判断处理********************/
if ($status == "undefind" || empty($status)) {
    echo("<br / ><div class=\"mdui-card\"><center><br / ><img src=\"https://3gimg.qq.com/tele_safe/safeurl/img/notice.png\" widht=\"85\"  height=\"85\" alt=\"错误\"></center>");
    echo('<center><h2>你访问的页面不存在!</h2></center></div>');
    goto pass;
} elseif ($status == "openerror") {
    echo("<br / ><div class=\"mdui-card\"><br/><center><h2>为了安全起见,请点击右上角的 ··· 并选择用浏览器打开!<br/><br/></h2></center></div>");
    //判断打开浏览器UA是否为微信或者QQ
    goto pass;
}
if ($status == "passmessage") {
    //如果数据库type读取为密语
    if ($access == 'on') {
        access($id,$information,'passmessage');
    }
    echo "
      <br />
      <div class=\"mdui-card\">
      <div class=\"mdui-card-primary\">
        <div class=\"mdui-card-primary-subtitle\">$timemessage</div>
        <center><div class=\"mdui-card-primary-title\" style=\"word-break:break-all;\">「" . $information . "」</div></center>
        <br />
      </div>
  </div>
</div>
<br/>
<div class=\"mdui-card\">
<br />
<h4>&emsp;&emsp;Q:这是什么?</h4>
<h5>&emsp;&emsp;A:这是别人发给你的一条密语!</h5><br/>
<h4>&emsp;&emsp;Q:我也想写密语怎么办?</h4>
<h5>&emsp;&emsp;A:访问<a href=\"$url\">$url</a>平台你可以免费进行密语缩短</h5>
<br />
</div>
      ";
    goto pass;
}
?>
<?php              //生成短域或者密语
require_once('./app/core.php');
/*
xcsoft版权所有!
博客http://blog.xsot.cn
*/
if (isset($_POST['submit'])) {
    $content = $_POST['content'];
    //获取一大堆post
    $choice = $_POST['choice'];
    //如果用户选择了短域
    if ($choice == 'shorturl') {
        $arr = Urlshorting($content,"shorturl");
        echo "<br / ><div class=\"mdui-card\">";
        if ($arr[0] == 200) {
            echo('<center><h2>网址缩短成功!</h2></center>');
            echo('<center><h2>短网址:' . $arr[1] . '</h2></center>');
            include('qrcode.php');
        } elseif ($arr[0] == 1001) {
            echo('<center><h2>请输入你的网址后重试!</h2></center>');
            header("Refresh:2;url=\"./index.php\"");
            ob_end_flush();
        } elseif ($arr[0] == 1002) {
            echo('<center><h2>对不起,你输入的内容不符合规则!</h2></center>');
            header("Refresh:2;url=\"./index.php\"");
            ob_end_flush();
        } elseif ($arr[0] == 1003) {
            echo("<center><img src=\"https://3gimg.qq.com/tele_safe/safeurl/img/notice.png\" widht=\"85\"  height=\"85\" alt=\"错误\"></center>");
            echo('<center><h1>对不起,您输入的域名或您的IP已被封禁,请联系网站管理员进行处理!</h1></center>');
            header("Refresh:2;url=\"./index.php\"");
            ob_end_flush();
        }
        echo "</div>";
    }
    //如果用户选择了密语
    if ($choice == 'passmessage') {
        $arr = Urlshorting($content,"passmessage");
        echo "<br / ><div class=\"mdui-card\">";
        if ($arr[0] == 200) {
            echo('<center><h2>密语上传成功!</h2></center>');
            echo('<center><h2>短网址:' . $arr[1] . '</h2></center>');
            include('qrcode.php');
        }
        if ($arr[0] == 1001) {
            echo('<center><h2>请输入你的密语后重试!</h2></center>');
            header("Refresh:2;url=\"./index.php\"");
            ob_end_flush();
        }
        if ($arr[0] == 1002) {
            echo('<center><h2>对不起,你输入的密语不符合规则!</h2></center>');
            header("Refresh:2;url=\"./index.php\"");
            ob_end_flush();
        }
        if ($arr[0] == 1003) {
            echo("<center><img src=\"https://3gimg.qq.com/tele_safe/safeurl/img/notice.png\" widht=\"85\"  height=\"85\" alt=\"错误\"></center>");
            echo('<center><h1>对不起,您输入的域名或您的IP已被封禁,请联系网站管理员进行处理!</h1></center>');
            header("Refresh:2;url=\"./index.php\"");
            ob_end_flush();
        }
        echo "</div>";
    }
} else {
    echo"
  <br/>
  <div class=\"mdui-card\">
<form action=\"\" method=\"post\" enctype=\"multipart/form-data\">
<div class=\"mdui-textfield mdui-textfield-floating-label\">
  <label class=\"mdui-textfield-label\">请输入你想要缩短的网址或密语</label>
  <input name=\"content\" type=\"text\" class=\"mdui-textfield-input\">
  <div class=\"mdui-textfield-helper\">请输入长网址或密语,网址限制字符为10-500,密语限制字符为3-900字符(每个汉字占3个字符)</div>
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
</div>
<br/>
<div class=\"mdui-table-fluid\">
  <table class=\"mdui-table mdui-table-hoverable\">
    <thead>
      <tr>
        <th>说明</th>
        <th>Api接口</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>短域</td>
        <td>" . $url . "api.php?d=所需缩短的网址</td>
      </tr>
      <tr>
        <td>密语</td>
        <td>" . $url . "api.php?m=你所需的密语</td>
      </tr>
        <tr>
         <td>注意</td>
        <td>请先将长网址或密语中所有的'&'替换为'~'后再使用api接口!</td>
      </tr>
    </tbody>
  </table>
</div>
<br>
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
        <td>状态码:200->成功 | 1001->未输入网址或密语 | 1002->输入网址或密语超出最大范围 | 1003->访问者的IP或该短域已被封禁</td>
      </tr>
      <tr>
        <td>shorturl</td>
        <td>生成的短网址,只有在code为200时才会返回</td>
      </tr>
    </tbody>
  </table>
</div>
";
}
?>
<?php
pass:
include('footer.php');
?>