<html>
    <head>
    <?php require_once('../config.php'); ?>
        <?php require_once("./header.php");?>
    </head>
    <body>
        <?php
         session_destroy();
         echo("<center><h2><br/>你已经成功登出!跳转中!</h2></center>");
                 header("Refresh:1;url=\"../index.php\"");
                 ?>
    </body>
<?php require_once("../footer.php"); ?>
</html>