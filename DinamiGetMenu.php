<?php
include('login/seguridad.php');

$Dept = $_SESSION['Dept'];
include 'db/Revisions2.php';
$obj = new Revisions();

function SqlRequest($query){
	global $obj;
	$all_revisions = $obj -> Get_revisions($query);
	$array = json_decode($all_revisions);
	$Revisions = $array->{"Revisions"};
	return $Revisions;
	
}

function status($status){
	global $Dept;
	$query="select * from Revisions where Dept = '$Dept' and status = '$status'";
	$Revisions = SqlRequest($query);
	$display  = "";
	foreach ($Revisions as $some){
		$Rev = $some->{"Revision"};
    	$display .= "<li><a href='SearchJson.php?revision=$Rev&status=$status' target='mainFrame'><span>$Rev</span></a></li>";
	}
	return	$display ;
}

$appoved = status('approved');
$toapprove = status('toapprove');
$draft = status('draft');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu</title>
<link rel="stylesheet" href="css/Menu.css">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="js/script.js"></script>
</head>

<body>
<br/><br/>
<div id='cssmenu'>
<?php 
//############################################Templates############################################################
switch ($_SESSION['role']){
	
	case 'admin':
$MENU =<<<ETO
<ul>
   <li class='active'><a href='#'><span>$Dept Revisions</span></a></li>
   <li class='has-sub'><a href='#'><span>Approved</span></a>
      <ul>
        $appoved
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>ToApprove</span></a>
      <ul>
         $toapprove
      </ul>
   </li>
   <li class='last'><a href='#'><span>Draft</span></a>
         <ul>
         $draft
      </ul>
   </li>
</ul>
ETO;
break;

case 'approver':
$MENU =<<<ETO
<form id="form1" name="form1" method="post" action="">
  <select name="DepList" size="1" id="DepList">
    <option value="0">------ Select a Dept ------ </option>
    <option value="QA">QA</option>
    <option value="FTE">FTE</option>
    <option value="HR">HR</option>
  </select>
</form>
ETO;

$MENU .=<<<ETO
<ul>
   <li class='active'><a href='#'><span>$Dept Revisions</span></a></li>
   <li class='has-sub'><a href='#'><span>Approved</span></a>
      <ul>
        $appoved
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>ToApprove</span></a>
      <ul>
         $toapprove
      </ul>
   </li>
</ul>
ETO;
break;

case 'guest':
$MENU =<<<ETO
<ul>
   <li class='active'><a href='#'><span>$Dept Revisions</span></a></li>
   <li class='has-sub'><a href='#'><span>Approved</span></a>
      <ul>
        $appoved
      </ul>
   </li>
</ul>
ETO;
break;
}
//############################################End Templates############################################################
echo $MENU;

?>
</div>

</body>
</html>
