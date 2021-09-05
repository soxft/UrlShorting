<?php require_once "header.php"; 
 $version = "V2.2.3";
?>
<title>首页</title>
<div style="Height:20px"></div>
<div class="mdui-container">
  <h2 style="font-weight:400">官方信息</h2>
  <ul class="mdui-list">
      <div class="mdui-list-item-content">
        当前版本：<?php echo $version?>
      </div>
  </li>
        <a href="http://www.apache.org/licenses/LICENSE-2.0.html"> 
        <img src="https://img.shields.io/github/license/soxft/URLshorting.svg?style=for-the-badge" alt="License"></a>
        <a href="https://github.com/soxft/URLshorting/stargazers"> 
        <img src="https://img.shields.io/github/stars/soxft/URLshorting.svg?style=for-the-badge" alt="GitHub stars"></a>
        <a href="https://github.com/soxft/URLshorting/network/members"> 
        <img src="https://img.shields.io/github/forks/soxft/URLshorting.svg?style=for-the-badge" alt="GitHub forks"></a> 
        <a href = "https://github.com/soxft/UrlShorting/releases">
        <img alt="GitHub commits since latest release (by SemVer)" src="https://img.shields.io/github/commits-since/soxft/urlshorting/latest?style=for-the-badge"></a>
    </li>
  </ul>
</div>
</div>
<div class="mdui-container">
  <h2 style="font-weight:400">系统信息</h2>
  <ul class="mdui-list">
    <li class="mdui-list-item mdui-ripple">
      <i class="mdui-list-item-icon mdui-icon material-icons">grain</i>
      <div class="mdui-list-item-content">
        短域: <?php getNum($conns,'information') ?>个
      </div>
    </li>
    <li class="mdui-list-item mdui-ripple">
      <i class="mdui-list-item-icon mdui-icon material-icons">not_interested</i>
      <div class="mdui-list-item-content">
        BAN: <?php getNum($conns,'ban') ?>个
      </div>
    </li>
    <li class="mdui-list-item mdui-ripple">
      <i class="mdui-list-item-icon mdui-icon material-icons">panorama_vertical</i>
      <div class="mdui-list-item-content">
        PHP版本: <?PHP echo PHP_VERSION; ?>
      </div>
    </li>
    <li class="mdui-list-item mdui-ripple">
      <i class="mdui-list-item-icon mdui-icon material-icons">airplay</i>
      <div class="mdui-list-item-content">
        系统: <?PHP echo php_uname('s'); ?>
      </div>
    </li>
    <li class="mdui-list-item mdui-ripple">
      <i class="mdui-list-item-icon mdui-icon material-icons">web</i>
      <div class="mdui-list-item-content">
        服务端: <?PHP echo $_SERVER['SERVER_SOFTWARE']; ?>
      </div>
    </li>
    <li class="mdui-list-item mdui-ripple">
      <i class="mdui-list-item-icon mdui-icon material-icons">dns</i>
      <div class="mdui-list-item-content">
        主机名: <?PHP echo php_uname('n');  ?>
      </div>
    </li>
  </ul>
</div>
<?php
function getNum($conns,$tablename){
    echo mysqli_fetch_assoc(mysqli_query($conns,"select * from `TABLES` where `TABLE_NAME`='$tablename'"))['TABLE_ROWS'];
}
?>
<?php require_once "../footer.php";  ?>