<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>account</title>
</head>
<body>
    <h1>WELCOME <?php echo $row["username"]?></h1>

<?php
include("config.php");
if(!empty($_SESSION["username"])){
$id = $_SESSION["username"];
$result = mysqli_query($conn, "SELECT * FROM users WHWRE username = $username");
$row = mysqli_fetch_assoc($result);
}
else{
    header("");
}
?>
</body>
</html>