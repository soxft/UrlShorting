<h1 align="center">
  <br>
  <a href="https://k6o.top/" alt="logo" ><img src="https://github.com/essesoul/img/blob/main/URLshorting/urlshorting.png?raw=true" width="150"/></a>
  <br>
  URLshorting
  <br>
</h1>

[![](https://data.jsdelivr.com/v1/package/gh/soxft/Urlshorting/badge)](https://www.jsdelivr.com/package/gh/soxft/Urlshorting)
<a href="http://www.apache.org/licenses/LICENSE-2.0.html"> 
<img src="https://img.shields.io/github/license/soxft/URLshorting.svg" alt="License"></a>
<a href="https://github.com/soxft/URLshorting/stargazers"> 
<img src="https://img.shields.io/github/stars/soxft/URLshorting.svg" alt="GitHub stars"></a>
<a href="https://github.com/soxft/URLshorting/network/members"> 
<img src="https://img.shields.io/github/forks/soxft/URLshorting.svg" alt="GitHub forks"></a> 

## English version(BETA)
https://github.com/essesoul/UrlShorting-en

## 简介

一个url网址缩短平台.

demo：[K6o短链接](https://www.k6o.top/)

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

IIS (仅供参考,未进行测试):
```
  <rule name="tool.apizl.com rewriteTools1" patternSyntax="ECMAScript" stopProcessing="true">
    <match url="^/(.*)" ignoreCase="false" />
    <conditions logicalGrouping="MatchAll" trackAllCaptures="false" />
    <action type="Rewrite" url="/index.php?id={R:1}" appendQueryString="false" />
  </rule>
```


<br/>5.访问网站进行确认.

## 版权
xcsoft版权所有 该源码依据apache2开源协议开源,请不要修改版权信息！
  <p>Secondary Developed By k6o.top</p>
  <p>Contact us: Gary@dtnetwork.top</p>

## 更新
v2.2.1更新
<br/>此次更新由k6o短链接提供
  <p>email: Gary@dtnetwork.top</p>
<br/>1.管理页面添加访问按钮，方便预览

## 其他提示
  由于某些原因，该源码仍然使用Mysqli连接数据库，可能缺乏一定的安全性，使用时请注意使用WAF等平台进行保护。
  该项目目前由k6o.top进行维护
