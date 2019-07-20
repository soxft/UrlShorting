<!--
版权归属:XCSOFT
修改时间:2019/06/28
邮箱:contact#xcsoft.top(用@替换#)
如有任何问题欢迎联系!
-->
<?php 
require_once('config.php');
if(empty($_GET['id'])){
$id=$_POST['id'];
}
else{
$id=$_GET['id'];   
}
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
 <meta http-equiv="Cache-Control" content="no-siteapp"/>
 <title><?php echo($title); ?></title>
 <link rel="icon" type="image/x-icon" href="./assets/img/favicon.ico"/>
 <body background="./assets/img/background.png">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/css/mdui.min.css">
   <link rel="stylesheet" href="./assets/css/mdui.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
    <script src="//instant.page/1.2.2" type="module" integrity="sha384-2xV8M5griQmzyiY3CDqh1dn4z3llDVqZDqzjzcY+jCBCk/a5fXJmuZ/40JJAPeoU"></script>
</head>
<header>
<body class="mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink">
    <header class="mdui-appbar mdui-appbar-fixed">
        <div class="mdui-toolbar mdui-color-theme">
            <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer'}">
              <i class="mdui-icon material-icons">menu</i>
            </span>
            <a href="" class="mdui-typo-title"><?php echo($title1) ?></a>
    </header>
    <div class="mdui-drawer" id="main-drawer">
      <div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 68px;">
        <div class="mdui-list">
          <a href="/" class="mdui-list-item">
            <i class="mdui-list-item-icon mdui-icon material-icons">home</i>
            <div class="mdui-list-item-content">主页</div>
          </a>
          <a href="./admin" class="mdui-list-item">
            <i class="mdui-list-item-icon mdui-icon material-icons">&#xe853</i>
            <div class="mdui-list-item-content">后台</div>
          </a>
          <a href="./about.php" class="mdui-list-item">
            <i class="mdui-list-item-icon mdui-icon material-icons">info_outline</i>
            <div class="mdui-list-item-content">关于</div>
          </a>
    </div>
    <div class="mdui-collapse-item ">
      <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
        <i class="mdui-list-item-icon mdui-icon material-icons">&#xe80d;</i>
        <div class="mdui-list-item-content">友链</div>
        <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
      </div>
      <div class="mdui-collapse-item-body mdui-list">
        <a href="//blog.xsot.cn" class="mdui-list-item mdui-ripple ">星辰日记</a>
        <a href="//catni.cn" class="mdui-list-item mdui-ripple ">Hiram·Wong</a>
      </div>
     </div>
      </div>
    </div>
<div class="tip">
<ul class="mdui-list">
  <li class="mdui-list-item">
    <div class="mdui-list-item-avatar"><img src="./assets/img/logo.png"/></div>
    <div class="mdui-list-item-content">
      <p id="hitokoto">:D 获取中...</p>
      <script src="//v1.hitokoto.cn/?encode=js&select=%23hitokoto" defer></script>
    </div>
  </li>
   <?php
      $commd1 = "select * from notice where updater='adminer'";
      $result = mysqli_query($conn,$commd1);
      $arr1 = mysqli_fetch_assoc($result);
      $notice = $arr1['notices'];
      if(empty($notice)){
      }else{
      ?>
  <li class="mdui-list-item">
    <div class="mdui-list-item-avatar"><img src="./assets/img/logo.png"/></div>
    <div class="mdui-list-item-content"><?php echo $notice ?>
    </div>
<?php
}
?>
</ul>
</div>