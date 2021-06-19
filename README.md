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
demo：<a herf="https://www.k6o.top/">k6o短链接</a>

## 安装方法
1.下载源码.<br/>
2.上传至你的网站根目录.<br/>
3.访问网站域名填写mysql等信息进行安装<br/>
4.修改网站伪静态配置:<br/>

Nginx:  

    if (!-e $request_filename) {
    rewrite ^/(.*)$ /index.php?id=$1 last;
    }

Apache:

    <IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ /index.php?id=$1 [L]
    </IfModule>


IIS请尝试自己转换.
<p>示例：</p>

    if (!-e $request_filename) {
    rewrite ^/(.*)$ /index.php?id=$1 last;
    }


<br/>5.访问网站进行确认.


## 版权
xcsoft版权所有 改源码依据apache2开源协议开源,请不要修改版权信息！
  <p>Secondary Developed By k6o.top</p>
  <p;>Contact us: Gary@dtnetwork.top</p>

## 更新
v2.2.0更新
<br/>此次更新由k6o短链接提供
  email: Gary@dtnetwork.top
<br/>1.修复oauth登录跳转地址
<br/>2.主页，提示语增加emoji表情
<br/>3.增加页脚Myssl安全签章，无需手动设置跳转链接
<br/>4.增加页面右下角Myssl安全认证图标
<br/>5.感觉管理菜单里的自动更新不实用，先注释掉了，有需要可以自行恢复
<br/>6.在主页菜单栏中去除了管理后台的按钮，稍微提高点安全性，请自行在链接后添加/admin访问后台
<br/>7.优化了标签栏显示
<br/>8.短链接生成后增加点击复制提示
<br/>9.增加了建站日期显示，请自行到footer.php修改建站日期
<br/>10.增加页脚返回主页的按钮，方便移动端使用

计划在以后的更新中加入谷歌验证码和统计代码配置页面，可能还会加入主页音频和公告栏。