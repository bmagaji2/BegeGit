
<html>
<head>
<meta charset="ISO-8859-1">
<title>Edit Organization profile</title>
</head>
<body>


	<section>
<?php
require_once ('FuncModel.php');
$model = new LabModel ( "localhost", "krobbins", "abc123", "mb_data" );

$model->updateMem ( $_POST );

?>
	<h1>Your Organization profile has been updated</h1>
		<br> <br> <br> <a href="index.php">Return to main page</a>

		<p></p>
	</section>
</body>
</html>