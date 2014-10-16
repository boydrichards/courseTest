<?php

$PersonName = $_REQUEST['personName']; 
$PersonEmail = $_REQUEST['personEmail'];
$PersonNumber = $_REQUEST['personPhone']; 
$PersonTimeFrame = $_REQUEST['timeFrame'];
$PersonMessage = $_REQUEST['personMessage'];


$currentDay = date("F j, Y");
$To = "bricha55@gmail.com";
$Subject = "from your Website";
$Body = $PersonName."\n".$PersonEmail."\n".$PersonNumber."\n".$PersonTimeFrame."\n".$PersonMessage."\n";
//echo "Just testing";
mail($To,$Subject,$Body);

header("Location: http://boydrichards.com/form/thanks.html");
die();

?>