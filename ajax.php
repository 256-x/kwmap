<?php

error_reporting(0);
set_time_limit(0);

include("limit_access.php");

include("functions.php");

$download = "";
$download = $_POST['download'];
if($download != ""){
$darray = explode("^^^",$download);	
header('Content-type: application/vnd.ms-excel');
header('Content-disposition: attachment; filename="data.xls"');
foreach ($darray as $value) {
	$value = trim(strip_tags($value));
	if($value != ""){
		$values = explode("	",$value);
		foreach($values as $v){
			echo $v."\n";
		}
	}
}
exit();	
}
						

if($_POST && $_SESSION['count'] <= 4){

$keywords = ""; 	
$level = "basic";
	
$keywords				=	strtolower(trim($_POST["keywords"]));
$level					=	trim($_POST["level"]);
$level = "basic";
				

			
					
if($level == "basic"){

				$count = "1";
											
				$data = '<tr class="record" id="tr_'.$count.'"><td align="center" colspan="3" width="100%"><script type="text/javascript"> $.ajax({ type: "GET", url: "requests.php", data: "keyword='.$keywords.'", success: function(data){ $("#tr_'.$count.'").empty(); $("#tr_'.$count.'").append(data); } }); </script><span id="loading_review" style="display:inline;"></span></td></tr>';
				$count++;
				
				foreach(range('a', 'z') as $letter) {

					
			
						$data .= '<tr class="record" id="tr_'.$count.'"><td align="center" colspan="3" width="100%"><script type="text/javascript"> $.ajax({ type: "GET", url: "requests.php", data: "keyword='.$keywords.' '.$letter.'&letter='.$letter.'", success: function(data){ $("#tr_'.$count.'").empty(); $("#tr_'.$count.'").append(data); } }); </script><span id="loading_review" style="display:inline;"></span></td></tr>';
						$count++;

												
				}				
				

}elseif($level == "advance"){
	
				//$('.output_body').append('<span class="item">' + dat + "</span>");

	
				$count = "1";
											
				$data = '<tr class="record" id="tr_'.$count.'"><td align="center" colspan="3" width="100%"><script type="text/javascript"> $.ajax({ type: "GET", url: "requests.php", data: "keyword='.$keywords.'", success: function(data){ $("#tr_'.$count.'").empty(); $("#tr_'.$count.'").append(data); } }); </script><span id="loading_review" style="display:inline;"></span></td></tr>';
				$count++;
				
				foreach(range('a', 'z') as $letter) {
			
				$data .= '<tr class="record" id="tr_'.$count.'"><td align="center" colspan="3" width="100%"><script type="text/javascript"> $.ajax({ type: "GET", url: "requests.php", data: "keyword='.$keywords.' '.$letter.'&letter='.$letter.'", success: function(data){ $("#tr_'.$count.'").empty(); $("#tr_'.$count.'").append(data); } }); </script><span id="loading_review" style="display:inline;"></span></td></tr>';
				$count++;
				
				foreach(range('a', 'z') as $second_letter) {

				$both_letters = $letter.$second_letter;
					
				$data .= '<tr class="record" id="tr_'.$count.'"><td align="center" colspan="3" width="100%"><script type="text/javascript"> $.ajax({ type: "GET", url: "requests.php", data: "keyword='.$keywords.' '.$both_letters.'&letter='.$both_letters.'", success: function(data){ $("#tr_'.$count.'").empty(); $("#tr_'.$count.'").append(data); } }); </script><span id="loading_review" style="display:inline;"><img src="images/loading_review.gif" width="18" height="18" align="absmiddle"></span></td></tr>';
				$count++;					
					
				}
								
				}	
	
	
	
	
}
					



$generated_content = <<<EOF



  <div id="left">
	  <h2 id="suggestions_header">Suggestions for $keywords:</h2>

      
    
    <div class="clear"></div>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" id="table" class="sortable">
	   
		$data

      </table>



     
  </div>

    <div class="clear"></div>




EOF;

echo $generated_content;

} else {


echo '<div class="text-center">';
echo '<h1 style="color: white;" id="limit_reached">Limit reached!</h1>';
echo '<p style="color: white;">Please try again later!</p>';
echo '<p style="color: white;">Or sign up to the newsletter and unlock 10 more suggestions!</p>';
echo <<<EOL
 

      <div class="form-inline justify-content-center">
          <form action="register.php">
          <input class="form-control" type="email" placeholder="E-Mail" id="email-signup" name="email-signup"></input>
          <button id="email-submit" class="btn btn-primary">Sign Up!</button>
          </form>
    </div>



EOL;
echo '</div>';



}