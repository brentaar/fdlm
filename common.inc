<?php
	$dBWebsite="localhost";
	$userName = "fdlm";
	$passWord = "woodburn";
	$dB = "fdlmMySQL";


	echo "PHP on the ENGR server is working correctly.<BR><BR>";

	$connect = mysql_connect($dBWebsite, $userName, $passWord) 
	  or die ("Unable to connect to server $dBWebsite.<br>");

	echo "Connected to server $dBWebsite as $userName.<BR><BR>";

	mysql_select_db($dB) 
	  or die ("Unable to select database $dB.<br>");
	  
	echo "Connected to dataBase $dB <br>";
?>