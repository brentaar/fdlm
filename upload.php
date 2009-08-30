<html>
	<head>
		<title>File Download Manager Upload</title>
		<link rel="stylesheet" href="Site.css" />
	</head>

	<body class="PageBODY">
	<font class="BodyFONT">

<?php    
	//include file to access the MYSQL database
	include ("common.inc");
	include ("logMsg.php");
    
    //show php errors
    error_reporting(E_STRICT);

	echo "<br />";

    //Pull variables from form POST
	$file_internet_location =  $_POST['file_internet_location'];  
	echo "file_internet_location: ".$file_internet_location."<br />";
	$file_md5 =  $_POST['file_md5'];
	echo "file_md5: ".$file_md5."<br />";
  	$file_local_location =  $_POST['file_local_location'];
  	echo "file_local_location: ".$file_local_location."<br />";
  	$file_local_name =  $_POST['file_local_name'];
	echo "file_local_name: ".$file_local_name."<br />";
	
	//There needs to be conditional statements to say if the required fields have not been assigned. 
	//If they were not assigned the program needs to run a die() function
	
	echo "<br />";
	
	//ID insert statment SHOULD WE GROUP THE MYSQL STATEMENTS TOGETHER?
	$sql = "INSERT INTO `fdlm`.`uniqueinformation` ( `id` , `file_initial_request`)VALUES (NULL , NULL);";
	logMsg(2,"SQL query: ".$sql."",__file__,__line__);
	$sqlQuery = mysql_query($sql);
	$sql_ID = mysql_insert_id();
	$insert_SQL_ID = " `id`='".$sql_ID."' ";
	logMsg(2,"SQL ID: ".$sql_ID."",__file__,__line__);
	
	echo "<br />";
	
	//file_internet_location parsing FIGURE OUT HOW TO GET THE SIZE OF THE FILE BEFORE IT IS DOWNLOADED
	echo "1 file_internet_location: ".$file_internet_location."<br />";
	$file_internet_location = str_replace('http://','',$file_internet_location);
	$file_internet_location = str_replace('ftp://','',$file_internet_location);
	echo "2 file_internet_location: ".$file_internet_location."<br />";

	echo "<br />";
	 
	$file_internet_address_Array = explode("/",$file_internet_location);
	
	//server website
	$file_internet_website = $file_internet_address_Array[0];
	echo "file_internet_address_Array: ".$file_internet_website."<br />";
	
	$insert_SQL_Array[] = $file_internet_website ? " `file_internet_website`='".mysql_real_escape_string($file_internet_website)."' " : "";
	
	echo "<br />";
	
	//file name and extension
	$file_internet_name_type = end($file_internet_address_Array);
	echo "file_internet_name_type: ".$file_internet_name_type."<br />";
	
	$file_internet_type = explode(".",$file_internet_name_type);
	$file_internet_type = end($file_internet_type);
	echo "file_internet_type: ".$file_internet_type."<br />";
		
	$file_internet_name = str_replace(".".$file_internet_type,"",$file_internet_name_type);
	echo "file_internet_name: ".$file_internet_name."<br />";
	
	$insert_SQL_Array[] = $file_internet_type ? " `file_internet_type`='".mysql_real_escape_string($file_internet_type)."' " : "";
	$insert_SQL_Array[] = $file_internet_name ? " `file_internet_name`='".mysql_real_escape_string($file_internet_name)."' " : "";
	
	echo "<br />";
	//md5 check THIS IF STATEMENT HAS NOT BEEN CHECKED TO SEE IF IT WORKS
	if($file_md5){
		echo "file_md5: ".$file_md5."<br />";
		$sql = "SELECT * FROM `internetinfromation` where `file_md5`=`".$file_md5."`;";
		if(mysql_num_rows($sql)>0){//Might need to have a mysql_query function call as well
			die("That download already exists in the database. We currently do not support multiple downloads of the same file");
			
		} else {
			$insert_SQL_Array[] = " `file_md5` = '".mysql_real_escape_string($file_md5)."' ";
		}
	}
	
	//internetinformation insert statement

 
	$insert_SQL = implode(" , ",$insert_SQL_Array);
	$sql = "INSERT INTO `internetinfromation` SET ".$insert_SQL_ID." , ".$insert_SQL." ;";
	echo "sql: ".$sql."<br />";
 
   logMsg(2,"SQL query: ".$sql."",__file__,__line__);
	$sqlQuery = mysql_query($sql);
	if($sqlQuery == false){
		logMsg(0,"Could not add parsed information to internetinformation:<br />".$sql." ",__file__,__line__);
	}
	echo "<br />";
	//file download information parsing
	//file download information insert statement
	$insert_SQL = "";
	$sql = "";
	//This doesn't do anything, this is just for later
	//$insert_SQL_Array2[] = $file_priority ? " `file_priority`='".$file_priority."' " : "";
	//$insert_SQL = " , ".implode(" , ",$insert_SQL_Array2);
	
	$sql = "INSERT INTO `downloadinfromation` SET ".$insert_SQL_ID.$insert_SQL." ;";
	echo "sql: ".$sql."<br />";
	$sqlQuery = mysql_query($sql);
	if($sqlQuery == false){
		logMsg(0,"Could not add parsed information to downloadinformation:<br />".$sql." ",__file__,__line__);
	}
	
	echo "<br />";
	//file local information parsing	
	//file local information insert
	$insert_SQL = "";
	$sql = "";
	
	$file_local_name_type = explode(".",$file_local_name);
	$file_local_name = $file_local_name_type[0];
	$file_local_type = $file_local_name_type[1];
	
	$insert_SQL_Array3[] = " `file_local_name`='".mysql_real_escape_string($file_local_name)."' ";
	$insert_SQL_Array3[] = " `file_local_type`='".mysql_real_escape_string($file_local_type)."' ";
	//file location
	
	$insert_SQL_Array3[] = " `file_local_location`='".mysql_real_escape_string($file_local_location)."' ";
	
	$insert_SQL = " , ".implode(" , ",$insert_SQL_Array3);
	
	$sql = "INSERT INTO `localinfromation` SET ".$insert_SQL_ID.$insert_SQL." ;";
	echo "sql: ".$sql."<br />";
	$sqlQuery = mysql_query($sql);
	if($sqlQuery == false){
		logMsg(0,"Could not add parsed information to downloadinformation:<br />".$sql." ",__file__,__line__);
	}
	
	//System call to python script
?>

</body>
</html>