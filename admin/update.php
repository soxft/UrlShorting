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
                          <div class="mdui-list-item-content" style="font-weight:500;"> 当前版本: <?php echo $version?></div>
                        </li>
                        <li class="mdui-list-item mdui-ripple"> 
                          <i class="mdui-list-item-avatar mdui-icon material-icons">radio_button_unchecked</i>
                          <div class="mdui-list-item-content" style="font-weight:500;">最新版本: <div id="newVersion" class="mdui-spinner mdui-spinner-colorful" style="height:20px;width:20px;left:20px"></div></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
    var $ = mdui.JQ;
    //make ajax request
    welcome = mdui.snackbar({
      message: '正在获取新版本中...',
      position: 'right-top'
    });
    $.ajax(
      {
        method: 'GET',
        url: 'https://xsot.cn/api/update/',
        timeout: 10000,
        data: {
          app: 'urlshorting'
        },
        success: function(data)
        {
          data = eval('(' + data + ')');
          console.log(data)
          //console.log(data);
          //turn json into jsboject
          newversion = data['version'];
          info = data['info'];
          url = data['githubUrl'];
          if('<?php echo $version ?>' !== newversion)
          {
            mdui.snackbar({
              message: '检测到新版本!',
              position: 'right-top'
            });
            mdui.dialog({
                title: '最新版本: ' + newversion,
                content: info,
                buttons: [{
                        text: '稍后更新',
                        bold: false,
                        close: true
                },{
                        text: '前往Github更新',
                        bold: false,
                        onClick: function(inst){
                          console.log(inst)
                          window.open('' + url + '');
                        },
                        close: false,
                }],
                stackedButtons:true
            });
          }else{
            mdui.snackbar({
              message: '当前已是最新版本!',
              position: 'right-top'
            });
          }
          $('#newVersion').replaceWith('<span style="font-weight:500; id="newVersion">' + newversion + '</span>')
          
        },
        complete: function (xhr, textStatus) 
        {
          welcome.close();
          
          if(textStatus == 'timeout')
          {
            $('#newVersion').replaceWith('<span style="font-weight:500; id="newVersion">请求超时!</span>')
            mdui.snackbar({
              message: '请求超时!',
              position: 'right-top'
            });
          }else
          {
            if(textStatus !== 'success'){
              mdui.snackbar({
                message: '发现未知错误,请稍后再试.',
                position: 'right-top'
              });
            }
          }
        }
      });
    </script>
</body>
    <?php require_once "../footer.php" ?>
