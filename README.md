# URLshortening
## 简介
一个url网址缩短平台.
## 安装方法
1.下载源码.<br/>
2.拷贝至你的网站根目录.<br/>
3.上传mysql数据,并修改根目录下config.php中数据库等信息<br/>
4.修改网站伪静态配置:<br/>
Nginx:  
if (!-e $request_filename) {
<br/>        rewrite ^(.*)/([0-9a-zA-Z]*)$ $1/index.php?id=$2 last;
<br/>}
<br/>APache,IIS请尝试自己转换.
<br/>5.访问网站进行确认.
## 版权
xcsoft版权所有
## 更新
v1.3更新:
<br/>1.修改核心功能的结构及算法.
<br/>2.新增显示二维码功能.
<br/>3.首页显示api使用教程.
<br/>4.修改了api返回值.

v1.2更新:
<br/>1.现在在QQ中打开会提示选择浏览器打开!
<br/>2.菜单栏变得更好看了.
<br/>3:更新了api功能!

