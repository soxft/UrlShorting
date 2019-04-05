<head>
    <!--
    xcsoft版权所有！
    博客:http://blog.xsot.cn
    -->
    <?php 
    include('config.php');
    if(empty($_GET['id'])){
    $id=$_POST['id'];
    }
    else{
    $id=$_GET['id'];   
    }
    ?>
      <body background="./assets/img/background.jpg" class="mdui-theme-primary-indigo mdui-theme-accent-pink">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo($title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/css/mdui.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
            <a href="javascript:;" class="mdui-btn mdui-btn-icon" mdui-menu="{target: '#app1'}"><i class="mdui-icon material-icons">menu</i></a>
<ul id="app1" class="mdui-menu">
    <li class="mdui-menu-item">
        <!--首页-->
        <?php 
            echo("<a href=\"./index.php\" class=\"mdui-ripple\">首页</a>");
            echo("<a href=\"http://blog.xsot.cn\" class=\"mdui-ripple\">关于</a>");  
       ?> 
    </li>
</ul>
<center><h2><?php echo($title1); ?></h2></center>
</head>
