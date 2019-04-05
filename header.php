<head>
    <!--
    xcsoft版权所有！
    博客:http://blog.xsot.cn
    -->
    <!-- 百度统计 -->
    <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?79305cefb089aca83c7af79e380adeda";
  var s = document.getElementsByTagName("script")[0]; 
    
    <?php 
    include('config.php');
    if(empty($_GET['id'])){
    $id=$_POST['id'];
    }
    else{
    $id=$_GET['id'];   
    }
    ?>
      <body background="./assets/img/background.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo($title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/css/mdui.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
<div class="mdui-tab mdui-tab-centered mdui-tab-full-width" mdui-tab>
        <!--首页-->
        <?php 
            echo("<a href=\"./index.php\" class=\"mdui-ripple\">首页</a>");
            echo("<a href=\"http://love.9420.ltd\" class=\"mdui-ripple\">星辰表白墙</a>");
            echo("<a href=\"http://blog.xsot.cn\" class=\"mdui-ripple\">关于</a>");  
       ?> 
</div>
<center><h2><?php echo($title1); ?></h2></center>
</head>
