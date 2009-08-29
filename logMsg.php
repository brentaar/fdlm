<?php


$logMsgLvl = 0;

function logMsg($lvl,$Msg,$file,$line){
	if ($logMsgLvl == $lvl){
		echo "Message: ".$Msg."<br />";
		echo "File: ".$file."<br />";
		echo "Line: ".$line."<br />";
	}


}


?> 

