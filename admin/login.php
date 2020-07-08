<?php
require_once('../config.php');
//包括上一个文件夹的config.php
session_start();
//开启session
$password = $_SESSION['password'];
?>
<link rel="icon" type="image/x-icon" href="https://cdn.jsdelivr.net/gh/soxft/cdn@1.9/urlshorting/favicon.ico" />
<body background="https://cdn.jsdelivr.net/gh/soxft/cdn@1.9/urlshorting/background.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo($title);?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/soxft/cdn@master/mdui/css/mdui.min.css">
    <script src="https://cdn.jsdelivr.net/gh/soxft/cdn@master/mdui/js/mdui.min.js"></script>
    <?php
    if($_SESSION['password'] == $passwd){
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
      <style>
        a {
          text-decoration:none
        }
        a:hover {
          text-decoration:none
        }
      </style>
    <div class="mdui-container">
      <div class="mdui-typo">
        <h2 class="doc-chapter-title doc-chapter-title-first">登录后台</h2>
          <form action="" method="post" enctype="multipart/form-data">
              <!-- 浮动标签 -->
              <div class="mdui-textfield mdui-textfield-floating-label">
                  <label class="mdui-textfield-label">密码</label>
                  <input name="password" type="password" class="mdui-textfield-input" />
              </div>
              <br />
              <center>
                  <input class="mdui-btn mdui-btn-raised mdui-ripple" type="submit" name="submit" value="登陆" />
              </center>
          </form>
      </div>
    </div>
        <?php
    }
    require_once('../footer.php');
    ?>