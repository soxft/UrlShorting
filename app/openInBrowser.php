<html>
                <head>
                  <meta charset="UTF-8">
                  <title>请使用浏览器打开</title>
                  <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico" media="screen" />
                  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
                  <meta content="yes" name="apple-mobile-web-app-capable">
                  <meta content="black" name="apple-mobile-web-app-status-bar-style">
                  <meta name="format-detection" content="telephone=no">
                  <meta content="false" name="twcClient" id="twcClient">
                  <meta name="aplus-touch" content="1">
                  <style>                         
                    body,html{width:100%;height:100%}
                    *{margin:0;padding:0}
                    body{background-color:#fff}
                    .top-bar-guidance{font-size:15px;color:#fff;height:70%;line-height:1.8;padding-left:20px;padding-top:20px;background:url(//gw.alicdn.com/tfs/TB1eSZaNFXXXXb.XXXXXXXXXXXX-750-234.png) center top/contain no-repeat}
                    .top-bar-guidance .icon-safari{width:25px;height:25px;vertical-align:middle;margin:0 .2em}
                    .app-download-tip{margin:0 auto;width:290px;text-align:center;font-size:15px;color:#2466f4;background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAcAQMAAACak0ePAAAABlBMVEUAAAAdYfh+GakkAAAAAXRSTlMAQObYZgAAAA5JREFUCNdjwA8acEkAAAy4AIE4hQq/AAAAAElFTkSuQmCC) left center/auto 15px repeat-x}
                    .app-download-tip .guidance-desc{background-color:#fff;padding:0 5px}
                    .app-download-btn{display:block;width:214px;height:40px;line-height:40px;margin:18px auto 0 auto;text-align:center;font-size:18px;color:#2466f4;border-radius:20px;border:.5px #2466f4 solid;text-decoration:none}
                  </style>
                </head>
                <body>
                  <div class="top-bar-guidance">
                    <p>点击右上角<img src="//gw.alicdn.com/tfs/TB1xwiUNpXXXXaIXXXXXXXXXXXX-55-55.png" class="icon-safari"> <span id="openm">浏览器打开</span></p>
                    <p>可以继续浏览本站哦~</p>
                  </div>
                  <div class="app-download-tip">
                    <span class="guidance-desc">或者复制本站网址自行打开</span>
                  </div>
                  <script src="https://cdn.bootcdn.net/ajax/libs/clipboard.js/2.0.11/clipboard.min.js"></script>
                  <script src="https://lf6-cdn-tos.bytecdntp.com/cdn/expire-1-M/mdui/0.4.3/js/mdui.min.js"></script>
                  <link rel="stylesheet" href="https://lf6-cdn-tos.bytecdntp.com/cdn/expire-1-M/mdui/0.4.3/css/mdui.min.css">
                  <a data-clipboard-text="<?php echo $url . $id ?>" class="app-download-btn">点此复制本站网址</a>
                  <script type="text/javascript">
                    new ClipboardJS(".app-download-btn");
                    $(".app-download-btn").click(function() {
                      mdui.snackbar({
                        message: "链接已复制"
                    });
                    })
                  </script>
                </html>