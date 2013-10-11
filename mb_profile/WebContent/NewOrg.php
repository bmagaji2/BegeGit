<?php
$allowedExts = array (
		"gif",
		"jpeg",
		"jpg",
		"png" 
);
$temp = explode ( ".", $_FILES ["file"] ["name"] );
$extension = end ( $temp );
if ((($_FILES ["file"] ["type"] == "image/gif") || ($_FILES ["file"] ["type"] == "image/jpeg") || ($_FILES ["file"] ["type"] == "image/jpg") || ($_FILES ["file"] ["type"] == "image/pjpeg") || ($_FILES ["file"] ["type"] == "image/x-png") || ($_FILES ["file"] ["type"] == "image/png")) && ($_FILES ["file"] ["size"] < 20000) && in_array ( $extension, $allowedExts )) {
	if ($_FILES ["file"] ["error"] > 0) {
		//echo "Return Code: " . $_FILES ["file"] ["error"] . "<br>";
	} else {
		//echo "Upload: " . $_FILES ["file"] ["name"] . "<br>";
		//echo "Type: " . $_FILES ["file"] ["type"] . "<br>";
		//echo "Size: " . ($_FILES ["file"] ["size"] / 1024) . " kB<br>";
		//echo "Temp file: " . $_FILES ["file"] ["tmp_name"] . "<br>";
		
		if (file_exists ( "upload/" . $_FILES ["file"] ["name"] )) {
			//echo $_FILES ["file"] ["name"] . " already exists. ";
		} else {
			move_uploaded_file ( $_FILES ["file"] ["tmp_name"], "upload/" . $_FILES ["file"] ["name"] );
			//echo "Stored in: " . "upload/" . $_FILES ["file"] ["name"];
			$pic_name = $_FILES ["file"] ["name"];
			$mem_pic = "upload/$pic_name";
		}
	}
} else {
	echo "Invalid file";
}

?>

<html>
<head>
<meta charset="ISO-8859-1">
<title>New Organization</title>
</head>
<body>
	<h1>Succesful: New Organization</h1>

	<section>
<?php
extract ( $_POST );
print "Name: $mem_name<br>";
print "Gender: $mem_gender<br>";
print "Email: $mem_email<br>";
print "Agricultural Department: $mem_dep<br>";
print "Brief Description of Organization: $mem_description<br>";

$con = mysqli_connect ( "localhost", "krobbins", "abc123", "mb_data" );
if (mysqli_connect_errno ()) {
	echo "Couldn't connect to database mb_data: " . mysqli_connect_errno ();
}

$sql = "INSERT INTO members (mem_name, mem_pic, mem_gender, mem_email, mem_dep, mem_description)
					VALUES ('$mem_name', '$mem_pic', '$mem_gender', '$mem_email', '$mem_dep', '$mem_description')";

if (! mysqli_query ( $con, $sql )) {
	die ( 'Error: ' . mysqli_error ( $con ) );
}

mysqli_close ( $con );
?>
<p>
			<a href="index.php">Return to main page</a>
		</p>
	</section>
</body>
</html>