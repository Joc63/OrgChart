<?php
$file =  $_REQUEST['file'];
//$file = 'data.txt';
$str = file_get_contents($file);
$str = str_replace('""','null',$str);
$str = str_replace('\n','',$str);
$str = str_replace('\"','"',$str);
$str = substr($str,0,-1);
$str = substr($str,1);
echo $str;
?>