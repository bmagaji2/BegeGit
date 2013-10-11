<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Anumushi Nig. Ltd</title>
</head>
<body style="background-color:green;">
<h1 style="background-color:yellow;">Welcome Welkom Bienveniu Karibu Benvido</h1>
<h2 style="background-color:red;">Company Mission/Vision:</h2>
<section>Anumushi Nig. ltd is a multi-national agro-allied company based in Nigeria with the sole purpose of importing the best fertilizer for our local farmers. We specialize in providing the necessary tools to acheive the best agricultural output.
<br>
Anumushi's vision is to organize local farmers into large ORGANIZATIONS, hence those ORGANIZATIONS be provided loans and necessary tools to succeed in the trade of farming.
</section>

<h2>Latest Organization Entries</h2>

<?php

$con = mysqli_connect("localhost", "krobbins", "abc123", "mb_data");
if (mysqli_connect_errno()) {
   echo "Couldn't connect to database evalurls: " . mysqli_connect_errno();
}

$result = mysqli_query($con, "select * from members order by mem_id desc limit 3;");

while ($row = mysqli_fetch_array($result)) {

	?>
	<img src="<?php echo $row["mem_pic"]?>" width="60" height="60">
	<?php echo "&nbsp &nbsp &nbsp";?>
	<a href="showOrgs.php?id=<?php echo $row["mem_id"]; ?>">
	<?php  echo  $row["mem_name"]?>
	</a>
	<?php  echo "<br> <br>"; ?>
<?php
}

mysqli_close($con);
?>

<section>

<h2><a href="./show3Orgs.php">View registered Organizations </a></h2>

<p><a href="./createacc.html">Click here to register an organization</a>
</section>

</body>
</html>

