<?php
session_start();
if(!isset($_SESSION['shorturl']))
{
 header("Refresh:0;url=\"./index.php\"");
 exit();
}
require_once "header.php";
require_once "./app/qrcode.php";
$shorturl = $_SESSION['shorturl'];
?>
<div class="mdui-container doc-container">
    <div class="mdui-typo">
        <h2>缩短成功!</h2>
        <center>
          <br />
          <?php qrcode($shorturl,"show"); ?>
          <h3>短链接:<?php echo $shorturl ?></h3>
        </center>
    </div>
</div>
<?php
unset($_SESSION['shorturl']);
require_once "footer.php";
?>