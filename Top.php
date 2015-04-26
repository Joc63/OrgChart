<?php
	include('login/seguridad.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/main.css">
<title>Untitled Document</title>
</head>
<body>
<div id="header">
            <div class="logo"><img src="images/fx_logo.png" width="250"></div>
            <div class="appName"   title="<?php echo $_SESSION['role']?>" >
              <p><?php echo $_SESSION['name']." "?><span style="font-size:16px; color:#000">.........</span><span style="font-size:14px"><a href="login/exit.php"> logOut</a></span> </p>
</div>
        </div>
</body>
</html>
