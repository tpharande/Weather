<?php

sleep(2);
if(isset($_GET["zip"])){
  $zip = $_GET["zip"];
  $url = "http://api.weatherunlocked.com/api/current/us.$zip?app_id=89c76cf7&app_key=04f8b48e40f83fe3995668501985a1c3";
  $url2 = "http://api.openweathermap.org/data/2.5/weather?zip=$zip,us&appid=cfbf8d0760ea34a84dfb9240ffc4a88d";
  
  $fp = fopen($url2,"r");
  $fp2 = fopen($url,"r");
  $contents = "";
  $content2 = "";
  
  while ($more = fread($fp,1000))
    {$contents .= $more;
    $contents2 .= fread($fp2,1000); }
  
  $a=array();
  $c = json_decode($contents, true);
  $c2 = json_decode($contents2, true);
  
  foreach($c as $key => $value)
    $a[$key] = $value;
  foreach($c2 as $key => $value)
    $a[$key] = $value;
  
  echo json_encode($a);}
else{
  $lat = $_GET["lat"];
  $lon = $_GET["lon"];
  $url3="http://api.weatherunlocked.com/api/current/$lat,$lon?app_id=89c76cf7&app_key=04f8b48e40f83fe3995668501985a1c3";
  $url4="http://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=cfbf8d0760ea34a84dfb9240ffc4a88d";
  $fp3 = fopen($url3,"r");
  $fp4 = fopen($url4,"r");
  $contents3 = "";
  $content4 = "";
  
  while ($more2 = fread($fp3,1000))
    {$contents3 .= $more2;
    $contents4 .= fread($fp4,1000); }
  
  $arr=array();
  $c3 = json_decode($contents3, true);
  $c4 = json_decode($contents4, true);
  
  foreach($c3 as $key => $value)
    $arr[$key] = $value;
  foreach($c4 as $key => $value)
    $arr[$key] = $value;
  
  echo json_encode($arr);}
?>