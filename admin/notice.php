<html>
<head>
  <title>公告信息修改</title>
  <?php require_once("./header.php");
  ?>
</head>
<body>
  <?php
  $commd1 = "select * from notice where updater='adminer'";
  $result = mysqli_query($conn,$commd1);
  $arr1 = mysqli_fetch_assoc($result);
  $notice = $arr1['notices'];
  echo("<h3>修改公告：</h3>");
if(isset($_POST['submit'])){
  $notice=$_POST['notice'];
  $comd="update notice set notices='$notice' where updater='adminer';";
                $result=mysqli_query($conn,$comd);
                echo("<center><h2>公告更新成功！</h2></center>");
                header("Refresh:2;url=\"./notice.php\"");
}else{
  ?>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="mdui-textfield mdui-textfield-floating-label">
      <label class="mdui-textfield-label">当前公告:</label>
      <input name="notice" type="text" value="<?php echo($notice);
      ?>" class="mdui-textfield-input" />
    </div>
    <br/>
    <center>
      <input class="mdui-btn mdui-btn-raised mdui-ripple" type="submit" name="submit" value="修改" />
    </center>
  </form>
  <?php 
  }
  require_once("../footer.php");
  ?>