<?php
function parseurl($url="")
  {
  $url = urlencode($url);
  $a = array("%3A", "%2F", "%40" , "%3F","%3D");
  $b = array(":", "/", "@" ,"?","=");
  $url = str_replace($a, $b, $url);
  return $url;
  }