<?php    
	//include file to access the MYSQL database
	include ("common.inc");
    
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
    
?>