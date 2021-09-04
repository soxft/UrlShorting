<head>
    <title>检查更新</title>
    <?php require_once "header.php"  ?>
</head>
<body>
    <div class="mdui-container">
        <div class="mdui-typo">
             <h2 class="doc-chapter-title doc-chapter-title-first">检查更新</h2>
            <div class="mdui-container">
                <div class="mdui-typo">
                    <ul class="mdui-list">
                        <li class="mdui-list-item mdui-ripple"> 
                          <i class="mdui-list-item-avatar mdui-icon material-icons">border_vertical</i>
                          <div class="mdui-list-item-content" style="font-weight:500;"> 当前版本: <?php echo $version?>（请自行核对版本号是否一致）</div>                         
                        </li>
                        <li class="mdui-list-item mdui-ripple"> 
                          <i class="mdui-list-item-avatar mdui-icon material-icons">radio_button_unchecked</i>
                          <div class="mdui-list-item-content" style="font-weight:500;">最新版本: 
                          <a href = "https://github.com/soxft/UrlShorting/releases">
                          <img alt="GitHub commits since latest release (by SemVer)" src="https://img.shields.io/github/commits-since/soxft/urlshorting/latest?style=for-the-badge"></a>
                          </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
    <?php require_once "../footer.php" ?>
