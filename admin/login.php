<?php
require_once('../config.php');
//包括上一个文件夹的config.php
session_start();
//开启session
$password = $_SESSION['password'];
?>
<link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico" />
<body background="../assets/img/background.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo($title);
        ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/css/mdui.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
    <?php
    if($_SESSION['password']==$passwd){
     header("Refresh:0;url=\"./index.php\"");
     require_once('../footer.php');
     exit;
    }
    if (isset($_POST['submit'])) {
        if ($_POST['password'] == $passwd) {
            $_SESSION['password'] = $passwd;
            echo("<h1 style='font-weight:900;text-align:center;width=1000px;'>登陆成功!跳转中...</h1>");
            header("Refresh:1;url=\"./index.php\"");
        } else {
            echo("<h1 style='font-weight:900;text-align:center;width=1000px;'>用户名或密码错误,请重试!</h1>");
            header("Refresh:1;url=\"./login.php\"");
        }
    } else {
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- 浮动标签 -->
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">密码</label>
                <input name="password" type="password" class="mdui-textfield-input" />
            </div>
            <center>
                <input class="mdui-btn mdui-btn-raised mdui-ripple" type="submit" name="submit" value="登陆" />
            </center>
        </form>
        <?php
    }
    require_once('../footer.php');
    ?>