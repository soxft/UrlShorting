<html>
<head>
  <title>BAN</title>
  <?php
  require_once("./header.php");
  $comd = "SELECT * FROM `ban` order by time DESC";
  $sql = mysqli_query($conn,$comd);
  $arr=mysqli_fetch_assoc($sql);
  $content=$arr['content'];
  if (empty($content))
  {
    echo("<center><h2>暂时没有更多信息</h2></center>");
    require_once("../footer.php");
    exit();
  }else{
    echo "已被ban列表:<br /><br /><center><div class=\"mdui-table-fluid\">
                        <table class=\"mdui-table mdui-table-hoverable\">
                            <tr>
                                <th>种类</th>
                                <th>IP或短域</th>
                                <th>状态</th>
                            </tr>";
  }
  $comd = "SELECT * FROM `ban` order by time DESC";
  $sql = mysqli_query($conn,$comd);
  while ($row = mysqli_fetch_object($sql)) {
      echo("
      <tr>
        <td>$row->type</td>
        <td>$row->content</td>
              <td>
              <a href=\"./processing.php?content=$row->content&&type=cancel&&from=ban\" class=\"mdui-btn mdui-btn-raised mdui-ripple\">解除</a>
              </td>

      </tr>");
  }
  echo("</table></div>");
  ?>
</body>
<?php 
require_once("../footer.php");
?>
