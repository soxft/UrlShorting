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
v1.6.4更新:
<br />1.取消Url跳转时的样式,加快了跳转速度.
<br />2.后台新增检查更新.
<br />3.新增换行机制,密语不会出现不换行的情况了.

TIP:往期更新请查看根目录下的CHANGELOG.md
