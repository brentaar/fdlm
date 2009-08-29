<?php
	//include file to access the MYSQL database
	include ("common.inc");

	$sql = "INSERT INTO `fdlm`.`uniqueinformation` ( `id` , `file_initial_request`)VALUES (NULL , NULL);";
	$sqlQuery = mysql_query($sql);
	$sqlID = mysql_insert_id();
	echo "this is the ID: ".$sqlID;



?>