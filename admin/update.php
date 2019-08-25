<head>
    <title>检查更新</title>
    <?php
    require_once("./header.php");
    $versionnow = $version;
    ?>
</head>
<h2>检查更新：</h2>
<?php
$url = "https://xsot.cn/api/update/?app=urlshorting";
function httpcode($url) {
    $ch = curl_init();
    $timeout = 3;
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_exec($ch);
    return $httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    curl_close($ch);
}
$urlinfo = httpcode($url);
@$data = file_get_contents($url);
@$arr = json_decode($data,true);
@$version = $arr['version'];
@$info = $arr['info'];
if (empty($version)) {
    $urlinfo = "404";
}
//获取网站状态
if ($urlinfo == "200") {
    if ($versionnow !== $version) {
        ?>
        <div class="mdui-card">
            <ul class="mdui-list">
                <center>
                    <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-content">
                            <div class="mdui-list-item-title">
                                <div style="font-size: 22px;font-weight:500;">
                                    检查到新版本!
                                </div>
                            </div>
                        </div>
                    </li>
                </center>
                <div class="mdui-divider"></div>
                <li class="mdui-list-item mdui-ripple">
                    <div class="mdui-list-item-content">
                        <div class="mdui-list-item-title">
                            <div style="font-size: 20px;font-weight:400;" class="mdui-col-xs-5">
                                当前版本:
                            </div>
                            <div style="font-size: 18px;font-weight:400;" class="mdui-col-xs-7">
                                <?php echo $versionnow ?>
                            </div>
                        </div>
                    </div>
                </li>
                <div class="mdui-divider"></div>
                <li class="mdui-list-item mdui-ripple">
                    <div class="mdui-list-item-content">
                        <div class="mdui-list-item-title">
                            <div style="font-size: 20px;font-weight:400;" class="mdui-col-xs-5">
                                最新版本:
                            </div>
                            <div style="font-size: 18px;font-weight:400;" class="mdui-col-xs-7">
                                <?php echo $version;
                                ?>
                            </div>
                        </div>
                    </div>
                </li>
                <div class="mdui-divider"></div>
                <li class="mdui-list-item mdui-ripple">
                    <div class="mdui-list-item-content">
                        <div class="mdui-list-item-title">
                            <div style="font-size: 20px;font-weight:400;" class="mdui-col-xs-5">
                                更新内容:
                            </div>
                            <div style="font-size: 18px;font-weight:400;" class="mdui-col-xs-7">
                                <?php echo $info ?>
                            </div>
                        </div>
                    </div>
                </li>
                <div class="mdui-divider"></div>
                <li class="mdui-list-item mdui-ripple">
                    <div class="mdui-list-item-content">
                        <div class="mdui-list-item-title">
                            <center>
                                <div style="font-size: 20px;font-weight:400;">
                                    请访问Github获取最新版本
                                </div>
                                <br />
                                <button class="mdui-btn mdui-btn-raised mdui-ripple" onclick="window.location.href='//github.com/soxft/Urlshorting'">Github</button>
                            </center>
                        </div>
                    </li>
                </ul>
            </div>
            <?php
        } else {
            ?>
            <div class="mdui-card">
                <ul class="mdui-list">
                    <center>
                        <li class="mdui-list-item mdui-ripple">
                            <div class="mdui-list-item-content">
                                <div class="mdui-list-item-title">
                                    <div style="font-size: 22px;font-weight:500;">
                                        当前已是最新版本!
                                    </div>
                                </div>
                            </div>
                        </li>
                    </center>
                    <div class="mdui-divider"></div>
                    <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-content">
                            <div class="mdui-list-item-title">
                                <div style="font-size: 20px;font-weight:400;">
                                    当前版本:<?php echo $versionnow;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <div class="mdui-divider"></div>
                    <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-content">
                            <div class="mdui-list-item-title">
                                <div style="font-size: 20px;font-weight:400;">
                                    最新版本:<?php echo $version;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <div class="mdui-divider"></div>
                <li class="mdui-list-item mdui-ripple">
                    <div class="mdui-list-item-content">
                        <div class="mdui-list-item-title">
                            <div style="font-size: 20px;font-weight:400;" class="mdui-col-xs-5">
                                当前更新:
                            </div>
                            <div style="font-size: 18px;font-weight:400;" class="mdui-col-xs-7">
                                <?php echo $info ?>
                            </div>
                        </div>
                    </div>
                </li>
                </ul>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="mdui-card mduicards">
            <div class="mdui-list-item-content">
                <center>
                    <div class="mdui-list-item-title">
                        <h3>检查更新失败,错误代码:<?php echo $urlinfo ?></h3>
                    </div>
                </center>
            </div>
        </div>
        <br />
        <?php
    }
    ?>


    <?php
    require_once("../footer.php");
    ?>
