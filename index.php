<?php
if (!file_exists("install.lock")) {
    header("Refresh:0;url=\"./install.php\"");
    exit("正在跳转到安装界面...");
}
//检测是否已经安装
require_once "header.php";
require_once "config.php";
require_once "./app/delete.php";
if (date("i")%20 == 0) {
    del("./qrcode/");
}
//清除二维码缓存
//开始判断处理
if ($status == "undefind" || empty($status)) {
    echo("<br / ><center><br / ><img src=\"https://3gimg.qq.com/tele_safe/safeurl/img/notice.png\" widht=\"85\"  height=\"85\" alt=\"错误\"></center>");
    echo('<center><h2>你访问的页面不存在!</h2></center>');
    require_once "footer.php";
    exit();
}
if ($status == "passmessage") {
    //如果数据库type读取为密语
    if ($access == 'on') {
        access($id,$information,'passmessage');
    }
    echo "
      <br />
      <div class=\"mdui-card.mdui-card-media-covered-transparent\">
        <div class=\"mdui-card-primary\">
          <div class=\"mdui-card-primary-subtitle\">$timemessage</div>
            <center>
              <div class=\"mdui-card-primary-title\" style=\"word-break:break-all;\">
                「" . htmlspecialchars($information) . "」
              </div>
            </center>
          </div>
        </div>
      </div>
    <br/>
    <div class=\"mdui-card.mdui-card-media-covered-transparent\">
    <br />
    <h4>&emsp;&emsp;Q:这是什么?</h4>
    <h5>&emsp;&emsp;A:这是别人发给你的一条密语!</h5><br/>
    <h4>&emsp;&emsp;Q:我也想写密语怎么办?</h4>
    <h5>&emsp;&emsp;A:访问<a class=\"mdui-text-color-grey-800\" href=\"$url\">$url</a>平台你可以免费进行密语缩短</h5>
    <br />
    </div>
      ";
      require_once "footer.php";
      exit();
    }
    //至此显示密语结束
    //因为为了解决速度问题，所以url的跳转放置显示css直之前，即header.php开头部分  
?>
<br/>
<div class="mdui-container doc-container">
    <div class="mdui-typo">
        <h2>短域</h2>
        <div class="mdui-textfield">
            <input id="content" time="content" class="mdui-textfield-input" type="text" placeholder="请输入链接或密语" />
        </div>
        <button onClick="Submit();" id="Submit" class="mdui-btn mdui-btn-dense mdui-color-theme-accent mdui-ripple">
          <i class="mdui-icon material-icons">send</i>
        </button>
        <label class="mdui-radio">
          <input type="radio" name="type" id="type"  value="shorturl" checked />
          <i class="mdui-radio-icon"></i>短域
        </label>
        &emsp;&emsp;
        <label class="mdui-radio">
          <input type="radio" name="type" id="type"  value="passmessage" />
          <i class="mdui-radio-icon"></i>密语
        </label>
    </div>
</div>
<script>
  function  getRadioBoxValue(radioName) 
  {   
    var obj = document.getElementsByName(radioName);
      for(i=0; i<obj.length;i++)  {
       if(obj[i].checked)  { 
         return  obj[i].value; 
       } 
      }     
  }
  function Submit() {
    document.getElementById("Submit").innerHTML = "处理中...";
    var content = document.getElementById("content").value;
    var type = getRadioBoxValue("type");
    if(type == "shorturl")
    {
        var content = escape(content);
    }
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./submit.php");
    xhr.setRequestHeader('Content-Type', ' application/x-www-form-urlencoded');
    xhr.send("content=" + content + "&type=" + type);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("Submit").innerHTML = "<i class=\"mdui-icon material-icons\">send</i>";
            if (xhr.responseText == 200) {
                mdui.snackbar("缩短成功!");
                window.location.href="shorturl.php";
            } else {
                mdui.snackbar(xhr.responseText);
            }
        }
    }
  }
</script>
<div class="mdui-container doc-container">
    <div class="mdui-typo">
         <h2>帮助</h2>
         1.输入短域请加上http(s)://<br />
         2.中文域名请手动Punycode编码后再使用<br />
         3.网址最长支持1000字符<br />
         4.密语最长支持3000字符(合1000汉字)<br />
         5.其余详见菜单-帮助界面
    </div>
</div>
<?php require_once "footer.php"; ?>
