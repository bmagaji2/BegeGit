<?php

session_start();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Anumushi Nig. Ltd</title>
</head>
<body>
<?php 

if (isset($_SESSION['SESS_MEMBER_NAME'])){
	echo "Welcome  :  " . $_SESSION['SESS_MEMBER_NAME'];
	echo "";
}


?>

<h1 style="background-color:yellow;"> Welcome Welkom Bienveniu Karibu Benvido </h1>
<h2 style="background-color:red;"> Company Mission/Vision: </h2>

<section>Anumushi Nig. ltd is a multi-national agro-allied company based in Nigeria with the sole purpose of importing the best fertilizer for our local farmers. We specialize in providing the necessary tools to acheive the best agricultural output.
<br>
Anumushi's vision is to organize local farmers into large ORGANIZATIONS, hence those ORGANIZATIONS be provided loans and necessary tools to succeed in the trade of farming.
</section>

<h2>Latest Organization Entries</h2>

<?php

require_once('FuncModel.php');
$model = new LabModel("localhost", "krobbins", "abc123", "mb_data");

while ($row = $model->lastThree()) {
	?>
	<img src="<?php echo $row["mem_pic"]?>" width="60" height="60">
	<?php echo "&nbsp &nbsp &nbsp";?>
	<a href="showOrgs.php?id=<?php echo $row["mem_id"]; ?>">
	<?php  echo  $row["mem_name"]?>
	</a>
	<?php  echo "<br> <br>"; ?>
<?php
}

if(!isset($_SESSION['SESS_MEMBER_NAME'])){
?>


<h2><a href="./Show3Orgs.php">View All Organizations</a></h2>

<br><br><br>

<a href="./login.php">Login</a> <br>

<a href="./createacc.html">Create an Account for Organization</a>



<?php
}elseif (isset($_SESSION['SESS_MEMBER_NAME'])){
?>
	<h2><a href="./Show3Orgs.php">View All Registered Organizations</a></h2>
	<br>
	<h2><a href="./edit.php">Edit Organization Profile</a></h2>
	
	<br><br><br>
	
	<a href="./logout.php">Logout</a> <br>
<?php 
}

?>

<section>
</section>

</body>
</html>