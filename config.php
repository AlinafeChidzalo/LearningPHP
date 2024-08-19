<?php

$servername="localhost";
$dbusername="root";
$password="";
$db_name="naphy_project";

$conn = mysqli_connect($servername,$dbusername,$password,$db_name);

if ($conn){
	echo "";
}
else {
	echo "failed";
}
?>