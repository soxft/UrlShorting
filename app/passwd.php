<?php
/*
    加密页面
    Date:20200723
    Author : XCSOFT 
    提供session实现
*/
session_start();
if (isset($_POST['passwd'])) {
    if ($_POST['passwd'] == $_SESSION['shorturl_passwd']) {
        $_SESSION['id'] = $_POST['id'];
        echo 200;
        exit();
    } else {
        echo 1001;
        exit();
    }
} else {
?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css">
        <script src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"></script>
        <title>
            加密页面 - Powered by XCSOFT
        </title>
    </head>

    <body>
        <div style="Height:40px"></div>
        <div class="mdui-container" style="max-width: 400px;">
            <div class="mdui-card">
                <div class="mdui-card-menu">
                    <button onclick="window.location.href='/'" class="mdui-btn mdui-btn-icon mdui-text-color-grey"><i class="mdui-icon material-icons">home</i>
                    </button>
                </div>
                <div class="mdui-card-primary">
                    <div class="mdui-card-primary-title">请输入密码</div>
                    <div class="mdui-card-primary-subtitle">Please Input Passwd</div>
                </div>
                <div class="mdui-card-content">
                    <div class="mdui-textfield">
                        <input class="mdui-textfield-input" id="passwd" type="password" placeholder="请输入密码" />
                    </div>
                    <br>
                </div>
                <div class="mdui-card-actions">
                    <center>
                        <button id="btn" onclick="submit()" class="mdui-btn mdui-ripple mdui-btn-dense">确认</button>
                    </center>
                </div>
            </div>
        </div>
        <script>
            console.log("\n %c 星辰短域|密语 %c Powered by XCSOFT | xsot.cn ", "color:#444;background:#eee;padding:5px 0;", "color:#eee;background:#444;padding:5px 0;");
            var $ = mdui.JQ;

            function submit() {
                passwd = $('#passwd').val();
                $('#btn').attr('disabled', true);
                $('#btn').text('处理中...');
                //构建ajax请求
                $.ajax({
                    method: 'post',
                    url: 'app/passwd.php',
                    timeout: 100000,
                    data: {
                        passwd: passwd,
                        id: '<?php echo $id ?>'
                    },
                    success: function(data) {
                        if (data == 200) {
                            mdui.snackbar({
                                message: '密码正确,跳转中..',
                                position: 'right-top'
                            });
                            window.setTimeout("window.location.reload();", 3000);
                        } else {
                            mdui.snackbar({
                                message: '密码错误!',
                                position: 'right-top'
                            });
                        }
                    },
                    complete: function(xhr, status) {
                        $('#btn').text('确认');
                        $('#btn').removeAttr('disabled')
                        if (status == 'timeout') {
                            mdui.snackbar({
                                message: '请求超时!',
                                position: 'right-top'
                            });
                        }
                    }
                });
            }
        </script>
    <?php } ?>
    </body>