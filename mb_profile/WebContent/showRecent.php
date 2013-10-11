<html>
<head>
<meta charset="ISO-8859-1">
<title>Last Three</title>
</head>
<body style="background-color:red;">

<h1>List of the existing members</h1>

<section>
<?php 
$con = mysqli_connect("localhost", "krobbins", "abc123", "mb_data");
if (mysqli_connect_errno()) {
   echo "Couldn't connect to database evalurls: " . mysqli_connect_errno();
}

$result = mysqli_query($con, "select * from members order by mem_id desc limit 3;");
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

<a href = "index.html">Return to main page</a>
</section>
</body>
</html>