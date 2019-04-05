<?php
/*xcsoft版权所有! 博客http://blog.xsot.cn*/
/*
Nginx伪静态:
   if (!-e $request_filename) {
        rewrite ^(.*)/([0-9a-zA-Z]*)$ $1/index.php?id=$2 last;
    }
Apache伪静态
暂无!可以按照Nginx的伪静态自己去转换!
*/
/*你的网站地址*/
$url='http://xsot.tk/';

/*你的数据库地址*/
$conn=mysqli_connect(
"localhost",     //数据库地址
"username",          //数据库用户名
"password", //数据库密码
"dbname"           //数据库名
);

/*短网址后需要的字母或数字个数,推荐4个以上,最长20!(请填写数字)*/
$pass='4';

/*网站标题(网页中所显示的)*/
$title1='xcsoft-网址缩短';

/*网站标题(网页标签所显示的）*/
$title='xcsoft-网址缩短';

/*短网址包含的内容,即短网址后会出现的字符*/
$strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
?>
