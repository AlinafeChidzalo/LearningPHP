<?php
$host = "localhost";
$dbusername = "root";
$dbpass = "nafe123";
$dbname = "Sample_1";
$conn = mysqli_connect($host, $dbusername, $dbpass, $dbname);
if ($conn) {
    echo"connected";
}
else{
    echo "not connected";
}
    
?>