# URLshortening
## 简介
一个url网址缩短平台.
## 安装方法
1.下载源码.<br/>
2.上传至你的网站根目录.<br/>
3.访问网站域名填写mysql等信息进行安装<br/>
4.修改网站伪静态配置:<br/>
Nginx:  
if (!-e $request_filename) {
<br/>rewrite ^/(.*)$ /index.php?id=$1 last;
<br/>}

<br/>Apache:
<IfModule mod_rewrite.c>
<br/>RewriteEngine On
<br/>RewriteCond %{REQUEST_FILENAME} !-f
<br/>RewriteCond %{REQUEST_FILENAME} !-d
<br/>RewriteRule ^(.*)$ /index.php?id=$1 [L]
<br/></IfModule>

IIS请尝试自己转换.
<br/>5.访问网站进行确认.
## 版权
xcsoft版权所有 改源码依据apache2开源协议开源,请不要修改版权信息！
## 更新
v1.7.0更新:
1.首页以及后台更新界面改为ajax请求.
<br />2.Api中增加二维码,同时修改Api返回值.
<br />3.修改整体样式.
<br />4.移除了公告.
<br />5.Bug Fixed
