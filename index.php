<?php
	include('login/seguridad.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chart</title>
</head>
<frameset rows="80,*" cols="*" frameborder="no" border="1" framespacing="0">
  <frame src="Top.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset rows="*" cols="267,*" framespacing="0" frameborder="no" border="0">
    <frame src="DinamiGetMenu.php" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" title="leftFrame" />
    <frame src="center.php" name="mainFrame" id="mainFrame" title="Principal" />
  </frameset>
</frameset>
<noframes><body>
</body></noframes>
</html>
