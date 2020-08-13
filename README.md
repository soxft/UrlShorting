# URLshorting
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
```
if (!-e $request_filename) {
rewrite ^/(.*)$ /index.php?id=$1 last;
}
```
Apache:
```
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ /index.php?id=$1 [L]
</IfModule>
```

IIS请尝试自己转换.
<br/>5.访问网站进行确认.
# 升级向导
### 对于升级2.1.0
1.进入mysql数据库执行`drop table config;drop table notice;`<br/>
2.删除网址根目录,可以直接下载最新源码上传至服务器重新安装,不影响原有数据<br/>
3.原有数据,必须手动在information表中添加passwd字段值!<br/>
4.NOTICE：此版本与老版本不兼容(2.1.0之前,请尝试下载Releases中的tool.php文件放置于网站根目录执行,进行自动格式转换)

## 版权
xcsoft版权所有 改源码依据apache2开源协议开源,请不要修改版权信息！
## 更新
v2.1.0更新<br/>
1.新增使用星辰oauth平台登录后台<br/>
2.时间改用时间戳，修复后台时间显示排序的问题<br/>
3.密语短域加密的输入密码界面修复,防止出现问题<br/>
NOTICE：此版本与老版本不兼容(2.1.0之前,请尝试下载Releases中的tool.php文件放置于网站根目录执行,进行自动格式转换)

