<?php
include "db.php";
$id=$_GET['id'];
$query= "DELETE FROM news where id=$id";
mysqli_query($conn, $query);

header("Location: index.php");
exit;


?>