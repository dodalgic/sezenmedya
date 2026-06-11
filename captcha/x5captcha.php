<?php
include("../res/x5engine.php");
$nameList = array("rcp","k2d","gag","px8","h7a","y36","8ph","c8c","2yu","enc");
$charList = array("F","L","D","V","U","K","G","A","S","5");
$cpt = new X5Captcha($nameList, $charList);
//Check Captcha
if ($_GET["action"] == "check")
	echo $cpt->check($_GET["code"], $_GET["ans"]);
//Show Captcha chars
else if ($_GET["action"] == "show")
	echo $cpt->show($_GET['code']);
// End of file x5captcha.php
