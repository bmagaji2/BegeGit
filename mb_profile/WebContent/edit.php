<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Sign Organization up</title>
</head>
<body>
<h1>Edit your Organization Information</h1>

<section>
<p>


<form  name="updateForm"  method="post" action="editExec.php">
<?php 
require_once('FuncModel.php');
$model = new LabModel("localhost", "krobbins", "abc123", "mb_data");
?>
<?php while ($row = $model->viewMem($_SESSION['SESS_MEMBER_ID'])) {?>

<input type="hidden" name="mem_id" value="<?php echo $row['mem_id']; ?>">
Name: <input type="text" name="mem_name" value="<?php echo $row['mem_name']; ?>"><br>
Gender: <input type="text" name="mem_gender" value="<?php echo $row['mem_gender']; ?>"><br>
Email: <input type="email" name="mem_email" value="<?php echo $row['mem_email']; ?>"><br>
Department: <input type="text" name="mem_dep" value="<?php echo $row['mem_dep']; ?>"><br>
Brief Description: <br>
<textarea name="mem_description" rows="8" cols="80"><?php echo $row['mem_description']; ?></textarea><br>
<input type="submit" value = "Create">
</form>
<?php
 }
 ?>
<br><a href="index.php">Return to main page</a>

</section>

</body>
</html>