<?php    
	//include file to access the MYSQL database
	include ("common.inc");
	include ("logMsg.php");
    
    //show php errors
    error_reporting(E_STRICT);
    
	$file_internet_location =  $_POST['file_internet_location'];  
	echo "file_internet_location: ".$file_internet_location."<br />";
	$file_md5 =  $_POST['file_md5'];
	echo "file_md5: ".$file_md5."<br />";
  	$file_local_location =  $_POST['file_local_location'];
  	echo "file_local_location: ".$file_local_location."<br />";
  	$file_local_name =  $_POST['file_local_name'];
	echo "file_local_name: ".$file_local_name."<br />";
	
	//ID insert statment
	$sql = "INSERT INTO `fdlm`.`uniqueinformation` ( `id` , `file_initial_request`)VALUES (NULL , NULL);";
	logMsg(2,"SQL query: ".$sql."",__file__,__line__);
	$sqlQuery = mysql_query($sql);
	$sqlID = mysql_insert_id();
	
	//file_internet_location parsing 
	
	//internetinformation insert statement
	$sql = "INSERT INTO `fdlm`.`internetinformation` ( `id`, `file_internet_name` , `file_internet_type` , `file_internet_website` , `file_internet_size` , `file_md5`) VALUES ( \`".$sqlID."\` , \`".$file_internet_name."\`, \`".$file_internet_type."\` , \`".$file_internet_website."\` , \`".$file_internet_size."\` , \`".$file_md5."\`);";
	$sql = "INSERT INTO `fdlm`.`internetinfromation` (`id`, `file_internet_name`, `file_internet_type`, `file_internet_website`, `file_internet_size`, `file_md5`) VALUES ( \`".$sqlID."\` , \`".$file_internet_name."\`, \`".$file_internet_type."\` , \`".$file_internet_website."\` , \`".$file_internet_size."\` , \`".$file_md5."\`);";
    logMsg(2,"SQL query: ".$sql."",$__file__,$__line__);
	$sqlQuery = mysql_query($sql);
	if($sqlQuery == false){
		logMsg(0,"Could not add parsed information to internetinformation: ".$sql." ",__file__,__line__);
	}
	
	//file download information parsing
	
	//file download information inset statement
	
	//file local information parsing
	
	//file localinformation insert
	
	//System call to python script
?>