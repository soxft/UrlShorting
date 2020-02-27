<?php
    session_start();
    require_once('./app/core.php');
    //引入核心文件
    $content = $_POST['content'];
    //获取一大堆post
    $type = $_POST['type'];
    //如果用户选择了短域
    if ($type == 'shorturl') {
        $arr = Urlshorting($content,"shorturl");
        if ($arr[0] == 200) {
            echo "200";
            $_SESSION['shorturl'] = $arr[1];
        } elseif ($arr[0] == 1001) {
            echo "非法的URL";
        } elseif ($arr[0] == 1002) {
            echo "您输入的域名或您的IP已被封禁!";
        }else{
            echo "UNKNOW ERROR!";
        }
    }
    //如果用户选择了密语
    if ($type == 'passmessage') {
        $arr = Urlshorting($content,"passmessage");
        if ($arr[0] == 200) {
            echo "200";
            $_SESSION['shorturl'] = $arr[1];
        }elseif ($arr[0] == 1001) {
            echo "非法的密语";
        }elseif ($arr[0] == 1002) {
            echo "您输入的域名或您的IP已被封禁";
        }else{
            echo "UNKNOW ERROR!";
        }
    }
    ?>