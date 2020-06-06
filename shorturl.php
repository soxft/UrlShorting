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
          <h3>短链接:<div class="URL" id="URL" onclick="myCopyFunction()"><?PHP echo($shorturl); ?></div></h3>
        </center>
    </div>
</div>
<style>
.URL{
  cursor:pointer;
}
</style>
<script>
function myCopyFunction() {
  var myText = document.createElement("textarea")
  myText.value = document.getElementById("URL").innerHTML;
  myText.value = myText.value.replace(/&lt;/g,"<");
  myText.value = myText.value.replace(/&gt;/g,">");
  document.body.appendChild(myText)
  myText.focus();
  myText.select();
  document.execCommand('copy');
  document.body.removeChild(myText);
  mdui.snackbar("链接已复制");
}
</script>


<?php
unset($_SESSION['shorturl']);
require_once "footer.php";
?>