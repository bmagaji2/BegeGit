<?php 

session_start();

echo "Organization:   ". $_SESSION['SESS_MEMBER_NAME'];
echo "<br><br>";
echo "Has been Logged Out";
echo "<br><br><br>";

session_unset();

?>

<a href="./index.php">Go back to the Main Page</a> <br>