<html>
<head>
<meta charset="ISO-8859-1">
<title>Existing Members</title>
</head>
<body style="background-color:brown;">

<h1>List of the existing members</h1>

<section>



<?php
require_once('FuncModel.php');
$model = new LabModel("localhost", "krobbins", "abc123", "mb_data");
$no = 1;
while ($row = $model->nextMem()) {

	echo  $no . ":&nbsp &nbsp" ?>
	<a href="showOrgs.php?id=<?php echo $row["mem_id"]; ?>">
	<?php  echo  $row["mem_name"] ?>
	</a>
	<?php  echo  "&nbsp &nbsp &nbsp" . $row["mem_email"] . "<br> <br>"; ?>
<?php
	$no++;
}

?>

<a href = "index.php">Return to home page</a>
</section>
</body>
</html>