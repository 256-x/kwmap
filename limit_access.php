<?php

session_start();

$limitAccess = "false";


if(!isset($_SESSION['count']))
{
   $_SESSION['count'] = 1;
   $_SESSION['first'] = time();
}
else
{
	
   // Increase the Count
   $_SESSION['count'] += 0.5;
   // Reset every so often
     if($_SESSION['first'] < (time() - 60*10))
   {

	
      $_SESSION['count'] = 1;
      $_SESSION['first'] = time();
   }

  
   // Die if they have viewed the page too many times
 
}