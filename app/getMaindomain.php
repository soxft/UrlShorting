<?php
function getTopHost($url) {
  $url = strtoupper($url);
  //首先转成小写
  $hosts = parse_url($url);
  $host = $hosts['host'];
  //查看是几级域名
  $data = explode('.',$host);
  $n = count($data);
  //判断是否是双后缀
  $preg = '/[\w].+\.(com|net|org|gov|edu)\.cn$/';
  if (($n > 2) && preg_match($preg,$host)) {
    //双后缀取后3位
    $host = $data[$n-3].'.'.$data[$n-2].'.'.$data[$n-1];
  } else {
    //非双后缀取后两位
    $host = $data[$n-2].'.'.$data[$n-1];
  }
  return $host;
}