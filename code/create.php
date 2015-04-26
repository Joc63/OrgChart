<?php
$text = $_REQUEST['a'];
$revision = $_REQUEST['revision'];
//$text = json_encode($a);
$fp = fopen($revision, 'w');
fwrite($fp, $text);
fclose($fp);

?>