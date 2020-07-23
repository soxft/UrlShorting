<?php
session_start();
require_once 'app/core.php';
require_once 'config.php';
//引入核心文件
$content = $_POST['content'];
$shorturl = $_POST['shorturl'];
$passwd = $_POST['passwd'];
$type = $_POST['type'];
//获取一大堆post
//如果用户选择了短域

$arr = Urlshorting($content, $type, $passwd, $shorturl);
if ($arr[0] == 200) {
    echo "200";
    $_SESSION['shorturl'] = $arr[1];
    $_SESSION['passwd'] = $arr[2];
} elseif ($arr[0] == 1001) {
    if ($type == 'shorturl') {
        echo "非法的URL";
    } else {
        echo "非法的密语";
    }
} elseif ($arr[0] == 1002) {
    echo "您输入的域名或您的IP已被封禁!";
} elseif($arr[0] == 3001 || $arr[0] == 3002) {
    echo "密码只能为2-20位的英文,数字,标点或组合";
}elseif($arr[0] == 2001 || $arr[0] == 2002) {
    echo "自定义短域只能为" . $pass . "位的英文,数字或组合";
}elseif($arr[0] == 2003) {
    echo "该短域已被使用!";
}else{
    echo "error: " . $arr[0];
}

?>