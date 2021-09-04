<!-- 本源码基于apache2开源，你可以在不修改版权的基础上任意修改其他内容 -->
<!--修改建站日期请前往line 41-->
<br />
<footer>
    <script>
    fetch('https://v1.hitokoto.cn')
        .then(function (res) {
        return res.json();
    })
        .then(function (data) {
        var hitokoto = document.getElementById('hitokoto');
        hitokoto.innerText = data.hitokoto;
    })
        .
    catch (function (err) {
        console.error(err);
    })
    console.log("\n %c 星辰短域|密语 %c Powered by XCSOFT | xsot.cn ", "color:#444;background:#eee;padding:5px 0;", "color:#eee;background:#444;padding:5px 0;");
    </script>
    <?php //从url中提取host
    $arr = parse_url($url);
    $host = $arr['host'];
    ?>

    <center>

        <div class="mdui-divider"></div>
        <p><a class="mdui-text-color-grey-800" href=<?php echo $url ?>>👉转到主页👈</a></p>
        <p id="hitokoto">:D 获取中...</p>
        <div class="footer-copyright">Copyright © 2019-
            <?php echo date( 'Y') ?> <a class="mdui-text-color-grey-800" href="http://xsot.cn">XCSOFT</a> All rights reserved.⚡ 
            <p>Secondary Developed By <?php echo date( 'Y') ?>-<a class="mdui-text-color-grey-800" href=""> k6o</a>.😉</p>
        </div>
       
        
            <!--网站运行时间,请自行修改date数值(line 41)-->
            <p id="RunTime" style="color:Dark;"></p>
               <script>
                 var BootDate = new Date("2021/06/13 00:00:00");
                 function ShowRunTime(id) {
                 var NowDate = new Date();
                 var RunDateM = parseInt(NowDate - BootDate);
                 var RunDays = Math.floor(RunDateM/(24*3600*1000));
                 var RunHours = Math.floor(RunDateM%(24*3600*1000)/(3600*1000));
                 var RunMinutes = Math.floor(RunDateM%(24*3600*1000)%(3600*1000)/(60*1000));
                 var RunSeconds = Math.round(RunDateM%(24*3600*1000)%(3600*1000)%(60*1000)/1000);
                 var RunTime = RunDays + "天" + RunHours + "时" + RunMinutes + "分" + RunSeconds + "秒";
                 document.getElementById(id).innerHTML = "本站已稳定运行:" + RunTime;
                 }
                 setInterval("ShowRunTime('RunTime')", 1000);
               </script>      
    <a href="http://www.apache.org/licenses/LICENSE-2.0.html"> 
<img src="https://img.shields.io/github/license/soxft/URLshorting.svg?style=for-the-badge" alt="License"></a>
<a href="https://github.com/soxft/URLshorting/stargazers"> 
<img src="https://img.shields.io/github/stars/soxft/URLshorting.svg?style=for-the-badge" alt="GitHub stars"></a>
<a href="https://github.com/soxft/URLshorting/network/members"> 
<img src="https://img.shields.io/github/forks/soxft/URLshorting.svg?style=for-the-badge" alt="GitHub forks"></a> 
<a href = "https://github.com/soxft/UrlShorting/releases">
<img alt="GitHub last commit" src="https://img.shields.io/github/last-commit/soxft/urlshorting?style=for-the-badge"></a>
</center>
    </center>
<!-- 
    需要的话自己删除注释
<center>
<div title="MySSL 安全签章" id="myssl_seal" onclick="window.open('https://myssl.com/seal/detail?domain=<?php echo $host ?>','MySSL安全签章','height=800,width=470,top=0,right=0,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,status=no')" style="text-align: center"><img src="https://sealres.myssl.com/seal/img/1x/seal.svg?domain=s.k6o.top" alt="MySSL 安全签章" style="width: 100px; height: auto; cursor: pointer"></div>
</center>
<div id="cc-myssl-id" style="position: fixed;right: 0;bottom: 0;width: 65px;height: 65px;z-index: 99;">
    <a href="https://myssl.com/<?php echo $host ?>?from=mysslid"><img src="https://static.myssl.com/res/images/myssl-id.png" alt="" style="width:100%;height:100%"></a>
</div>
 -->
</footer>