<title>星辰安装系统</title>
<body background="./assets/img/background.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/css/mdui.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/mdui/0.4.2/js/mdui.min.js"></script>
  <br />
  <center><h2>星辰网站安装系统</h2></center>
  <?php
  $lockfile = "install.lock";
  if (file_exists($lockfile)) {
    exit("<center><h3>您已经安装过了，如果需要重新安装请先删除根目录下的install.lock(如果你只需要修改内容请访问数据库修改config表<br />如有疑问请加qq群：657529886)</center></h3>");
  }
  if (!isset($_POST['submit'])) {
    ?>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">数据库地址</label>
        <input name="db_host" type="text" class="mdui-textfield-input" value="localhost" />
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">数据库用户名</label>
        <input name="db_username" type="text" class="mdui-textfield-input" />
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">数据库名称</label>
        <input name="db_name" type="text" class="mdui-textfield-input" />
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">数据库密码</label>
        <input name="db_password" type="password" class="mdui-textfield-input" />
      </div>
      <br />
      <br />
      <br />
      <hr><hr>
      <br />
      <br />
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">网站域名</label>
        <input name="url" type="text" class="mdui-textfield-input" value="http://<?php echo$_SERVER['HTTP_HOST'] ?>/" />
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">网站标题(网页中所显示的)</label>
        <input name="title1" type="text" class="mdui-textfield-input" value="星辰短域|密语" />
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">网站标题(网页标签所显示的)</label>
        <input name="title" type="text" class="mdui-textfield-input" value="星辰短域|密语" />
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">短网址后需要的字母或数字个数</label>
        <input name="pass" type="text" class="mdui-textfield-input" value="4" />
      </div>
      <div class="mdui-textfield mdui-textfield-floating-label">
        <label class="mdui-textfield-label">后台管理密码</label>
        <input name="passwd" type="text" class="mdui-textfield-input" value="admin" />
      </div>
      <br />
      <center>
        <input class="mdui-btn mdui-btn-raised mdui-ripple" type="submit" name="submit" value="安装" />
      </center>
      </form>
      <?php
    } else {
      if (empty($_POST['db_host']) || empty($_POST['db_username']) || empty($_POST['db_name']) || empty($_POST['db_password']) || empty($_POST['url']) || empty($_POST['title']) || empty($_POST['title1']) || empty($_POST['pass']) || empty($_POST['passwd'])) {
        exit("<br/><center><h1>请检查您是否填写完全部内容后重试!</h1></center>");
      } else {
        $db_host = $_POST['db_host'];
        $db_username = $_POST['db_username'];
        $db_password = $_POST['db_password'];
        $db_name = $_POST['db_name'];
        $url = $_POST['url'];
        $title = $_POST['title'];
        $title1 = $_POST['title1'];
        $pass = $_POST['pass'];
        $passwd = $_POST['passwd'];
      }
      $title = $title . " - Powered by XCSOFT";
      $conn = mysqli_connect($db_host,$db_username,$db_password,$db_name);
      if ($conn) {
      $banx = "CREATE TABLE ban (
        type varchar(10) NOT NULL,
        content	varchar(999) NOT NULL,
        time varchar(999) NOT NULL
      )";
      $informationx = "CREATE TABLE information(
        information	mediumtext NOT NULL,
        shorturl char(20)	NOT NULL,
        type char(20)	NOT NULL,
        passwd mediumtext NOT NULL,
        time char(20)	NOT NULL,
        ip char(20)	NOT NULL
      )";
      $config = "CREATE TABLE config(
        type mediumtext NOT NULL,
        content mediumtext	NOT NULL
      )";
      mysqli_query($conn,$banx);
      mysqli_query($conn,$informationx);
      mysqli_query($conn,$config);
      function configAdd($conn,$type,$content)
      {
        mysqli_query($conn,"INSERT INTO `config` VALUES('$type','$content')");
      }
      configAdd($conn,'url',$url);
      configAdd($conn,'title',$title);
      configAdd($conn,'title1',$title1);
      configAdd($conn,'pass',$pass);
      configAdd($conn,'strPolchoice',"123"); //url风格
      configAdd($conn,'passwd',$passwd);
      configAdd($conn,'wechat','true');
      configAdd($conn,'QQ','true');
      configAdd($conn,'jump','true');
      configAdd($conn,'urlcheck','true');
      configAdd($conn,'px','25');
      configAdd($conn,'version','2.0.0');
      } else {
        exit("<br/><center><h1>数据库连接失败!请确认数据库信息填写正确!</h1></center>");
      }
      //写数据库
      $config_file = "config.php";
      $config_strings = "<?php\n";
      $config_strings .= "\$conn=mysqli_connect(\"".$db_host."\",\"".$db_username."\",\"".$db_password."\",\"".$db_name."\");\n";
      $config_strings .= "\$conns=mysqli_connect(\"".$db_host."\",\"".$db_username."\",\"".$db_password."\",\"information_schema\");\n//你的数据库信息\n";
      $config_strings .= "function content(\$info)\n";
      $config_strings .= "{\n";
      $config_strings .= "global \$conn;    //全局变量\n";
      $config_strings .= "\$comd = \"SELECT * FROM `config` where `type` = '\$info';\";\n";
      $config_strings .= "\$sql = mysqli_query(\$conn,\$comd);\n";
      $config_strings .= "\$arr = mysqli_fetch_assoc(\$sql);\n";
      $config_strings .= "return \$arr['content'];\n";
      $config_strings .= "}\n";
      $config_strings .= "\$url = content(\"url\");         \n//你的网站地址,不要忘记最后的'/'\n";
      $config_strings .= "\$title1 = content(\"title1\");   \n//网站标题(网页中所显示的)\n";
      $config_strings .= "\$title = content(\"title\");   \n//网站标题(网页标签所显示的）\n";
      $config_strings .= "\$pass = content(\"pass\");       \n//短网址后需要的字母或数字个数,推荐4个以上,最长20!(请填写数字)\n";
      $config_strings .= "\$strPolchoice = content(\"strPolchoice\");   \n//短网址包含的内容,即短网址后会出现的字符\n";
      $config_strings .= "\$passwd = content(\"passwd\");   \n//设置后台管理密码\n";
      $config_strings .= "\$px = content(\"px\");      \n//后台短域管理页面一次显示的短域个数\n";
      $config_strings .= "\$version = content(\"version\");      \n//当前版本号--请不要修改\n";
      $config_strings.= "?>";
      //文件内容
      $fp = fopen($config_file,"wb");
      fwrite($fp,$config_strings);
      fclose($fp);
      //写config.php
      $fp2 = fopen($lockfile,'w');
      fwrite($fp2,'安装锁文件,请勿删除!');
      fclose($fp2);
      //写注册锁
      echo "<br/><center><h1>安装成功!4s后将为您自动跳转到后台登录界面!</h1></center>";
      echo "<br/><center><h1>你可以进入后台进入更多设置！</h1></center>";
      echo "<br/><center><h2>非宝塔一键部署用户请注意,你还需要自己手动配置网站伪静态.网站伪静态配置信息请参考根目录下`README.md`中所写内容.</h2></center>";
      header("Refresh:4;url=\"./admin/\"");
    }
    ?>
