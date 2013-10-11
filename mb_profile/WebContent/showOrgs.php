<html>
<head>
<meta charset="ISO-8859-1">
<title>User Profile Page</title>
</head>
<body style="background-color:yellow;">

<section>

<?php

extract($_GET);


$con = mysqli_connect("localhost", "krobbins", "abc123", "mb_data");
if (mysqli_connect_errno()) {
   echo "Couldn't connect to database mb_data: " . mysqli_connect_errno();
}

$result = mysqli_query($con, "SELECT * FROM members WHERE mem_id = '$id'");
$no = 1;
while ($row = mysqli_fetch_array($result)) {


	echo "<h1> <u>Organization Profile Page </u></h1>";
?>
	
	<br><img src="<?php echo $row["mem_pic"]?>" width="400" height="400"><br>
<?php
	echo  "<h3> Name: " . $row["mem_id"] . "</h3>";
	
	echo  "<h3> Type of Group: " . $row["mem_name"] . "</h3>";
	
	echo  "<h3 > Email: " . $row["mem_email"] . "</h3>";
	
	echo  "<h3 > Farming Department: " . $row["mem_dep"] . "</h3>";
	
	echo  "<h3>Brief Organization Description: " . $row["mem_description"] . "</h3>";

	$no++;
}



mysqli_close($con);
?>
<p>
<a href = "index.php">Return to main page</a></p>
</section>
</body>
</html>