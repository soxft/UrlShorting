<head>
    <title>检查更新</title>
    <?php require_once( "./header.php"); ?>
</head>
<h2>检查更新：</h2>
<div class="mdui-card">
    <ul class="mdui-list">
        <center>
            <li class="mdui-list-item mdui-ripple">
                <div class="mdui-list-item-content">
                    <div class="mdui-list-item-title">
                        <div style="font-size: 22px;font-weight:500;">
                            <button onClick="Submit(this);" id="Submit" class="mdui-btn mdui-btn-raised mdui-ripple">检查更新</button>
                        </div>
                    </div>
                </div>
            </li>
        </center>
        <div class="mdui-divider"></div>
        <li class="mdui-list-item mdui-ripple">
            <div class="mdui-list-item-content">
                <div class="mdui-list-item-title">
                    <div style="font-size: 20px;font-weight:400;" class="mdui-col-xs-5">当前版本:</div>
                    <div style="font-size: 18px;font-weight:400;" class="mdui-col-xs-2">
                        <?php echo $version ?>
                    </div>
                </div>
            </div>
        </li>
        <div class="mdui-divider"></div>
        <li class="mdui-list-item mdui-ripple">
            <div class="mdui-list-item-content">
                <div class="mdui-list-item-title">
                    <div style="font-size: 20px;font-weight:400;" class="mdui-col-xs-5">最新版本:</div>
                    <div style="font-size: 18px;font-weight:400;" class="mdui-col-xs-5">
                        <input id="version" style="outline:none;background-color:transparent;border:0;" readonly="readonly" value="待获取" />
                    </div>
                </div>
            </div>
        </li>
        <div class="mdui-divider"></div>
        <li class="mdui-list-item mdui-ripple">
            <div class="mdui-list-item-content">
                <div class="mdui-list-item-title">
                    <div style="font-size: 20px;font-weight:400;" class="mdui-col-xs-5">更新内容:</div>
                    <div style="font-size: 18px;font-weight:400;" class="mdui-col-xs-7">
                        <textarea row="" id="content" style="outline:none;background-color:transparent;border:0;height:125px" readonly="readonly">待获取</textarea>
                    </div>
                </div>
            </div>
        </li>
    </ul>
  </div>
<script>
function Submit(obj) {
    document.getElementById("Submit").innerHTML = "获取中...";
    obj.setAttribute("disabled", true);
    var version = "<?php echo $version ?>";
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../app/update.php");
    xhr.setRequestHeader('Content-Type', ' application/x-www-form-urlencoded');
    xhr.send("version=" + version );
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          obj.removeAttribute("disabled");
          var callback = eval(xhr.responseText);
          var code = callback[0];
          if(code == "new")
          {
            document.getElementById("Submit").innerHTML = "检测到新版本!"; 
          }else if(code == "latest")
          {
            document.getElementById("Submit").innerHTML = "当前已是最新版本!"; 
          }else if(code == "change"){
            document.getElementById("Submit").innerHTML = "请不要修改版权"; 
          }else{
            document.getElementById("Submit").innerHTML = "检测更新"; 
          }
          if (code == "new") {
            var version = callback[1];
            var content = callback[2];
            output(version,content);
          }else if(code == "latest")
          {
            var version = callback[1];
            var content = callback[2];
            output(version,content);
          }else if(code == "change")
          {
            output("获取失败","请不要修改版权");
          }else{
            var errorcode = callback[1];
            output("获取失败","错误代码:"+ errorcode);
          }
        }
    }
}
function output(version,content)
 {
    var vs=document.getElementById("version");
    var ct=document.getElementById("content");
    vs.value = version;
    ct.value = content;
 }
</Script>
    <?php require_once( "../footer.php"); ?>