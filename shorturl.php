<?php
session_start();
if(!isset($_SESSION['shorturl']))
{
 header("Refresh:0;url=\"./index.php\"");
 exit();
}
require_once "header.php";
//require_once "app/qrcode.php";
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
        <h2>缩短成功!🎉</h2>
        <center>
          <br />
          <div id="qrcode"></div>
          <h3>短链接（点击链接即可复制）:<div class="URL" id="URL" data-clipboard-text="<?PHP echo $text; ?>"><?PHP echo($shorturl); ?><?php if(!empty($urlpasswd)):?><br/>密码: <?php echo $_SESSION['passwd'] ?>
          <?php endif ?>
          </h3>
          </div>
        </center>
    </div>
</div>
<style>
.URL{
  cursor:pointer;
}
</style>
<script src="https://lf3-cdn-tos.bytecdntp.com/cdn/expire-1-M/jquery/3.6.0/jquery.min.js" type="application/javascript"></script>
<script src="https://lf6-cdn-tos.bytecdntp.com/cdn/expire-1-M/clipboard.js/2.0.10/clipboard.min.js"></script>
<script src="https://lf3-cdn-tos.bytecdntp.com/cdn/expire-1-M/lrsjng.jquery-qrcode/0.18.0/jquery-qrcode.min.js"></script>
<script>
    $('#qrcode').qrcode
    ({
      width: 150,
      height: 150,
      render: "table",
      correctLevel:0,
      text: '<?php echo $shorturl ?>'
    });

  new ClipboardJS(".URL");
  $(".URL").click(function() {
    mdui.snackbar({
      message: "链接已复制✔️"
    });
  }) 
</script>


<?php
require_once "footer.php";
?>
