<?php
require_once('../config.php');
//包括上一个文件夹的config.php
session_start();
define('CLIENT_ID', '8us3lhiuyiOlyT3KitpWvtIwGindm5');
if (isset($_POST['passwd'])) {
  if ($_POST['passwd'] == $passwd) {
    $_SESSION['password'] = $passwd;
    exit('200');
  } else {
    exit('1001');
  }
} else {
  //判断是否已经登录
  if ($_SESSION['password'] == $passwd) {
    header("Refresh:0;url=\"./index.php\"");
    require_once '../footer.php';
    exit();
  }
}
?>
<link rel="icon" type="image/x-icon" href="https://cdn.jsdelivr.net/gh/soxft/cdn@1.9/urlshorting/favicon.ico" />

<body background="https://cdn.jsdelivr.net/gh/soxft/cdn@1.9/urlshorting/background.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/mdui/0.4.3/css/mdui.min.css">
  <script src="https://cdn.bootcdn.net/ajax/libs/mdui/0.4.3/js/mdui.min.js"></script>
  <style>
    a {
      text-decoration: none
    }

    a:hover {
      text-decoration: none
    }
  </style>
  <div class="mdui-container">
    <div class="mdui-typo">
      <h2 class="doc-chapter-title doc-chapter-title-first">登录后台</h2>
      <!-- 浮动标签 -->
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">密码</label>
        <input id="password" type="password" class="mdui-textfield-input" />
        <center>

          <button class="mdui-btn mdui-btn-raised mdui-ripple" id="btn" onclick="login()">登陆</button>


          <?php if (!empty(mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM config where type='xoauth'"))['content'])) { ?>
            <div style='height:10px'></div>
            <button class="mdui-btn mdui-btn-raised mdui-ripple" onclick="window.location.href='<?php echo "http://9420.ltd/v1/oauth.php?response_type=code&client_id=" . CLIENT_ID . "&redirect_uri=" . $url . "app/oauth.php" ?>'">第三方登录</button>
          <?php } ?>
        </center>
      </div>
    </div>
    <script>
      var $ = mdui.JQ;

      function login() {
        passwd = $('#password').val();
        $('#btn').attr('disabled', true);
        $('#btn').text('登陆中...')
        //构建ajax请求
        $.ajax({
          method: 'post',
          timeout: 10000,
          url: 'login.php',
          data: {
            passwd: passwd
          },
          success: function(data) {
            if (data == '200') {
              mdui.snackbar({
                message: '登陆成功,跳转中!',
                position: 'right-top'
              });
              setTimeout("window.location='index.php'", 2000)
            } else {
              mdui.snackbar({
                message: '密码错误!',
                position: 'right-top'
              });
              $('#btn').removeAttr('disabled');
              $('#btn').val('登陆');
            }
          },
          complete: function(xhr, textStatus) {
            $('#btn').text('登陆')
            if (textStatus == 'timeout') {
              mdui.snackbar({
                message: '请求超时!',
                position: 'right-top'
              });
              $('#btn').removeAttr('disabled');
              $('#btn').val('登陆');
            }
          }
        });
      }
    </script>
    <?php
    require_once "../footer.php";
    ?>