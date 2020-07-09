<?php require_once("app/getMaindomain.php") ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/soxft/cdn@master/mdui/css/mdui.min.css">
        <script src="https://cdn.jsdelivr.net/gh/soxft/cdn@master/mdui/js/mdui.min.js"></script>
        <title>
            <?php echo($title);?>
        </title>
    </head>
    <body>
    <div style="Height:30px"></div>
    <div class="mdui-container" style="max-width: 400px;">
        <br>
        <br>
        <div class="mdui-card">
                <div class="mdui-card-menu">
                    <button onclick="window.location.href='/'" class="mdui-btn mdui-btn-icon mdui-text-color-grey"><i class="mdui-icon material-icons">home</i>
                    </button>
                </div>
            <div class="mdui-card-primary">
                <div class="mdui-card-primary-title"><?php echo getTopHost($information) ?></div>
                <div class="mdui-card-primary-subtitle"></div>
            </div>
            <div class="mdui-card-content">即将跳转到:&nbsp;
                <div class="mdui-chip"><span class="mdui-chip-title" id="url"></span>
                </div>
                <br>
            </div>
            <div class="mdui-card-actions">
                <center>
                    <button onclick="window.location.href='<?php echo $information ?>'" class="mdui-btn mdui-ripple mdui-btn-dense">跳转中...</button>
                </center>
            </div>
        </div>
    </div>
    <script>
    console.log("\n %c 星辰短域|密语 %c Powered by XCSOFT | xsot.cn ","color:#444;background:#eee;padding:5px 0;", "color:#eee;background:#444;padding:5px 0;");
    var $ = mdui.JQ;
	  $('#url').html(str_split('<?php echo $information ?>','32'))
  	function str_split(string, len){
		var new_string = "";
		if (string.length > len) {
			new_string = string.substring(0, len);
  		new_string += "..."
		}
		else {
			new_string = string;
		}
		return new_string;
	}
	//跳转
	window.setTimeout("window.location='<?php echo $information ?>'",2000);
  </script>
  </body>