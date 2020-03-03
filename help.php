<?php require_once "header.php"; ?>
<div class="mdui-container doc-container">
    <div class="mdui-typo">
         <h2>帮助</h2>
         1.输入短域请加上http(s)://<br />
         2.中文域名请手动Punycode编码后再使用<br />
         3.网址最长支持1000字符<br />
         4.密语最长支持3000字符(合1000汉字)
    </div>
</div>
<div class="mdui-container doc-container">
    <div class="mdui-typo">
         <h2>Api接口</h2>
        <div class="mdui-table-fluid">
            <table class="mdui-table mdui-table-hoverable">
                <tbody>
                    <tr>
                        <td>接口地址</td>
                        <td>
                            <?php echo $url ?>api.php</td>
                    </tr>
                    <tr>
                        <td>注意</td>
                        <td>请使用post来访问Api</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mdui-table-fluid">
            <table class="mdui-table mdui-table-hoverable">
                <thead>
                    <tr>
                        <th>参数名</th>
                        <th>含义</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>d</td>
                        <td>需要缩短的网址</td>
                    </tr>
                    <tr>
                        <td>m</td>
                        <td>需要缩短的密语</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mdui-table-fluid">
            <table class="mdui-table mdui-table-hoverable">
                <thead>
                    <tr>
                        <th>返回值(json)</th>
                        <th>含义</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>code</td>
                        <td>状态码:200->成功 | 1001->非法的URL或密语 1002->访问者的IP或该短域已被封禁</td>
                    </tr>
                    <tr>
                        <td>shorturl</td>
                        <td>生成的短网址,只有在code为200时才会返回</td>
                    </tr>
                    <tr>
                        <td>qrcode</td>
                        <td>短域二维码,只有在code为200时才会返回,不会长期保存</td>
                    </tr>                    
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once "footer.php"; ?>