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
v1.6.3更新:
<br/>1.修改网址缩短核心架构,修改index.php的缩短处理方式,防止因服务器dns问题导致的缩短失败.
<br/>2.增加网址跳转时将中文字符自动修改为encode编码,放置了因为字符编码原因造成的乱码问题.
<br/>3.提醒:使用api时请将URL中所有的&替换为~,防止因PHP GET的原因造成只缩短URL中第一个&前面的URL的问题.

v1.6更新:
<br/>1.感谢@Hiram·Wong使用MDUI对短域界面做了进一步美化.
<br/>2.新建notice数据表,支持首页显示公告信息.

v1.5更新：
<br/>1.新增install.php安装引导程序,自动上传mysql数据,开启自动安装新时代....
<br/>2.在qrcode文件夹中防止无用文件,防止Github吞文件夹(该无用文件会在第一次使用时自动删除)

v1.4.4更新:
<br/>1.新增后台功能.（现在你可以在后台ban掉用户ip或短域）
<br/>2.为防止随意修改版权,现添加自动将您的网站域名上传到我的数据库的功能(只会记录您的网站域名以及服务器ip,绝不外泄.)
<br/>TIP:下载改源码即代表您同意第2点!

v1.4更新:
<br/>1.新增密语功能.
<br/>2.新增后台(mysql-access表)统计访问者.
<br/>3.修改api get的值.
<br/>4.修改架构.


v1.3更新:
<br/>1.修改核心功能的结构及算法.
<br/>2.新增显示二维码功能.
<br/>3.首页显示api使用教程.
<br/>4.修改了api返回值.

v1.2更新:
<br/>1.现在在QQ中打开会提示选择浏览器打开!
<br/>2.菜单栏变得更好看了.
<br/>3:更新了api功能!

