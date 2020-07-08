<?php require_once("./header.php");?>
<title>偏好设置</title>
<div class="mdui-container">
  <div class="mdui-typo">
    <h2 class="doc-chapter-title doc-chapter-title-first">偏好设置</h2>
    <!-- 防红设置 -->
    <div class="mdui-container">
      <div class="mdui-typo">
        <h4 class="doc-chapter-title doc-chapter-title-first">防红设置</h4>
        <ul class="mdui-list">
          <li class="mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon material-icons">chat</i>
            <div class="mdui-list-item-content">
              微信
            </div>
            <label class="mdui-switch mdui-valign">
              <input id="wechat" onclick="red('wechat')" type="checkbox" />
              <i class="mdui-switch-icon"></i>
            </label>
          </li>
          <li class="mdui-list-item mdui-ripple"> <i class="mdui-list-item-icon mdui-icon material-icons">chat_bubble_outline</i>
            <div class="mdui-list-item-content">
              QQ
            </div>
            <label class="mdui-switch mdui-valign">
              <input id="QQ" onclick="red('QQ')" type="checkbox" />
              <i class="mdui-switch-icon"></i>
            </label>
          </li>
        </ul>
      </div>
    </div>
    <!-- 跳转设置 -->
</div>
</div>
<div class="mdui-container">
    <div class="mdui-typo">
      <h2 class="doc-chapter-title doc-chapter-title-first">提示</h2>
      &emsp;1.防红设置：即在指定软件打开时是否提示需要浏览器打开
    </div>
</div>
<br />
<?php 
  function getResult($conn,$type)
  {
    $retun = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `config` WHERE `type` = '$type'")); 
    return $retun['content'] == "true" ? true:false; 
  }
  $QQ = getResult($conn,"QQ");
  $wechat = getResult($conn,"wechat");
  //$jump = getResult($conn,$type);
?>
<script>
var $ = mdui.JQ;

function red(type) {
    $('#' + type + '').attr("disabled", true);
    //使按钮禁用,防止多次点击
    var x = $('#' + type + '').is(':checked', true);
    //console.log(type + "=>" + x);
    //调试
    $.ajax({
    method: 'GET',
    url: '../app/preferences.php',
    data: {
        method: 'set',
        content: type,
        status: x?true:false,
        password: '<?php echo md5($password) ?>'
    },
    success: function(data) {
      $('#' + type + '').removeAttr('disabled')
        mdui.snackbar({
         message: '操作成功!',
         position: 'right-top'
       });
        //$('#jump').prop('checked', true);
    } 
    });
}
//后台获取数据
        //console.log(QQ+'  '+wechat)
        $('#QQ').prop('checked', <?php echo $QQ ?>);
        $('#wechat').prop('checked', <?php echo $wechat ?>);
</script>
<?php require_once("../footer.php");
?>