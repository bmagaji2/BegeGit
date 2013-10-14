<?php 

//Start session
session_start();


require_once('FuncModel.php');
$model = new LabModel("localhost", "krobbins", "abc123", "mb_data");

$i = 0;
while($row = $model->login($_POST)){
	$id = $row["mem_id"];
	$name = $row["mem_name"];
	
	$i ++;
}

if($i == 1){
		
	session_regenerate_id();
	$_SESSION['SESS_MEMBER_NAME'] = $name;
	$_SESSION['SESS_MEMBER_ID'] = $id;
	
	header("location: index.php");
	
}else{
	echo "The Organization does not exists!!!";
}


?>