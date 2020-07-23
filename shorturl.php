<?php
session_start();
if(!isset($_SESSION['shorturl']))
{
 header("Refresh:0;url=\"./index.php\"");
 exit();
}
require_once "header.php";
require_once "app/qrcode.php";
$shorturl = $_SESSION['shorturl'];
$urlpasswd = $_SESSION['passwd'];
if(empty($urlpasswd)){
    $text = $shorturl; 
}else{
    $text = "链接: " . $shorturl . " | 密码: " . $urlpasswd;
}
?>
<div class="mdui-container doc-container">
    <div class="mdui-typo">
        <h2>缩短成功!</h2>
        <center>
          <br />
          <?php qrcode($shorturl,"show"); ?>
          <h3>短链接:<div class="URL" id="URL" data-clipboard-text="<?PHP echo $text; ?>"><?PHP echo($shorturl); ?><?php if(!empty($urlpasswd)):?><br/>密码: <?php echo $_SESSION['passwd'] ?>
          <?php endif ?></h3></div>
        </center>
    </div>
</div>
<style>
.URL{
  cursor:pointer;
}
</style>
<script src="https://cdn.jsdelivr.net/gh/soxft/cdn@master/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/soxft/cdn@1.9/urlshorting/clipboard.min.js"></script>
<script>
    new ClipboardJS(".URL");
    $(".URL").click(function() {
        mdui.snackbar({
        message: "链接已复制"
    });
    }) 
</script>


<?php
unset($_SESSION['shorturl']);
unset($_SESSION['passwd']);
require_once "footer.php";
?>
