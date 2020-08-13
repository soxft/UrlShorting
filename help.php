<?php require_once "header.php"; ?>
<div class="mdui-container doc-container">
    <div class="mdui-typo">
        <h2>帮助</h2>
        1.输入短域请加上http(s)://<br />
        2.中文域名请手动Punycode编码后再使用<br />
        3.网址最长支持1000字符<br />
        4.密语最长支持3000字符(合1000汉字)<br />
        5.手动填写短域以及密码为可选项目<br />
        6.密码限制2-20位(数字密码组合)/短域限制输入<?php echo $pass ?>位<br />
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
                        <td>url</td>
                        <td>需要缩短的网址(优先于密语)</td>
                    </tr>
                    <tr>
                        <td>message</td>
                        <td>需要缩短的密语</td>
                    </tr>
                    <tr>
                        <td>shorturl</td>
                        <td>自定义短域(可选)</td>
                    </tr>
                    <tr>
                        <td>passwd</td>
                        <td>加密密码(可选)</td>
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
                        <td>状态码,见下表</td>
                    </tr>
                    <tr>
                        <td>shorturl</td>
                        <td>生成的短网址,只有在code为200时才会返回</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mdui-container doc-container">
            <div class="mdui-typo">
                <h2>状态码释义</h2>
                <div class="mdui-table-fluid">
                    <table class="mdui-table mdui-table-hoverable">
                        <thead>
                            <tr>
                                <th>状态码</th>
                                <th>含义</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>200</td>
                                <td>成功</td>
                            </tr>
                            <tr>
                                <td>1002</td>
                                <td>您的IP或短域被封禁</td>
                            </tr>
                            <tr>
                                <td>1001</td>
                                <td>非法的输入</td>
                            </tr>
                            <tr>
                                <td>2001/2002</td>
                                <td>非法的自定义短域</td>
                            </tr>
                            <tr>
                                <td>2003</td>
                                <td>自定义短域已被使用</td>
                            </tr>
                            <tr>
                                <td>3001/3002</td>
                                <td>非法的密码</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "footer.php"; ?>