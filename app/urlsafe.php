<?php
//对接 腾讯网址安全检测平台
function doCurl($url, $data = array(), $header = array(), $referer = '', $timeout = 30) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
  curl_setopt($ch, CURLOPT_REFERER, $referer);
  $response = curl_exec($ch);
  if ($error = curl_error($ch)) {
    die($error);
  }
  curl_close($ch);
  return $response;
}
// 调用
function urlsafe($url){
$url = 'https://cgi.urlsec.qq.com/index.php?m=check&a=check&url=' . $url;
$data = array();
// 设置IP
$ip_long = array(
  array('607649792', '608174079'), //36.56.0.0-36.63.255.255
  array('1038614528', '1039007743'), //61.232.0.0-61.237.255.255
  array('1783627776', '1784676351'), //106.80.0.0-106.95.255.255
  array('2035023872', '2035154943'), //121.76.0.0-121.77.255.255
  array('2078801920', '2079064063'), //123.232.0.0-123.235.255.255
  array('-1950089216', '-1948778497'), //139.196.0.0-139.215.255.255
  array('-1425539072', '-1425014785'), //171.8.0.0-171.15.255.255
  array('-1236271104', '-1235419137'), //182.80.0.0-182.92.255.255
  array('-770113536', '-768606209'), //210.25.0.0-210.47.255.255
  array('-569376768', '-564133889'), //222.16.0.0-222.95.255.255
);
$rand_key = mt_rand(0, 9);
$ip = long2ip(mt_rand($ip_long[$rand_key][0], $ip_long[$rand_key][1]));
//随机ip
$header = array(
  "CLIENT-IP: $ip",
  "X-FORWARDED-FOR: $ip"
);
//出问题了不知道为什么
$referer = 'https://urlsec.qq.com/';
$response = doCurl($url, $data, $header, $referer, 5);
$data = substr($response, 1, -1);
$data = json_decode($data, true);
if($data['reCode'] == -101)
{
  return array(
  'code' => '1001'
);
}else{
  $code = $data['reCode'];
  $url = $data['data']['results']['url'];
  $type = $data['data']['results']['whitetype'];
  $beian = $data['data']['results']['isDomainICPOk'];
  $icpdode = $data['data']['results']['ICPSerial'];
  $icporg = $data['data']['results']['Orgnization'];
  $word = $data['data']['results']['Wording'];
  $wordtit = $data['data']['results']['WordingTitle'];
}
if ($code == "-101" || empty($type)) {
  return array("code" => '1001');
}

return array(
  'code' => '200',
  'url' => $url,
  'type' => $type,
  'beian' => $beian,
  'icpdode' => $icpdode,
  'icporg' => $icporg,
  'word' => $word,
  'wordtit' => $wordtit,
);
}

  $u = $_POST["u"];
  header('Content-type:text/json');
  header('Access-Control-Allow-Origin:*');
  exit(json_encode(urlsafe($u),JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));

?>