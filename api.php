<?php
require_once "app/core.php";
require_once "app/ip.php";
$domain = $_POST['url'];
$passmessage = $_POST['message'];
$shorturl = $_POST['shorturl'];
$passwd = $_POST['passwd'];

//替换原网址中的&&防止出错
if (empty($domain) && empty($passmessage)) {
  $data = array(
    'code' => '1001'
  );
} else {

  if (!empty($domain)) {
    //如果判断为短域 (短域优先) 
    $arr = Urlshorting($domain, "shorturl", $passwd,$shorturl);
    if ($arr[0] !== 200) {
      $data = array(
        'code' => $arr[0]
      );
    } elseif ($arr[0] == 200) {
      if (empty($arr[2])) {
        $data = array(
          'code' => '200',
          'shorturl' => $arr[1]
        );
      } else {
        $data = array(
          'code' => '200',
          'shorturl' => $arr[1],
          'passwd' => $arr[2]
        );
      }
    }
  } else {
    //如果判断为密语
    $arr = Urlshorting($passmessage, "passmessage", $passwd, $shorturl);
    if ($arr[0] !== 200) {
      $data = array(
        'code' => $arr[0]
      );
    } elseif ($arr[0] == 200) {
      if (empty($arr[2])) {
        $data = array(
          'code' => '200',
          'shorturl' => $arr[1]
        );
      } else {
        $data = array(
          'code' => '200',
          'shorturl' => $arr[1],
          'passwd' => $arr[2]
        );
      }
    }
  }
}
header('Content-type:text/json');
echo json_encode($data);
exit;

