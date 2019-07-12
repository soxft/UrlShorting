    <!--
版权归属:XCSOFT
修改时间:2019/06/28
邮箱:contact#xcsoft.top(用@替换#)
如有任何问题欢迎联系!
-->
    <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?b9f01b6fcfceb26da1a1f3705ae8feaf";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
    <?php 
    require_once('config.php');
    if(empty($_GET['id'])){
    $id=$_POST['id'];
    }
    else{
    $id=$_GET['id'];   
    }
    ?>
      <link rel="icon" type="image/x-icon" href="./assets/img/favicon.ico"/>
      <body background="./assets/img/background.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo($title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/css/mdui.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
     <div class="mdui-tab mdui-tab-centered mdui-tab-full-width"> <!-- 菜单-->
        <a href="./" class="mdui-ripple">
        <i class="mdui-icon material-icons">home</i>
        <label>Home</label>
        </a>
        <a href="https://love.9420.ltd" class="mdui-ripple">
        <i class="mdui-icon material-icons">tab</i>
        <label>Lovewall</label>
        </a>
        <a href="https://blog.xsot.cn/archives/pro-URLshorting.html" class="mdui-ripple">
        <i class="mdui-icon material-icons">info_outline</i>
        <label>ABOUT</label>
        </a>
     </div>
<center><h2><?php echo("<h2>" . $title1 . "</h2>"); ?></h2></center>