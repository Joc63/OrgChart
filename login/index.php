<?php
include('security.php'); // Includes Login Script
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="../css/login.css" rel="stylesheet" type="text/css">
<style type="text/css">

</style>
</head>
<body >
<div id="main">
<div id="login">
<h2>Login </h2>
<form action="" method="post">
  <p>
  <label><br>
    UserName :</label>
  <input id="name" name="username" placeholder="username" type="text">
  <label>Password :</label>
  <input id="password" name="password" placeholder="**********" type="password">
    </p>
  <p>
    <input name="submit" type="submit" value="Sing In">
    <span><?php echo $error; ?></span></p>
</form>
</div>
</div>
</body>
</html>