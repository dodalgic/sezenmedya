<?php
include("../res/x5engine.php");
$nameList = array("k43","k88","zry","vxa","elk","vwz","57z","lwv","gn2","wkr");
$charList = array("T","U","S","A","F","8","5","U","Y","8");
$cpt = new X5Captcha($nameList, $charList);
//Check Captcha
if ($_GET["action"] == "check")
	echo $cpt->check($_GET["code"], $_GET["ans"]);
//Show Captcha chars
else if ($_GET["action"] == "show")
	echo $cpt->show($_GET['code']);
// End of file x5captcha.php
