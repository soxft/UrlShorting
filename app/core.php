<?php
/*
  网址缩短核心服务
  Powered by xcsoft
  版权所有,盗版必究
  时间2020/07/31
  Version:2.0.1
*/
require_once "config.php";
require_once "app/strpol.php";
require_once "app/ip.php";
/*
*  @author   xcsoft
*  @version  2.0.1
*/
function Urlshorting($content, $type, $passwd, $shorturlInput) {
    global $ip;
    //ip
    global $conn;
    //数据库
    global $strPol;
    //短网址包含内容 
    global $pass;
    //短网址长度 
    global $url; 
    //网址域名
    $time = time();
    
    @$arr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *FROM `ban` where `content`='$ip'"));
    if (!empty($arr)) {
        //检索用户ip或短域是否被封禁
        return array(1002);
        exit();
    }
    if (empty($content)) {
        //检测是否有输入
        return array(1001);
        exit();
    }
    //判断正式开始

    //判断为短域
    if($type == 'shorturl'){
        if (!preg_match('#^(http|https)://(.+\.)+[a-z]{2,}(/.*)*$#i', $content) || mb_strlen($content) > 1000 || mb_strlen($content) < 10) {
            return array(1001);
            exit();
        }
    }
    //网址合法性判断
    if($type == 'passmessage'){
        if (mb_strlen($content) > 3000 || mb_strlen($content) < 3) {
            return array(1001);
            exit();
        }
    }
    //密语合法性判断
    
     if(!empty($passwd))
    {
        if(strlen($passwd) < 2 || strlen($passwd) >= 20)
        {
            return array(3001);
            exit();
            //超长度限制
        }
        if(!preg_match("/^[\\~!@#$%^&*()-_=+|{}\[\],.?\/:;\'\"\d\w]+$/",$passwd))
        {
            return array(3002);
            exit();
            //非法的密码
        }
    }
    //return array(123456789);
     //       exit();
    //密码检测
    
    if(!empty($shorturlInput))
    {
        if((double)strlen($shorturlInput) !== (double)$pass)
        {
            //只能为限制位数
            return array(2001);
            exit();
            //超长度限制
        }
        if(!preg_match("/^[_0-9a-zA-Z]+$/",$shorturlInput))
        {
            return array(2002);
            exit();
            //非法的短域
        }
        $arr = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `information` WHERE `shorturl` = '$shorturlInput'"));
        //AND `information` = '$content' AND `type` = '$type' AND `passwd` = '$passwd'"
        //有重复且一样的用户输入项
        if(!empty($arr['shorturl']))
        {
            //如果存在,继续判断是否为完全重复项
            if($arr['passwd'] == $passwd && $arr['information'] == $content && $arr['type'] == $type)
            {
                //完全重复项,直接输出
                return array(200, $url . $arr['shorturl'],$arr['passwd']);
                exit();
            }else{
                return array(2003);
                //重复的短域
                exit();  
            }
        }else{
            mysqli_query($conn,"insert into `information` values('$content','$shorturlInput','$type','$passwd','$time','$ip');");
            return array(200, $url . $shorturlInput,$passwd);
            exit();
            //有重复项
        }
        //判断数据库是否有同类型重复性
    }else{
        $arr1 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `information` WHERE `information` = '$content' AND `type` = '$type' AND `passwd` = '$passwd'"));
        $shorturl = $arr1['shorturl'];
        if (!empty($shorturl)) {
            return array(200,$url . $shorturl,$passwd);
            exit;
        }
        
        while (true) {
        $shorturl = null;
        $max = strlen($strPol)-1;
        for ($i = 0; $i < $pass; $i++) {
            $shorturl .= $strPol[rand(0, $max)];
        }
        //检测随机生成的是否有重复
        @$arr = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `information` WHERE shorturl='$shorturl'"));
        @$information = $arr['information'];
        if (empty($information)) {
            mysqli_query($conn,"insert into `information` values('$content','$shorturl','$type','$passwd','$time','$ip');");
            return array(200, $url . $shorturl, $passwd);
            exit;
        }
    }
    }
    //自定义短域重复性检测
}
