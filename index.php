
<html>
<head>
<title>File Download Manager</title>
<link rel="stylesheet" href="Site.css" />
</head>

<body class="PageBODY">
<br /><br />
<form name="input" action="upload.php" method="post">
<center>
<table class="FormTable">
<tr>
<td class="FormHeaderTD" colspan=2><center><font class="FormHeaderFONT">FDLM</font></center></td>
<tr >
<td class="ColumnTD" title="This field is to allow either md5 string or file, to check for duplication"><font class="ColumnFONT">What:</font></td>
<td class="FieldcaptionTD"><input type="text" name="file_internet_location" /></td>
</tr>
<tr>
<td class="FieldcaptionTD"><font class="ColumnFONT">md5:*</font></td>
<td class="FieldcaptionTD"><input type="text" name="file_md5"></td>
</tr>
<tr>
<td class="FieldcaptionTD"><font class="ColumnFONT">Where:</font></td>

<td class="FieldcaptionTD"><input type="text" name="file_local_location" /></td>
</tr>
<tr>
<td class="FieldcaptionTD"><font class="ColumnFONT">Dest. File Name</font></td>
<td class="FieldcaptionTD"><input type="text" name="file_local_name" /></td>
</tr>
<tr>
<td class="FieldcaptionTD" colspan=2><center><input type="submit" value="Submit" /></center></td>
</tr>
</table>
* Optional
</center>
</form>

</body>
</html>

