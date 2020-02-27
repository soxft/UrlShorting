<?php
function qrcode($value,$type="") {
  global $url;
  $name = null;
  $max = strlen($strPol)-1;
  $strPol = "G8J9KjklmAB1C6H7I20LMNOPabcdefghiD3E4F5nopqrstQRSTUVWXYZuvwxyz";
  for($i=0;$i<4;$i++){
    $name.=$strPol[rand(0,$max)];
  }
  $qrcodename='./qrcode/' . $name  . '.png';
  include './app/phpqrcode.php';    
  $errorCorrectionLevel = 'L';//容错级别   
  $matrixPointSize = 5;//生成图片大小   
  //生成二维码图片   
  QRcode::png($value,$qrcodename,$errorCorrectionLevel,$matrixPointSize,2);   
  if($type=="show")
  {
    echo '<center><img src=' . $qrcodename . '></center>'; 
    echo("<br/>");
  }else{
    return $url . "qrcode/" . $name . ".png";
  }
}
?>