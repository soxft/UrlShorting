# URLshortening
[![](https://data.jsdelivr.com/v1/package/gh/soxft/Urlshorting/badge)](https://www.jsdelivr.com/package/gh/soxft/Urlshorting)
<a href="http://www.apache.org/licenses/LICENSE-2.0.html"> 
<img src="https://img.shields.io/github/license/soxft/URLshorting.svg" alt="License"></a>
<a href="https://github.com/soxft/URLshorting/stargazers"> 
<img src="https://img.shields.io/github/stars/soxft/URLshorting.svg" alt="GitHub stars"></a>
<a href="https://github.com/soxft/URLshorting/network/members"> 
<img src="https://img.shields.io/github/forks/soxft/URLshorting.svg" alt="GitHub forks"></a> 
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
# 升级向导
### 对于升级1.7.0
1.进入mysql数据库执行`drop table config;drop table notice;`<br />
2.删除网址根目录,可以直接下载最新源码上传至服务器重新安装,不影响原有数据

## 版权
xcsoft版权所有 改源码依据apache2开源协议开源,请不要修改版权信息！
## 更新
v1.7.1更新<br />
Bug fixed.<br />

v1.7.0更新:<br />
1.首页以及后台更新界面改为ajax请求.
<br />2.Api中增加二维码,同时修改Api返回值.
<br />3.修改整体样式.
<br />4.移除了公告.
<br />5.Bug Fixed
