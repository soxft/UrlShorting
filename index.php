<?php
if (!file_exists("install.lock")) {
    header("Refresh:0;url=\"./install.php\"");
    exit("正在跳转到安装界面...");
}
//检测是否已经安装
require_once "header.php";
require_once "config.php";
//开始判断处理
if ($status == "undefind" || empty($status)) {
?>
  <br/><center><br/><img src="https://3gimg.qq.com/tele_safe/safeurl/img/notice.png" widht="85"  height="85" alt="错误"></center>
  <center><h2>你访问的页面不存在!</h2></center>
<?php
    require_once "footer.php";
    exit();
}
if ($status == "passmessage") {
    //如果数据库type读取为密语 
?>
      <br />
      <div class="mdui-card.mdui-card-media-covered-transparent">
        <div class="mdui-card-primary">
          <div class="mdui-card-primary-subtitle"><?php echo date('Y年m月d日 H时i分s秒',$timemessage) ?></div>
            <center>
              <div class="mdui-card-primary-title" style="word-break:break-all;">
                「<?php echo htmlspecialchars($information)?>」
              </div>
            </center>
          </div>
        </div>
      </div>
    <br/>
<?php
      require_once "footer.php";
      exit();
    }
    //至此显示密语结束
    //因为为了解决速度问题，所以url的跳转放置显示css直之前，即header.php开头部分  
    unset($_SESSION['shorturl']);  //删除shorturl的session submit里面跳转到shorturl.php的那个session
    //unset($_SESSION['passwd']); //删除上一次的短域session
?>
<br/>
<div class="mdui-container doc-container">
    <div class="mdui-typo">
        <h2>短域</h2>
        <div class="mdui-textfield">
            <textarea id="content" class="mdui-textfield-input" type="text" placeholder="*请输入长链接或密语"></textarea>
        </div>
        <div style="float: left; width: 49.2%;" class="mdui-textfield">
            <input id="shorturl" class="mdui-textfield-input" type="text" placeholder="请输入自定义短链(可选)"/>
        </div>
        <div style="float: right; width: 49.2%;" class="mdui-textfield">
            <input id="passwd" class="mdui-textfield-input" type="text" placeholder="请输入加密密码(可选)"/>
        </div>
        
        <button onClick="submit();" id="submit" class="mdui-btn mdui-btn-dense mdui-color-theme-accent mdui-ripple">
          <i class="mdui-icon material-icons">send</i>
        </button>
        <label class="mdui-radio">
          <input onclick='change("shorturl")' type="radio" name="type" id="type"  value="shorturl" checked />
          <i class="mdui-radio-icon"></i>短域
        </label>
        &emsp;&emsp;
        <label class="mdui-radio">
          <input onclick='change("passmessage")' type="radio" name="type" id="type"  value="passmessage" />
          <i class="mdui-radio-icon"></i>密语
        </label>
    </div>
</div>
<script>
var $ = mdui.JQ;

function change(type)
{
  if(type == 'shorturl')
  {
    $('#content').removeAttr('rows');
    $('#content').removeAttr('cols');
  }else{
    $('#content').attr('rows','10');
    $('#content').attr('cols','10');
  }
}

function submit(){
  type = $('input[name="type"]:checked').val();
  content = $('#content').val();
  shorturl = $('#shorturl').val();
  passwd = $('#passwd').val();
  $('#submit').attr('disabled',true)
  $('#submit').text('处理中...')
  $.ajax({
    method: 'post',
    timeout: 10000,
    url: 'submit.php',
    data: {
      type: type,
      content: content,
      shorturl: shorturl,
      passwd: passwd
    },
    success: function(data)
    {
      if(data == 200)
      {
        mdui.snackbar({
         message: '缩短成功!',
         position: 'right-top',
         timeout: 0
       });
       window.setTimeout("window.location='shorturl.php'",2000);
      }else{
        mdui.snackbar({
         message: '缩短失败: <br/>提示信息: ' + data,
         position: 'right-top'
       });
      }
    },
    complete: function(xhr,textStatus) 
    {
      $('#submit').html('<i class="mdui-icon material-icons">send</i>')
      $('#submit').removeAttr('disabled');
      if(textStatus == 'timeout')
      {
        mdui.snackbar({
         message: '请求超时!',
         position: 'right-top'
       });
      }
    }
  });
}

</script>
<div class="mdui-container doc-container">
    <div class="mdui-typo">
         <h2>帮助</h2>
         1.输入短域请加上http(s)://<br />
         2.中文域名请手动Punycode编码后再使用<br />
         3.网址最长支持1000字符<br />
         4.密语最长支持3000字符(合1000汉字)<br />
         5.手动填写短域以及密码为可选项目<br />
         6.密码限制2-20位(数字密码组合)/短域限制输入<?php echo $pass ?>位<br/>
         7.其余详见菜单-帮助界面
    </div>
</div>
<?php require_once "footer.php"; ?>
