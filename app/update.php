<?php
$versionnow = $_POST['version'];
$url = "https://xsot.cn/api/update/?app=urlshorting";
function httpcode($url) {
    $ch = curl_init();
    $timeout = 3;
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_exec($ch);
    return $httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    curl_close($ch);
}
$urlinfo = httpcode($url);
@$data = file_get_contents($url);
@$arr = json_decode($data,true);
@$version = $arr['version'];
@$info = $arr['info'];
if (empty($version)) {
    $urlinfo = "404";
}
//获取网站状态
if ($urlinfo == "200") {
  if ($versionnow !== $version) {
    if($version == "WARNING")
    {
      $data = array(
        "change",
        "$version",
        "$info"
      );
      $data_json = json_encode($data);
      header('Content-type:text/json');
      echo $data_json;
    }else{
      $data = array(
        "new",
        "$version",
        "$info"
      );
      $data_json = json_encode($data);
      header('Content-type:text/json');
      echo $data_json;
    }
  }else{
        $data = array(
      "latest",
      "$version",
      "$info"
    );
    $data_json = json_encode($data);
    header('Content-type:text/json');
    echo $data_json;
  }
}else{
     $data = array(
      "error",
      "$urlinfo"
    );
    $data_json = json_encode($data);
    header('Content-type:text/json');
    echo $data_json;
}
