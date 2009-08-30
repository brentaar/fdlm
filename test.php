<?php
	//include file to access the MYSQL database
	//include ("common.inc");

	// $sql = "INSERT INTO `fdlm`.`uniqueinformation` ( `id` , `file_initial_request`)VALUES (NULL , NULL);";
	// $sqlQuery = mysql_query($sql);
	// $sqlID = mysql_insert_id();
	// echo "this is the ID: ".$sqlID;

// $doubleAr = explode(" ", "The $quick brown fox");
// $singleAr = explode(" ", 'The $quick brown fox');
// echo $doubleAr[1]; // prints "";
// echo $singleAr[1]; // prints "$quick";

// $rawPhoneNumber = "800/555/5555"; 
// echo "<br />";
// $phoneChunks = explode("/", $rawPhoneNumber);
// echo "Raw Phone Number = $rawPhoneNumber <br />";
// echo "First chunk = $phoneChunks[0]<br />";
// echo "Second chunk = $phoneChunks[1]<br />";
// echo "Third Chunk chunk = $phoneChunks[2]";

$file_internet_name = "stugf";
echo "file_internet_name: ".$file_internet_name."<br />";
$file_internet_location = "www.example.com";
echo "file_internet_location: ".$file_internet_location."<br />";

$insert_SQL_Array[] = $file_internet_name ? "`file_internet_name`=`".$file_internet_name."`": '';
$insert_SQL_Array[] = $file_internet_location ? "`file_internet_location`=`".$file_internet_location."`": '';

echo "insert_SQL_Array[0]: ".$insert_SQL_Array[0]."<br />";
echo "insert_SQL_Array[1]: ".$insert_SQL_Array[1]."<br />";

$insert_SQL = implode(" , ",$insert_SQL_Array);
echo "insert_SQL: ".$insert_SQL."<br />";


// if(file_internet_name){
// $insert_SQL ="`file_internet_name`=`".$file_internet_name."`";
// }
// echo "insert_SQL: ".$insert_SQL."<br />";

?>