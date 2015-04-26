<?php
session_start();
$_SESSION = array();
session_destroy();
?>
<script type="text/javascript"> 
window.top.location.href="../index.php";
</script>
