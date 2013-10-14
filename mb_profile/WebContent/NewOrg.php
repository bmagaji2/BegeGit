<?php


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
		
	} else {

		if (file_exists ( "upload/" . $_FILES ["file"] ["name"] )) {
			
		} else {
			move_uploaded_file ( $_FILES ["file"] ["tmp_name"], "upload/" . $_FILES ["file"] ["name"] );
			
			$pic_name = $_FILES ["file"] ["name"];
			$mem_pic = "upload/$pic_name";
		}
	}
} else {
	echo "Invalid file<br>";
}

extract ( $_POST );

require_once('FuncModel.php');
$model = new LabModel("localhost", "krobbins", "abc123", "mb_data");

$model->validate ( $_POST );

if ($model->getError ()) {
	echo $model->getError();
	?>
	
	<br>
		<br>
		<a href="createacc.html">Back to form</a>
<?php
} else {
	
	$con = mysqli_connect ( "localhost", "krobbins", "abc123", "mb_data");
	if (mysqli_connect_errno ()) {
		echo "Couldn't connect to database labdb: mb_data" . mysqli_connect_errno ();
	}
	
	$sql = "INSERT INTO members (mem_uname, mem_pwd, mem_name, mem_pic, mem_gender, mem_email, mem_dep, mem_description)
					VALUES ('$mem_uname', '$mem_pwd','$mem_name', '$mem_pic', '$mem_gender', '$mem_email', '$mem_dep', '$mem_description')";
	
	if (! mysqli_query ( $con, $sql )) {
		die ( 'Error: ' . mysqli_error ( $con ) );
	}
	
	mysqli_close ( $con );
	

	print "User Name: $mem_uname<br>";
	print "Password: $mem_pwd<br><br>";
	print "Name: $mem_name<br>";
	print "Gender: $mem_gender<br>";
	print "Email: $mem_email<br>";
	print "Agricultural Department: $mem_dep<br>";
	print "Brief Description of Organization: $mem_description<br>";
	?>
	
	<br><br><a href="index.php">Return to home page</a>
	
	<?php 
	
}
?>
<p>
			
		</p>
	</section>
</body>
</html>