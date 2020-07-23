<?php
$s = array(
  "1" => "ABCDEFGHIJKLMNOPQRSTUVWXYZ",
  "2" => "abcdefghijklmnopqrstuvwxyz",
  "3" => "1234567890"
  );
  $strPol = '';
if(strpos($strPolchoice,"1") !== false)
{
  $strPol .= $s['1'];
}
if(strpos($strPolchoice,"2") !== false)
{
  $strPol .= $s['2'];
}
if(strpos($strPolchoice,"3") !== false)
{
  $strPol .= $s['3'];
}