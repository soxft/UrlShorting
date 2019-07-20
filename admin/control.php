<html>
<head>
    <title>短域管理</title>
    <?php
    require_once("./header.php");
    $comd = "SELECT * FROM information order by time DESC";
    $sql = mysqli_query($conn,$comd);
    $arr=mysqli_fetch_assoc($sql);
    $shorturl=$arr['shorturl'];
     if (empty($shorturl))
  {
    echo("<center><h2>暂时没有更多信息</h2></center>");
    require_once("../footer.php");
    exit();
  }else{
        echo "<h4>TIP:因字符原因,表格显示不全,手机用户可以向左滑动看到更多信息,电脑用户翻阅到表格最下端拖动控制条.</h4>";
    echo "<br /><center><div class=\"mdui-table-fluid\">
                        <table class=\"mdui-table mdui-table-hoverable\">
                            <tr>
                                <th>短域</th>
                                <th>内容</th>
                                <th>种类</th>
                                <th>ip</th>
                                <th>时间</th>
                                <th>短域状态</th>
                                <th>IP状态</th>
                                <th>管理</th>
                            </tr>";
  }
  $comd = "SELECT * FROM information order by time DESC";
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
            echo("
      <tr>
        <td>$row->shorturl</td>
        <td>$row->information</td>
        <td>$row->type</td>
        <td>$row->ip</td>
        <td>$row->time</td>
        <td>$check</td>
        <td>$check2</td>
              <td>
              <a href=\"./processing.php?shorturl=$row->shorturl&&type=del\" class=\"mdui-btn mdui-btn-raised mdui-ripple\">删除</a>
              <a href=\"./processing.php?shorturl=$row->shorturl&&type=domain\" class=\"mdui-btn mdui-btn-raised mdui-ripple\">封短域</a>
              <a href=\"./processing.php?ip=$row->ip&&type=ip\" class=\"mdui-btn mdui-btn-raised mdui-ripple\">封ip</a>
              </td>

      </tr>");
    }
    echo("</table></div>");
    ?>
</body>
<?php require_once("../footer.php");
?>