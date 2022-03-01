<!--
版权归属:XCSOFT
修改时间:2019/06/28
邮箱:contact#xcsoft.top(用@替换#)
如有任何问题欢迎联系!
-->
<!--
  Secondary Developed By k6o.top
  Contact us: Gary@dtnetwork.top
-->
<?php
require_once('../config.php');
//包括上一个文件夹的config.php
session_start();
//开启session
$password = $_SESSION['password'];
?>

<head>
  <link rel="icon" type="image/x-icon" href="https://cdn.jsdelivr.net/gh/soxft/cdn@1.0.0/urlshorting/favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
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
</head>

<body background="https://cdn.jsdelivr.net/gh/soxft/cdn@1.0.0/urlshorting/background.png">
  <?php
  if ($_SESSION['password'] !== $passwd) {
    //判断是否登录
    header("Refresh:0;url=\"./login.php\"");
    exit();
  }
  ?>
  <div class="mdui-tab mdui-tab-full-width mdui-tab-centered">
    <a href="./index.php" class="mdui-ripple">管理首页</a>
    <a href="./ban.php" class="mdui-ripple">BAN</a>
    <a href="./control.php" class="mdui-ripple">短域管理</a>
    <a href="./preferences.php" class="mdui-ripple">偏好设置</a>
    <a href="./oauth.php" class="mdui-ripple">第三方登录</a>
    <a href="./update.php" class="mdui-ripple">查看更新</a>
    <a href="./logout.php" class="mdui-ripple">退出登录</a>
    <a href="../index.php" class="mdui-ripple">返回前台</a>
  </div>