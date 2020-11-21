<?php 
define('CLIENT_ID','8us3lhiuyiOlyT3KitpWvtIwGindm5');
define('CLIENT_SECRET','8us3lhiuyiOlyT3KitpWvtIwGindm5');
if(empty($_GET['code'])){
  require_once "header.php"; 
  $arr = explode(",",mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `config` WHERE type='xoauth'"))['content']);
  if(empty($arr[0]))
  {
    //防止数据为空的问题
    $arr = array();
  }
  $list = ''; //初始化列表
  for ($i = 0; $i <= count($arr)-1; $i++)
  {
    $user = $arr[$i];
    $list .= 
       "<li id='$user' class='mdui-list-item'>
          <i class='mdui-list-item-icon mdui-icon material-icons'>list</i>
          <div class='mdui-list-item-content'>
            <div class='mdui-list-item-title'>$user</div>
          </div>
          <span onclick=\"del('$user')\" class='mdui-btn mdui-btn-icon mdui-ripple' style='color:#808080'>
          <i class='mdui-icon material-icons'>close</i>
          </span>
        </li>";
  }
  if(empty($list))
  {
    $list = "<li class='mdui-list-item'>
          <div class='mdui-list-item-content'>
            <div class='mdui-list-item-title'>未找到授权记录</div>
          </div>
        </li>";
  }
  ?>
  <title>第三方登录 - 星辰短域|密语</title>
  <div style="Height:20px"></div>
    <div class="mdui-container">
    <h2 style="font-weight:400">操作</h2>
      <ul class="mdui-list">
        <!-- 文档 -->
      <li onclick="window.location.href='<?php echo "http://openid.9420.ltd/v1/oauth.php?response_type=code&client_id=". CLIENT_ID ."&redirect_uri=".$url."admin/oauth.php" ?>'" class="mdui-list-item">
        <i class="mdui-list-item-icon mdui-icon material-icons">assessment</i>
        <div class="mdui-list-item-content">添加新用户</div>
      </li>
    </ul>
  </div>
  <div class="mdui-container">
  <h2 style="font-weight:400">第三方登录</h2>
  <p style='color:grey;font-size:15px;'>第三方授权登陆列表,使用星辰oauth</p>
    <ul class="mdui-list">
    <?php echo $list ?>
    </ul>
  </div>
  <!-- 加载 -->
  <div id='loading' style="position: absolute;margin: auto;top: 0;left: 0;right: 0;bottom: 0;display: none;width: 50px;height: 50px" class="mdui-spinner mdui-spinner-colorful"></div>
  
  <script>
  var $ = mdui.JQ
  
  function del(user)
  {
    mdui.confirm('你确定要取消授权吗?', function(){
      del_go(user)
    });
  }
  
  function del_go(user){
    $.showOverlay(); //遮罩
    $('#loading').show();
    
    $.ajax({
        url: '../app/oauth_api.php',
        method: 'post',
        timeout: 10000,
        data: {
            method: 'del',
            user: user
        },
        success: function(data) {
            data = eval('(' + data + ')');
            if (data['code'] == '200') {
                mdui.snackbar({
                    message: '取消授权成功',
                    position: 'right-top',
                });
                setTimeout(function () {$('#' + user + '').remove();}, 100);  //jquery移除指定
            } else {
                mdui.snackbar({
                    message: '出现错误<br/>错误信息:' + data['msg'],
                    position: 'right-top',
                });
            }
        },
        complete: function(xhr, textStatus) {
          setTimeout(function () {$.hideOverlay();}, 100); //隐藏遮罩
          $('#loading').hide();
            if (textStatus == 'timeout') {
                mdui.snackbar({
                    message: '请求超时!',
                    position: 'right-top',
                });
            } else if (textStatus !== 'success') {
                mdui.snackbar({
                    message: '出现未知错误,错误代码:' + textStatus,
                    position: 'right-top',
                });
            }
        }
    });
  }
  

  </script>
<?php 
  require_once "../footer.php"; 
}else{
  require_once "../config.php";
  //如果处于添加模式(code不为空)
  $code = $_GET['code'];
  $url = 'https://openid.9420.ltd/v1/token.php?code='. $code . "&client_id=".CLIENT_ID.'&client_secret='.CLIENT_SECRET;
  //echo $url;
  $arr = json_decode(file_get_contents($url),true);
    //print_r($arr);
  if($arr['code'] == '200')
  {
    $url = 'https://openid.9420.ltd/v1/resourse.php?access_token=' . $arr['access_token'].'&client_secret='.CLIENT_SECRET;
    $return = json_decode(file_get_contents($url),true);
    $username = $return['username']; 
    $arr = explode(",",mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `config` WHERE type='xoauth'"))['content']);
    if(empty($arr[0]))
    {
      //防止数据为空的问题
      $arr = array();
    }
    if(array_search($username,$arr) !== false){
      //已有存在的用户
      header("Refresh:0;URL='./oauth.php'");
    } else {
      array_push($arr,$username);
      $str = implode(",",$arr);
      mysqli_query($conn,"UPDATE `config` SET `content`='$str' WHERE `type` = 'xoauth' ");
      header("Refresh:0;URL='./oauth.php'");
    }
  } else{
    echo "<h2>出现未知错误!错误代码:" . $arr['code']."</h2>";
    header("Refresh:2;URL='./oauth.php'");
  }
}?>
