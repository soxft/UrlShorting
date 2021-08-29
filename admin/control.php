<html>
<head>
    <title>短域管理</title>
    <?php
    $Yourdomain = $_SERVER['HTTP_HOST'];
    require_once("./header.php");
    $p = $_GET['p'];
    if(empty($p) || $p < "1")
    {
      $p = "1";  //如果没有page那就定义一个默认的page  = 0
    }
    $page  = ($p - 1) * $px;
    //计算出第几条数据
  $mysql = "select * from `TABLES` where `TABLE_NAME`='information';";
  $result = mysqli_query($conns,$mysql);
  $arr = mysqli_fetch_assoc($result);
  $page_allx =  $arr['TABLE_ROWS'];  //所有数据
 if($page_allx >= $px)
 {
  if($page_allx % $px == 0){
    $page_all = $page_allx / $px; // 计算总共页数  
  }else{
    $page_all = ($page_allx - ($page_allx % $px)) / $px;
  }
 }else{
   $page_all = 1;
 }
    echo "<h4>TIP:因字符原因,表格显示不全,手机用户可以向左滑动看到更多信息,电脑用户翻阅到表格最下端拖动控制条.</h4>";
    echo "<br /><center><div class=\"mdui-table-fluid\">
                        <table class=\"mdui-table mdui-table-hoverable\">
                            <tr>
                                <th>短域</th>
                                <th>内容</th>
                                <th>种类</th>
                                <th>ip</th>
                                <th>密码</th>
                                <th>时间</th>
                                <th>短域状态</th>
                                <th>IP状态</th>
                                <th>管理</th>
                            </tr>";
// 表格开头
  $comd = "SELECT * FROM `information` order by time DESC limit $page,$px";
    $sql = mysqli_query($conn,$comd);
    while ($row = mysqli_fetch_object($sql)) {
        $comd1 = "SELECT * FROM `ban` WHERE content='$row->shorturl'";
        $count1 = mysqli_query($conn,$comd1);
        $arr2 = mysqli_fetch_assoc($count1);
        $type = $arr2['type'];
        if (empty($type)) {
            $check = "正常";
        } else {
            $check = "BAN";
        }
        $comd2 = "SELECT * FROM `ban` WHERE content='$row->ip'";
        $count2 = mysqli_query($conn,$comd2);
        $arr3 = mysqli_fetch_assoc($count2);
        $type2 = $arr3['type'];
        if (empty($type2)) {
            $check2 = "正常";
        } else {
            $check2 = "BAN";
        }    //判断是否已经被ban
        $information = mb_strlen($row->information) >= 20 ? mb_substr($row->information,0,20) : $row->information;
            echo "
      <tr>
        <td>$row->shorturl</td>
        <td>$information</td>
        <td>$row->type</td>
        <td>$row->ip</td>
        <td>$row->passwd</td>
        <td>".date("Y-m-d H:i:s",$row->time)."</td>
        <td>$check</td>
        <td>$check2</td>
        <td>
           <a href=https://$Yourdomain/$row->shorturl class=\"mdui-btn mdui-btn-raised mdui-ripple\" target=“_blank”>访问</a>
           <a href=\"./processing.php?shorturl=$row->shorturl&&type=del\" class=\"mdui-btn mdui-btn-raised mdui-ripple\">删除</a>";
if($check=="正常"){
  echo "<a href=\"./processing.php?shorturl=$row->shorturl&&type=domain\" class=\"mdui-btn mdui-btn-raised mdui-ripple\">封短域</a>";
}else{
  echo "<a href=\"./processing.php?content=$row->shorturl&&type=cancel&&from=control\" class=\"mdui-btn mdui-btn-raised mdui-ripple\">解短域</a>";
}
if($check2=="正常"){
  echo "<a href=\"./processing.php?ip=$row->ip&&type=ip\" class=\"mdui-btn mdui-btn-raised mdui-ripple\">封ip</a>";
}else{
  echo "<a href=\"./processing.php?content=$row->ip&&type=cancel&&from=control\" class=\"mdui-btn mdui-btn-raised mdui-ripple\">解IP</a>";
}              
     echo"</td></tr>";
    }
    echo "</table></div>";
    
    $page_next = $p+1;
    $page_last = $p-1;
    //计算一下上一页或者下一页的page
    echo "<br />";
    if($p != 1){
      echo  "<a href=\"./control.php?p=$page_last\" class=\"mdui-btn mdui-btn-raised mdui-ripple\">上一页</a>";
    }
    echo "&emsp;"; 
    if($p != $page_all){
      echo "<a href=\"./control.php?p=$page_next\" class=\"mdui-btn mdui-btn-raised mdui-ripple\">下一页</a>"; 
    }
    //按钮跳转
    echo "<br />";
    ?>
</body>
<?php require_once("../footer.php");
?>
