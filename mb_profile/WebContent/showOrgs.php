<?php 

session_start();

?>

<html>
<head>
<meta charset="ISO-8859-1">
<title>Organization Profile Page</title>
</head>
<body>

<section>

<?php

extract($_GET);
require_once('FuncModel.php');
$model = new LabModel("localhost", "krobbins", "abc123", "mb_data");

$no = 1;
while ($row = $model->viewMem($id)) {


	echo "<h1> <u>Organization Profile Page </u></h1>";
?>
	
	<br><img src="<?php echo $row["mem_pic"]?>" width="250" height="250"><br>
<?php
	echo  "<h3> Name: " . $row["mem_name"] . "</h3>";
	
	echo  "<h3> Gender: " . $row["mem_gender"] . "</h3>";
	
	if(isset($_SESSION['SESS_MEMBER_NAME'])){

		echo  "<h3 > Email: " . $row["mem_email"] . "</h3>";
	
	}
	;
	echo  "<h3 > Agricultural department: " . $row["mem_dep"] . "</h3>";
	//echo "<br>";
	echo  "<h3>Brief Description: " . $row["mem_description"] . "</h3>";

	$no++;
}
?>
<p>
<a href = "index.php">Return to home page</a></p>
</section>
</body>
</html>