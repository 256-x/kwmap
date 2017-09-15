<?php

error_reporting(0);
set_time_limit(0);

include("functions.php");

//'<span class="item">' + dat + "</span>"
							

if($_GET['keyword']){
	
	
$keyword				=	strtolower(trim($_GET["keyword"]));
$letter					=	strtoupper(trim($_GET["letter"]));


$suggestions = suggest($keyword);

if ($suggestions) {

$suggestion = '<td align="center">'.$letter.'</td><td class="keywords_td" align="left">';


}

foreach($suggestions as $s){

	if (!filter_var($s, FILTER_VALIDATE_URL)) {
	
	$suggestion .= '<span class="item">'.$s."</span>";

	}
	
}

$suggestion .= '</td><td align="center"></td>';						
echo $suggestion;							
exit();

}


?>
