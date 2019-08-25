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
xcsoft版权所有
<br />本源码基于apache2.0协议开源，你可以在不修改版权的前提下修改任意内容。如果有些强迫症真的想要修改，请在 https://blog.xsot.cn/archives/pro-URLshorting.html 留言申请，如发现未申请者修改了版权，您的网站将会被记录并在下方公示 !
## 更新
v1.6.4更新:
<br />1.取消Url跳转时的样式,加快了跳转速度.
<br />2.后台新增检查更新.
<br />3.新增换行机制,密语不会出现不换行的情况了.
<br />4.再次提示：自1.4.4版本起我们会记录您的ip地址以及网站域名以检测您是否修改版权信息,您的个人信息我们将加密存储,绝不外泄.并且我将在特定时间检查是否修改版权,所有修改版权者将会被公式在博客上[会事先通过一切可能的手段(包括但不限于域名whois,点击您修改后的版权链接等方法]通知您进行修改版权)。

TIP:往期更新请查看根目录下的CHANGELOG.md
