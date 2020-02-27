<?php require_once "header.php"; ?>
<div class="mdui-container doc-container">
    <div class="mdui-typo">
         <h2>帮助</h2>
        1.输入短域请加上http(s)://<br />
        2.网址最长支持1000字符<br />
        3.密语最长支持3000字符(合1000汉字)<br />
    </div>
</div>
<div class="mdui-container doc-container">
    <div class="mdui-typo">
         <h2>Api接口</h2>
        <div class="mdui-table-fluid">
            <table class="mdui-table mdui-table-hoverable">
                <thead>
                    <tr>
                        <th>说明</th>
                        <th>Api接口</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>短域</td>
                        <td>
                            <?php echo $url ?>api.php?d=所需缩短的网址</td>
                    </tr>
                    <tr>
                        <td>密语</td>
                        <td>
                            <?php echo $url ?>api.php?m=你所需的密语</td>
                    </tr>
                    <tr>
                        <td>注意</td>
                        <td>请先将长网址或密语中所有的'&'替换为'~'后再使用api接口!</td>
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