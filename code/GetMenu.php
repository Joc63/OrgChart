<?php
include '../db/Revisions2.php';
//$query = $_GET['query'];
$query="select * from Revisions";
$obj = new Revisions();
$all_revisions = $obj -> Get_revisions($query);
$array = json_decode($all_revisions);
/*
//PAra crear menu dinamico pero no funciono :/
$Revisions = $array->{"Revisions"};
$display =<<<ETO
<div id="cssmenu">
<ul>
	<li class="active"><a href="#"><span>Home</span></a></li>
    <li class="has-sub"><a href="#"><span>Products</span></a>
    	<ul>
ETO;

foreach ($Revisions as $some){
    $display .= '<li><a href="#"><span>'.$some->{"Id"}.'</span></a></li>';
}

$display .=<<<ETO
        </ul>
    </li>
    <li class="has-sub"><a href="#"><span>About</span></a>
    	<ul>
        	<li><a href="#"><span>Company</span></a></li>
        	<li class="last"><a href="#"><span>Contact</span></a></li>
         </ul>
    </li>
    <li class="last"><a href="#"><span>Contact</span></a></li>
</ul>
</div>
ETO;

//echo $display;

*/
print_r($all_revisions) ;
?>