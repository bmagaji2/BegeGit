<html>
<head>
<meta charset="ISO-8859-1">
<title>3 Most recent Organizations</title>
</head>
<body  style="background-color:brown;">

<h1>List of existing Organizations</h1>

<section>
<?php 
$con = mysqli_connect("localhost", "krobbins", "abc123", "mb_data");
if (mysqli_connect_errno()) {
   echo "Couldn't connect to database evalurls: " . mysqli_connect_errno();
}

$result = mysqli_query($con, "select * from members;");
$no = 1;
while ($row = mysqli_fetch_array($result)) {

	echo  $no . ":&nbsp &nbsp" ?>
	<a href="showOrgs.php?id=<?php echo $row["mem_id"]; ?>">
	<?php  echo  $row["mem_name"] ?>
	</a>
	<?php  echo  "&nbsp &nbsp &nbsp" . $row["mem_email"] . "<br> <br>"; ?>
<?php
	$no++;
}

mysqli_close($con);
?>

<a href = "index.php">Return</a>
</section>
</body>
</html>