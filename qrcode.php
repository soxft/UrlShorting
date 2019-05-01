<?php
if(empty($arr['shorturl'])){
    $value = $url . $shorturl; //二维码内容 
}else{
    $value = $arr['shorturl'];
}
      $name = null;
      $max = strlen($strPol)-1;
      $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        for($i=0;$i<4;$i++){
          $name.=$strPol[rand(0,$max)];
         }
$qrcodename='./qrcode/' . $name  . '.png';
include './app/phpqrcode.php';    
  
$errorCorrectionLevel = 'L';//容错级别   
$matrixPointSize = 5;//生成图片大小   
//生成二维码图片   
QRcode::png($value,$qrcodename,$errorCorrectionLevel,$matrixPointSize,2);   
echo '<center><img src=' . $qrcodename . '></center>'; 
echo("<br/>");
?>